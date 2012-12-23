<?php

/* _components/blocktypes/RichText/settings */
class __TwigTemplate_d2738cc1bbc86527750326cc62abd065 extends Twig_Template
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
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        echo "

";
        // line 4
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Min Height (in pixels)"), "id" => "minHeight", "name" => "minHeight", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "minHeight"), "size" => 3, "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "minHeight"), "method")));
        // line 11
        echo "
";
    }

    public function getTemplateName()
    {
        return "_components/blocktypes/RichText/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 46,  52 => 35,  50 => 31,  29 => 11,  104 => 66,  96 => 51,  90 => 42,  86 => 40,  72 => 54,  70 => 47,  54 => 23,  48 => 21,  36 => 21,  32 => 15,  154 => 95,  152 => 94,  148 => 92,  139 => 88,  137 => 87,  135 => 86,  125 => 84,  123 => 83,  120 => 82,  117 => 81,  114 => 80,  111 => 79,  108 => 78,  105 => 77,  102 => 59,  98 => 57,  94 => 73,  92 => 49,  89 => 63,  87 => 62,  84 => 33,  80 => 31,  75 => 54,  71 => 52,  69 => 48,  65 => 46,  59 => 43,  57 => 38,  51 => 22,  43 => 28,  41 => 24,  38 => 28,  34 => 16,  27 => 11,  25 => 4,  21 => 2,  19 => 1,  83 => 38,  79 => 36,  77 => 55,  74 => 34,  68 => 26,  63 => 39,  61 => 29,  53 => 26,  47 => 30,  45 => 20,  42 => 19,  39 => 18,  37 => 22,  35 => 11,  30 => 12,  28 => 6,  26 => 10,  24 => 3,);
    }
}
