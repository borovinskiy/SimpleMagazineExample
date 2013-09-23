<?php

/* PrognozMagazineBundle:User:show.json.twig */
class __TwigTemplate_6e417383bd9230ec019eddd55bf518d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo twig_jsonencode_filter($this->getContext($context, "data"));
        echo "
";
    }

    public function getTemplateName()
    {
        return "PrognozMagazineBundle:User:show.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 2,);
    }
}
