<?php

/* PrognozMagazineBundle:Product:view.html.twig */
class __TwigTemplate_b4d4c8ca4a62095cb32c03b2fef1d6ff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'product' => array($this, 'block_product'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('product', $context, $blocks);
    }

    public function block_product($context, array $blocks = array())
    {
        // line 2
        echo "    <div class=\"product product-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo " pull-left\" style=\"background-image: url('";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "getBasePath", array(), "method"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "WebPath"), "html", null, true);
        echo "')\">
        
        <div class=\"btn-group pull-right\">
            <a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("api_product_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" class=\"product-management btn btn-primary\">
                <span class=\"glyphicon glyphicon-cog\"></span>
            </a>
            <div class=\"product-price product-price-";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo " btn btn-primary\">
                ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "price"), "html", null, true);
        echo " р.
            </div> 
            <div class=\"product-add-to-card btn btn-success\" onclick=\"jQuery().magazine('addToCard',";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo ")\">
                <span class=\"glyphicon glyphicon-shopping-cart\"></span>
            </div>    
        </div>        
        <div class=\"product-title pruduct-title-";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo "\">
            ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "title"), "html", null, true);
        echo "
            
        </div>    
    </div>    
";
    }

    public function getTemplateName()
    {
        return "PrognozMagazineBundle:Product:view.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  63 => 16,  59 => 15,  52 => 11,  47 => 9,  43 => 8,  37 => 5,  26 => 2,  20 => 1,);
    }
}
