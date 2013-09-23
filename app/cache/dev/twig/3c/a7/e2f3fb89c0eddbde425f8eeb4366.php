<?php

/* PrognozMagazineBundle:Contacts:index.html.twig */
class __TwigTemplate_3ca7e2f3fb89c0eddbde425f8eeb4366 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("PrognozMagazineBundle::view.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
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
        // line 4
        echo "<h2>Контакты</h2>
<div>+7 908 242 1734</div>
<div><a href=\"mailto:borovinskiy@yandex.ru\">borovinskiy@yandex.ru</a></div>
<div><a href=\"http://arsen-borovinskiy.blogspot.ru\">http://arsen-borovinskiy.blogspot.ru</a></div>
<div><a href=\"http://vk.com/arsen_borovinskiy\">http://vk.com/arsen_borovinskiy</a></div>
";
    }

    public function getTemplateName()
    {
        return "PrognozMagazineBundle:Contacts:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
