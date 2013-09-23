<?php

/* PrognozMagazineBundle:Product:show.html.twig */
class __TwigTemplate_ea9d541bbb786737676112157b0bb72d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("PrognozMagazineBundle::view.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'product' => array($this, 'block_product'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrognozMagazineBundle::view.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "<h1>Product</h1>
    
    ";
        // line 9
        $this->displayBlock('product', $context, $blocks);
        // line 38
        echo "    
    ";
    }

    // line 9
    public function block_product($context, array $blocks = array())
    {
        // line 10
        echo "    
    ";
        // line 11
        $this->env->loadTemplate("PrognozMagazineBundle:Product:show.html.twig", "636042566")->display($context);
        // line 13
        echo "    
    ";
        // line 36
        echo "    
    ";
    }

    public function getTemplateName()
    {
        return "PrognozMagazineBundle:Product:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 36,  51 => 13,  49 => 11,  46 => 10,  43 => 9,  38 => 38,  36 => 9,  32 => 7,  29 => 3,);
    }
}


/* PrognozMagazineBundle:Product:show.html.twig */
class __TwigTemplate_ea9d541bbb786737676112157b0bb72d_636042566 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("PrognozMagazineBundle:Product:view.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrognozMagazineBundle:Product:view.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "PrognozMagazineBundle:Product:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 36,  51 => 13,  49 => 11,  46 => 10,  43 => 9,  38 => 38,  36 => 9,  32 => 7,  29 => 3,);
    }
}
