<?php

/* ::base.html.twig */
class __TwigTemplate_0a866152ca4196ac006719c59a88c294 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 16
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 19
        $this->displayBlock('body', $context, $blocks);
        // line 23
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 27
        echo "        ";
        $this->displayBlock('footer', $context, $blocks);
        // line 29
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "        <link rel=\"stylesheet\" href=\"";
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
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src=\"../../assets/js/html5shiv.js\"></script>
            <script src=\"../../assets/js/respond.min.js\"></script>
        <![endif]-->
        ";
    }

    // line 19
    public function block_body($context, array $blocks = array())
    {
        echo "  
             ";
        // line 20
        $this->displayBlock('header', $context, $blocks);
        // line 21
        echo "             ";
        $this->displayBlock('content', $context, $blocks);
        // line 22
        echo "        ";
    }

    // line 20
    public function block_header($context, array $blocks = array())
    {
    }

    // line 21
    public function block_content($context, array $blocks = array())
    {
    }

    // line 23
    public function block_javascripts($context, array $blocks = array())
    {
        // line 24
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/js/jquery.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/prognozmagazine/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    // line 27
    public function block_footer($context, array $blocks = array())
    {
        echo "<footer></footer>
        ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 27,  120 => 25,  115 => 24,  112 => 23,  107 => 21,  102 => 20,  98 => 22,  95 => 21,  93 => 20,  88 => 19,  77 => 9,  73 => 8,  68 => 7,  65 => 6,  59 => 5,  53 => 29,  50 => 27,  47 => 23,  38 => 16,  36 => 6,  32 => 5,  26 => 1,  94 => 38,  87 => 33,  75 => 27,  69 => 24,  62 => 20,  58 => 19,  52 => 18,  49 => 17,  45 => 19,  31 => 4,  28 => 3,);
    }
}
