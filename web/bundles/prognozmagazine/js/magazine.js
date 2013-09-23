/* 
 * jQuery plugin for prognoz magazine
 */

(function($){
    
    /* 
     * settings of plugin
     */
    var settings = {
        url: {
            app: "/shop/app_dev.php",
            card: "/shop/app_dev.php/api/card/",
            product: "/shop/app_dev.php/api/product/",
            user: "/shop/app_dev.php/api/user/",
            catalog: "/shop/app_dev.php/api/catalog/",
        },
        storage: {
            prefix: "magazine",
            ttl: 3600*24*1000, 
        }
    };
    
    /*
     * Отображение пользователя в js
     */
    var user = {
        //id: 1,          // it is user_id. While we not have authorization, id is 1
        //phone: 2-396-626,
    };
    
    var card = {
        id: null,
        products: [],
        status: 1,
    };
    
    
    /*
     * All method of plugin     
     */
    var methods = {
        /*
         * Initialization of plugin           
         */
        init : function( options ) {
            /* 
             * Rewrite optional settings
             */
            var setting = $.extend({
                url: {
                    //app: '/shop/app_dev.php',        
                    //card: settings.url.app + '/shop/app_dev.php/api/card/',
                },
            },options);
            
            /* Code of init plugin */
            // load card from localStorage.
            var cardFromStorage = $.jStorage.get(settings.storage.prefix + "card");
            if (cardFromStorage !== null) {
                card = cardFromStorage;
            }
            
            var userFromStorage = $.jStorage.get(settings.storage.prefix + "user");
            if (userFromStorage !== null) {
                user = userFromStorage;
                methods.setUser(user);
                if (user.id !== null && user.id !== undefined) {
                    methods.loadUserFromServer(user.id, function() { 
                       // console.log("Загрузка данных с сервера закончена."); 
                    });    // Сюда можно поместить callback, на случай успешной загрузки пользователя чтобы что-то сделать с коризной
                    $("div.user-data").data("user",user).css("display","none");                    
                }
            }
            var user = {};
            
            methods.updateCardModal();
            
            return this;
        },
        show : function( ) {
            //return this.each(function() {
                // некоторый полезный код
                //console.log("show method is complete");
                for (var i=0; i < card.products.length; i++) {
                    //console.log("В корзине товар: " + card.products[i]);
                }
            //});
            return this;
        },                
                
        /*
         * Добавляет заказ продукта в корзину
         * @var int productId - идентификатор продукта, добавляемого в корзину
         */        
        addToCard: function(productId) {
            card.products.push(productId);
            methods.updateCard();
        },
            
        /*
         * Удаляет заказ продукта из корзины
         */    
        delFromCard: function(productId) {
            //console.log("Удаляем продукт " + productId);
            for (var i=0; i < card.products.length; i++) {
                if (productId == card.products[i]) {
                    card.products.splice(i, 1);
                    methods.updateCard();
                    break;
                }
            }
        },
        
        /*
         * Обновляет все представления и модели после изменения в корзине
         */
        updateCard: function() {
            $.jStorage.set(settings.storage.prefix + "card", card, {TTL: settings.storage.ttl});
            methods.updateCardModal();
            methods.hideUserMessage();  // Удаляем сообщение пользователю, т.к. теперь ему надо нажать кнопку покупки
        },
                
        /*
         * Обновляет html с модальным окном
         */
        updateCardModal: function() {
            var modalBody = $("#cardModal div.modal-body ul");
            modalBody.html("");
            for (var i=0; i< card.products.length; i++) {   
                var productId = card.products[i];
                modalBody.append('<li class="product-' + productId + '-wrapper product-wrapper">' + productId + '</li>');
                var productWrapper = jQuery(".product-" + productId + "-wrapper");                
                productWrapper.load(settings.url.product + productId + "/widget/card");
                //console.log("Обновлен cardModal продуктом: " + card.products[i]);
            }
            
            // Обновляем число товаров в корзине
            if (card.products.length === null) {
                jQuery("#card-badge").html("0");
            } else {
                jQuery("#card-badge").html(card.products.length);
            }                
        },
        
        /*
         * Покупает товар, находящийся в корзине
         */        
        buy: function(productId) {
            
            //console.log("Проверяем, зарегестрирован ли пользователь...");
            
            if (user.id === null || user.id === undefined) {
                var name = $(".user-name").val();
                var phone = $(".user-phone").val();
                //console.log("Пытаемся зарегестрировать пользователя " + name + " с телефоном " + phone);
                if ( name.length > 0 && phone.length > 0 ) {     // Проводим регистрацию
                    methods.userRegister({name: name, phone: phone}, function(){methods.buy(productId);});
                    if (user.id) {  // Регистрация прошла успешно.
                        return true;
                    }
                    return false;
                }
                else {
                    $(".user-data").addClass("alert").addClass("alert-danger");
                    return false;
                }
            }
            else {
                //console.log("Пользователь уже зарегестрирован с id: " + user.id);
            }
            
            //console.log("Покупаем товар");
            

                        
            var data = {                
                "prognoz_magazinebundle_card[user]": user.id,
                "prognoz_magazinebundle_card[status]": 1   
            };            
            
            data["prognoz_magazinebundle_card[products][]"] = card.products;
            //console.log("Покупаем продукты: " + data["prognoz_magazinebundle_card[products][]"]);
            
            // Если задан user.id, но корзины у него еще нет
            if (user.id && !card.id) {
                $.post(settings.url.card + "?format=json", data, function(data,status) {     // success callback
                    // Надо очистить корзину
                    if (status == "success") {           // Корзина на сервере создана успешно
                        //console.log("Корзина успешно создана на сервере.");
                        methods.buyComplete();
                    }
                    else {
                        //console.log("Произошла ошибка " + status);
                    }
                });  
            /*
                $.ajax(settings.url.card + card.id , {
                    data: data,
                    //dataType: "json",
                    type: "PUT",
                    success: function() {
                        // Надо очистить корзину
                        methods.cleanCard();
                    }
                });
            */
            }
            // Задан и user.id и у него уже есть корзина, то надо обновить содержимое корзины
            else if (user.id && card.id) {
                $.ajax(settings.url.card + card.id  + "?format=json", {
                    data: data,
                    dataType: "json",
                    type: "PUT",
                    success: function(rowData,status) {
                        if (status ===200) {
                            methods.buyComplete();
                            //console.log("Корзина отредактирована со статусом 200");
                        }    
                            
                     },
                     error: function(jqXHR, status, error) {
                        //console.log("Ошибка при регистрации пользователя: " + status + " " + error);
                     }          
                });
                methods.buyComplete(); //fixme это здесь не надо, но $.ajax почему-то не отрабатывает success     
                
            }
            else  {
                //console.log("Не удалось определить идентификатор пользователя...");
            }
        },
    
        /*
         * Вызывается после отправки содержимого корзины на сервер
         */
        buyComplete: function() {            
            //methods.cleanCard(); // Надо очистить корзину ?
            jQuery("#card-message").css({"display":"block"});
            
            //$(".card-message").append('<div class="alert alert-success card-message">Спасибо за заказ! Наш менеджер свяжется с Вами по указанному телефону.</div>');
            //console.log("Наш менеджер свяжется с Вами. Большое Спасибо.");
        },
    
        /*
         * Очищает корзину
         */        
        cleanCard: function() {
            // Надо очистить корзину
            card.products = [];
            $.jStorage.set(settings.storage.prefix + "card");
            methods.updateCardModal();
            methods.hideUserMessage(); // если таблица очищена, уведомление об успешном заказе надо снять.
        },
        
        /*
         * Скрывает сообщение пользователю в корзине         
         */
        hideUserMessage: function() {
            jQuery("#card-message").css({"display":"none"});
            //jQuery(".user-data").css({"display":"none"});
        },
        
        /*
         * Регистрирует пользователя на сервере
         * @var User user - объект пользователя
         * @var Function callback - колбек при успешной регистрации пользователя
         */        
        userRegister: function(user, callback) {
            // user.phone must be set. user.name can be set
            //console.log("Регистрируем пользователя" + user.phone + " под именем " + user.name);
            if (user.phone && !user.id) {
                var data = {
                    "prognoz_magazinebundle_user[phone]": user.phone,
                    "prognoz_magazinebundle_user[name]": user.name,                     
                };
                $.ajax(settings.url.user + "?format=json", {
                    data: data,
                    dataType: "json",
                    type: "POST",
                    async: true,
                    success: function(rawData, status, xhr) {     // success callback
                        //var data = $.parseJSON(rawData);   
                        var data = rawData;
                        if (status == "success" && data.id) {
                            //console.log("Пользователь успешно зарегестрирован под id: " + data.id);
                            methods.setUser(data);
                            user.id = data.id;
                            jQuery(".user-data").removeClass("alert").removeClass("alert-danger");
                            // return true; // не хотим ломать цепочки вызовов
                            if (callback) { callback(); }
                        }
                       else {
                            //console.log("Запрос на регистрацию пользователя завершился ошибкой" + status);
                        }
                    },    
                    error: function(jqXHR, status, error) {
                        //console.log("Ошибка при регистрации пользователя: " + status + " " + error);
                    }        
                });    
                //console.log("Ajax запрос на регистрацию пользователя отправлен");
            } else { 
                // return false; // не хотим ломать цепочки вызовов. Но зарегестрировать пользователя нельзя
                //console.log("Регистрация пользователя невозможна.");
            }    
        },
        
        /*
         * Загружает пользователя (вместе с корзиной) с известным идентификатором с сервера
         * @param {int} userId
         * @param {Function} callback - колбек после завершения загрузки пользователя
         * @returns {null}
         */
        loadUserFromServer: function(userId, callback) {
            userId = userId || user.id;            
            if (userId) {
                
                var data = {id: userId};
                
            
                $.ajax(settings.url.user + userId + "?format=json", {
                    data: data,
                    dataType: "json",
                    type: "GET",
                    async: true,
                    success: function(rawData, status, xhr) {     // success callback
                        //var data = $.parseJSON(rawData);                        
                        var data = rawData;

                            //console.log("Пользователь успешно загружен с id: " + data.id);
                            methods.setUser(data);
                            user.id = data.id;      
                            if (data.card.id) {
                                //console.log("У пользователя уже имеется корзина " + data.card.id + " и в ней товары " + data.card.products);
                                card.id = data.card.id;
                            }
                            if (callback) { callback(); }

                    }
                });
            }
            else {
                if (callback) {     // Если userId не задан, то загружать с сервера нечего и сразу вызываем callback
                    callback();
                }
            }
        },
        
        /*
         * Устанавливает пользователя
         */
        setUser: function (newUser) {
            user = newUser;
            $.jStorage.set(settings.storage.prefix + "user",user);
        },
        
        /*
         * Возвращает пользователя
         */
        getUser: function () {
            return user;
        },
        
        /*
         * Устанавливает корзину
         */
        setCard: function(newCard) {
            card = newCard;
        },
        
        /*
         * Возвращает корзину
         */
        getCard: function() {
            return card;
        },
                
        viewCatalog: function(id) {
            var url = settings.url.catalog + id;
            //console.log("Загружаем каталог " + url);
            jQuery(".main-content-wrapper").load( url + " .main-content");
            if (window.history) {
                window.history.pushState(null,null, url);
            }
        },        
    }; 
    
    $.fn.magazine = function (method) {                                           
        
         // логика вызова метода
        if ( methods[method] ) {
            return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Метод с именем ' +  method + ' не существует для jQuery.tooltip' );
        }             
    };
})(jQuery);

jQuery().magazine("init");
//jQuery().magazine("addToCard",1);
//jQuery().magazine("addToCard",2);
//jQuery().magazine("show");
    
