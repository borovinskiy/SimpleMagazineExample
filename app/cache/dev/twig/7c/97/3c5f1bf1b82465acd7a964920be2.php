<?php

/* PrognozMagazineBundle:Product:card.html.twig */
class __TwigTemplate_7c973c5f1bf1b82465acd7a964920be2 extends Twig_Template
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
        // line 2
        $this->displayBlock('product', $context, $blocks);
    }

    public function block_product($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"product product-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo " pull-left\" style=\"background-image: url('";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "getBasePath", array(), "method"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "WebPath"), "html", null, true);
        echo "')\">
        
        <div class=\"btn-group pull-right\">
            <div class=\"product-price product-price-";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo " btn btn-primary\">
                ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "price"), "html", null, true);
        echo " р.
            </div> 
            <div class=\"product-add-to-card btn btn-danger\" onclick=\"jQuery().magazine('delFromCard', ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo " )\">
                <span class=\"glyphicon glyphicon-remove-sign\"></span>
            </div>    
        </div>        
        <div class=\"product-title pruduct-title-";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo "\">
            ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "title"), "html", null, true);
        echo "
            
        </div>    
    </div>    
";
    }

    public function getTemplateName()
    {
        return "PrognozMagazineBundle:Product:card.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  57 => 14,  53 => 13,  46 => 9,  41 => 7,  37 => 6,  26 => 3,  20 => 2,);
    }
}
