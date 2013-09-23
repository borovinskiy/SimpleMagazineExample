<?php

/* PrognozMagazineBundle:Product:add.html.twig */
class __TwigTemplate_696b957ee7d734e2d42fb37a673f327e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("PrognozMagazineBundle::view.html.twig");

        $this->blocks = array(
            'titile' => array($this, 'block_titile'),
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

    // line 2
    public function block_titile($context, array $blocks = array())
    {
        echo "Добавление продукта";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"form add-product-form\">
        <form action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("_product_add");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo " method=\"POST\">
            ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
            <input type=\"submit\" />
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "PrognozMagazineBundle:Product:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 6,  41 => 5,  38 => 4,  35 => 3,  29 => 2,);
    }
}
