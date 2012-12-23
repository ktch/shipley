<?php

/* _components/blocktypes/Number/settings */
class __TwigTemplate_d4781b1df42efcbc16f6451cf149c8d3 extends Twig_Template
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
        // line 1
        $context["forms"] = $this->env->loadTemplate("_includes/forms.html");
        // line 2
        echo "
";
        // line 3
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Min Value"), "id" => "min", "name" => "min", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "min"), "size" => 5, "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "min"), "method")));
        // line 10
        echo "

";
        // line 12
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Max Value"), "id" => "max", "name" => "max", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "max"), "size" => 5, "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "max"), "method")));
        // line 19
        echo "

";
        // line 21
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Decimal Points"), "id" => "decimals", "name" => "decimals", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "decimals"), "size" => 1, "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "decimals"), "method")));
        // line 28
        echo "
";
    }

    public function getTemplateName()
    {
        return "_components/blocktypes/Number/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 11,  104 => 66,  96 => 51,  90 => 42,  86 => 40,  72 => 28,  70 => 27,  54 => 23,  48 => 21,  36 => 21,  32 => 19,  154 => 95,  152 => 94,  148 => 92,  139 => 88,  137 => 87,  135 => 86,  125 => 84,  123 => 83,  120 => 82,  117 => 81,  114 => 80,  111 => 79,  108 => 78,  105 => 77,  102 => 59,  98 => 57,  94 => 73,  92 => 49,  89 => 63,  87 => 62,  84 => 33,  80 => 31,  75 => 54,  71 => 52,  69 => 48,  65 => 46,  59 => 25,  57 => 24,  51 => 22,  43 => 12,  41 => 11,  38 => 28,  34 => 8,  27 => 13,  25 => 4,  21 => 2,  19 => 1,  83 => 38,  79 => 36,  77 => 55,  74 => 34,  68 => 26,  63 => 39,  61 => 29,  53 => 26,  47 => 14,  45 => 20,  42 => 19,  39 => 18,  37 => 14,  35 => 11,  30 => 12,  28 => 6,  26 => 10,  24 => 3,);
    }
}
