<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        if (0 === strpos($pathinfo, '/api/c')) {
            if (0 === strpos($pathinfo, '/api/ca')) {
                if (0 === strpos($pathinfo, '/api/card')) {
                    // api_card
                    if (rtrim($pathinfo, '/') === '/api/card') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_card;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'api_card');
                        }

                        return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CardController::indexAction',  '_route' => 'api_card',);
                    }
                    not_api_card:

                    // api_card_create
                    if ($pathinfo === '/api/card/') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_card_create;
                        }

                        return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CardController::createAction',  '_route' => 'api_card_create',);
                    }
                    not_api_card_create:

                    // api_card_new
                    if ($pathinfo === '/api/card/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_card_new;
                        }

                        return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CardController::newAction',  '_route' => 'api_card_new',);
                    }
                    not_api_card_new:

                    // api_card_show
                    if (preg_match('#^/api/card/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_card_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_card_show')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CardController::showAction',));
                    }
                    not_api_card_show:

                    // api_card_edit
                    if (preg_match('#^/api/card/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_card_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_card_edit')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CardController::editAction',));
                    }
                    not_api_card_edit:

                    // api_card_update
                    if (preg_match('#^/api/card/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_api_card_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_card_update')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CardController::updateAction',));
                    }
                    not_api_card_update:

                    // api_card_delete
                    if (preg_match('#^/api/card/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_api_card_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_card_delete')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CardController::deleteAction',));
                    }
                    not_api_card_delete:

                }

                if (0 === strpos($pathinfo, '/api/category')) {
                    // api_category
                    if (rtrim($pathinfo, '/') === '/api/category') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_category;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'api_category');
                        }

                        return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CategoryController::indexAction',  '_route' => 'api_category',);
                    }
                    not_api_category:

                    // api_category_create
                    if ($pathinfo === '/api/category/') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_api_category_create;
                        }

                        return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CategoryController::createAction',  '_route' => 'api_category_create',);
                    }
                    not_api_category_create:

                    // api_category_new
                    if ($pathinfo === '/api/category/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_category_new;
                        }

                        return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CategoryController::newAction',  '_route' => 'api_category_new',);
                    }
                    not_api_category_new:

                    // api_category_show
                    if (preg_match('#^/api/category/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_category_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_category_show')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CategoryController::showAction',));
                    }
                    not_api_category_show:

                    // api_category_edit
                    if (preg_match('#^/api/category/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_api_category_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_category_edit')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CategoryController::editAction',));
                    }
                    not_api_category_edit:

                    // api_category_update
                    if (preg_match('#^/api/category/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_api_category_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_category_update')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CategoryController::updateAction',));
                    }
                    not_api_category_update:

                    // api_category_delete
                    if (preg_match('#^/api/category/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_api_category_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_category_delete')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\CategoryController::deleteAction',));
                    }
                    not_api_category_delete:

                }

            }

            if (0 === strpos($pathinfo, '/api/color')) {
                // api_color
                if (rtrim($pathinfo, '/') === '/api/color') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_color;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_color');
                    }

                    return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ColorController::indexAction',  '_route' => 'api_color',);
                }
                not_api_color:

                // api_color_create
                if ($pathinfo === '/api/color/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_color_create;
                    }

                    return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ColorController::createAction',  '_route' => 'api_color_create',);
                }
                not_api_color_create:

                // api_color_new
                if ($pathinfo === '/api/color/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_color_new;
                    }

                    return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ColorController::newAction',  '_route' => 'api_color_new',);
                }
                not_api_color_new:

                // api_color_show
                if (preg_match('#^/api/color/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_color_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_color_show')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ColorController::showAction',));
                }
                not_api_color_show:

                // api_color_edit
                if (preg_match('#^/api/color/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_color_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_color_edit')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ColorController::editAction',));
                }
                not_api_color_edit:

                // api_color_update
                if (preg_match('#^/api/color/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_api_color_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_color_update')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ColorController::updateAction',));
                }
                not_api_color_update:

                // api_color_delete
                if (preg_match('#^/api/color/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_api_color_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_color_delete')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ColorController::deleteAction',));
                }
                not_api_color_delete:

            }

        }

        // _contacts
        if (rtrim($pathinfo, '/') === '/contacts') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_contacts');
            }

            return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ContactsController::indexAction',  '_route' => '_contacts',);
        }

        // prognoz_magazine_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'prognoz_magazine_default_index')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/api')) {
            if (0 === strpos($pathinfo, '/api/product')) {
                // api_product
                if (rtrim($pathinfo, '/') === '/api/product') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_product;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_product');
                    }

                    return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ProductController::indexAction',  '_route' => 'api_product',);
                }
                not_api_product:

                // api_product_create
                if ($pathinfo === '/api/product/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_product_create;
                    }

                    return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ProductController::createAction',  '_route' => 'api_product_create',);
                }
                not_api_product_create:

                // api_product_new
                if ($pathinfo === '/api/product/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_product_new;
                    }

                    return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ProductController::newAction',  '_route' => 'api_product_new',);
                }
                not_api_product_new:

                // api_product_show
                if (preg_match('#^/api/product/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_product_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_product_show')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ProductController::showAction',));
                }
                not_api_product_show:

                // api_product_show_widget
                if (preg_match('#^/api/product/(?P<id>[^/]++)/widget$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_product_show_widget;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_product_show_widget')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ProductController::widgetAction',));
                }
                not_api_product_show_widget:

                // api_product_card_widget
                if (preg_match('#^/api/product/(?P<id>[^/]++)/widget/card$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_product_card_widget;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_product_card_widget')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ProductController::widgetCardAction',));
                }
                not_api_product_card_widget:

                // api_product_edit
                if (preg_match('#^/api/product/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_product_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_product_edit')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ProductController::editAction',));
                }
                not_api_product_edit:

                // api_product_update
                if (preg_match('#^/api/product/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_api_product_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_product_update')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ProductController::updateAction',));
                }
                not_api_product_update:

                // api_product_delete
                if (preg_match('#^/api/product/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_api_product_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_product_delete')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\ProductController::deleteAction',));
                }
                not_api_product_delete:

            }

            if (0 === strpos($pathinfo, '/api/user')) {
                // api_user
                if (rtrim($pathinfo, '/') === '/api/user') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_user;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'api_user');
                    }

                    return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\UserController::indexAction',  '_route' => 'api_user',);
                }
                not_api_user:

                // api_user_create
                if ($pathinfo === '/api/user/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_api_user_create;
                    }

                    return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\UserController::createAction',  '_route' => 'api_user_create',);
                }
                not_api_user_create:

                // api_user_new
                if ($pathinfo === '/api/user/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_user_new;
                    }

                    return array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\UserController::newAction',  '_route' => 'api_user_new',);
                }
                not_api_user_new:

                // api_user_show
                if (preg_match('#^/api/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_user_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_show')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\UserController::showAction',));
                }
                not_api_user_show:

                // api_user_edit
                if (preg_match('#^/api/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_api_user_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_edit')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\UserController::editAction',));
                }
                not_api_user_edit:

                // api_user_update
                if (preg_match('#^/api/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_api_user_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_update')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\UserController::updateAction',));
                }
                not_api_user_update:

                // api_user_delete
                if (preg_match('#^/api/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_api_user_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_user_delete')), array (  '_controller' => 'Prognoz\\MagazineBundle\\Controller\\UserController::deleteAction',));
                }
                not_api_user_delete:

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
