<?php

/* PrognozMagazineBundle::view.html.twig */
class __TwigTemplate_0815a2f4287d3b952320e7fb581304ff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'javascript_header' => array($this, 'block_javascript_header'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'header' => array($this, 'block_header'),
            'header_menu' => array($this, 'block_header_menu'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html ng-app>
    <head>
    ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 22
        echo "        <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    </head>
    <body ng-init=\"cardNumber=0;\">
    ";
        // line 25
        $this->displayBlock('body', $context, $blocks);
        // line 64
        echo "    ";
        $this->env->loadTemplate("PrognozMagazineBundle::view.html.twig", "987580490")->display($context);
        // line 66
        echo "        <footer>
            ";
        // line 67
        $this->displayBlock('footer', $context, $blocks);
        // line 68
        echo "        </footer>
        ";
        // line 69
        $this->displayBlock('javascripts', $context, $blocks);
        // line 76
        echo "    </body>
</html>    ";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "        ";
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 12
        echo "        ";
        $this->displayBlock('javascript_header', $context, $blocks);
        // line 15
        echo "    
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src=\"../../assets/js/html5shiv.js\"></script>
            <script src=\"../../assets/js/respond.min.js\"></script>
        <![endif]-->
    ";
    }

    // line 5
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 6
        echo "            <link rel=\"icon\" sizes=\"16x16\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
            <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/css/demo.css"), "html", null, true);
        echo "\" />
            <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/css/bootstrap.css"), "html", null, true);
        echo "\" />
            <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/css/bootstrap-theme.css"), "html", null, true);
        echo "\" />
            <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/css/style.css"), "html", null, true);
        echo "\" />
        ";
    }

    // line 12
    public function block_javascript_header($context, array $blocks = array())
    {
        // line 13
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/js/angular.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/app/js/card.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    // line 22
    public function block_title($context, array $blocks = array())
    {
        echo "Магазин";
    }

    // line 25
    public function block_body($context, array $blocks = array())
    {
        // line 26
        echo "        ";
        $this->displayBlock('header', $context, $blocks);
        // line 50
        echo "
        <div class=\"main\">    
            <div class=\"container\">
                ";
        // line 53
        $this->displayBlock('content', $context, $blocks);
        // line 54
        echo "            </div>
        </div>

        ";
        // line 57
        if (array_key_exists("code", $context)) {
            // line 58
            echo "            <h2>Code behind this page</h2>
            <div class=\"block\">
                <div class=\"symfony-content\">";
            // line 60
            echo $this->getContext($context, "code");
            echo "</div>
            </div>
        ";
        }
        // line 63
        echo "    ";
    }

    // line 26
    public function block_header($context, array $blocks = array())
    {
        echo " 
            <div class=\"navbar navbar-inverse navbar-fixed-top\">
                <div class=\"container\">
                    <div class=\"navbar-header\">
                        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                        </button>
                        <a class=\"navbar-brand\" href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("api_product");
        echo "\">Магазин</a>
                    </div>
                    <div class=\"navbar-collapse collapse\">                        
                        <ul class=\"nav navbar-nav\" data-id=\"header-menu\">
                            ";
        // line 39
        $this->displayBlock('header_menu', $context, $blocks);
        // line 45
        echo "                        </ul>
                    </div>            
                </div>
            </div>
        ";
    }

    // line 39
    public function block_header_menu($context, array $blocks = array())
    {
        // line 40
        echo "                                <li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("api_product");
        echo "\">Каталог</a></li>
                                <li><a href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("_contacts");
        echo "\">Контакты</a></li>
                                <li><a data-toggle=\"modal\" href=\"#cardModal\"><span class=\"glyphicon glyphicon-shopping-cart\"></span> Корзина <span class=\"badge\" id=\"card-badge\"></span></a></li>
                                <!-- <li><a href=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("api_card");
        echo "\">Корзина <span class=\"badge\" id=\"card-badge\" ng-model=\"cardNumber\">";
        echo "{{cardNumber}}";
        echo "</span></a></li> -->
                            ";
    }

    // line 53
    public function block_content($context, array $blocks = array())
    {
    }

    // line 67
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 69
    public function block_javascripts($context, array $blocks = array())
    {
        // line 70
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/js/jquery.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/js/jquery.json.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/js/jstorage.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/js/magazine.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "PrognozMagazineBundle::view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 74,  239 => 73,  235 => 72,  231 => 71,  226 => 70,  223 => 69,  218 => 67,  213 => 53,  205 => 43,  200 => 41,  195 => 40,  192 => 39,  184 => 45,  182 => 39,  175 => 35,  162 => 26,  158 => 63,  152 => 60,  148 => 58,  146 => 57,  141 => 54,  139 => 53,  134 => 50,  131 => 26,  128 => 25,  122 => 22,  116 => 14,  111 => 13,  108 => 12,  102 => 10,  98 => 9,  94 => 8,  90 => 7,  85 => 6,  82 => 5,  72 => 15,  69 => 12,  66 => 5,  63 => 4,  58 => 76,  56 => 69,  53 => 68,  51 => 67,  48 => 66,  45 => 64,  43 => 25,  36 => 22,  34 => 4,  29 => 1,);
    }
}


/* PrognozMagazineBundle::view.html.twig */
class __TwigTemplate_0815a2f4287d3b952320e7fb581304ff_987580490 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("PrognozMagazineBundle:Card:modal.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrognozMagazineBundle:Card:modal.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "PrognozMagazineBundle::view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 74,  239 => 73,  235 => 72,  231 => 71,  226 => 70,  223 => 69,  218 => 67,  213 => 53,  205 => 43,  200 => 41,  195 => 40,  192 => 39,  184 => 45,  182 => 39,  175 => 35,  162 => 26,  158 => 63,  152 => 60,  148 => 58,  146 => 57,  141 => 54,  139 => 53,  134 => 50,  131 => 26,  128 => 25,  122 => 22,  116 => 14,  111 => 13,  108 => 12,  102 => 10,  98 => 9,  94 => 8,  90 => 7,  85 => 6,  82 => 5,  72 => 15,  69 => 12,  66 => 5,  63 => 4,  58 => 76,  56 => 69,  53 => 68,  51 => 67,  48 => 66,  45 => 64,  43 => 25,  36 => 22,  34 => 4,  29 => 1,);
    }
}
