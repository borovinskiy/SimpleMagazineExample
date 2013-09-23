<?php

/* PrognozMagazineBundle:Card:modal.html.twig */
class __TwigTemplate_b0b541340c94bb2fe85277a443e0f5c5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'card_modal' => array($this, 'block_card_modal'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('card_modal', $context, $blocks);
    }

    public function block_card_modal($context, array $blocks = array())
    {
        // line 3
        echo "  <!-- Modal -->
  <div class=\"modal fade\" id=\"cardModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"cardModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
          <h4 class=\"modal-title\">Корзина</h4>
        </div>
        <div class=\"modal-body\">
            <ul></ul>
        </div>
        <div class=\"user-data\">            
            Ваше имя: <input class=\"span2 user-name\" data-user-name=\"\" type=\"text\" placeholder=\"Иван Иванов\" name=\"name\"> 
            и телефон: <input class=\"span2 user-phone\" data-user-phone=\"\" type=\"text\" placeholder=\"8902 111 22 33\" name=\"phone\">
        </div>            
        <div class=\"modal-footer\">
          <button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\" onclick=\"jQuery().magazine('cleanCard')\">Очистить</button>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Закрыть</button>
          <button type=\"button\" class=\"btn btn-primary\" onclick=\"jQuery().magazine('buy')\">Купить</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
";
    }

    public function getTemplateName()
    {
        return "PrognozMagazineBundle:Card:modal.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  20 => 2,);
    }
}
