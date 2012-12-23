<?php

/* _components/blocktypes/optionsblocksettings */
class __TwigTemplate_fd0022a375cfd3add9cc2f8625dc4a2b extends Twig_Template
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
        $context["__internal_0dbcf225ea045a23b0a831b49b9f62cae9549f45"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        echo "
";
        // line 3
        echo $context["__internal_0dbcf225ea045a23b0a831b49b9f62cae9549f45"]->gettextareaField(array("label" => (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), "instructions" => \Blocks\Blocks::t("Place each option on a new line. If you want to give an option a custom label, use the format “<code>OptionValue => OptionLabel</code>”."), "id" => "options", "name" => "options", "value" => (isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "rows" => 10));
        // line 10
        echo "
";
    }

    public function getTemplateName()
    {
        return "_components/blocktypes/optionsblocksettings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 95,  152 => 94,  148 => 92,  139 => 88,  137 => 87,  135 => 86,  125 => 84,  123 => 83,  120 => 82,  117 => 81,  114 => 80,  111 => 79,  108 => 78,  105 => 77,  102 => 76,  98 => 75,  94 => 73,  92 => 64,  89 => 63,  87 => 62,  84 => 61,  80 => 59,  75 => 54,  71 => 52,  69 => 48,  65 => 46,  59 => 37,  57 => 28,  51 => 16,  43 => 12,  41 => 11,  38 => 10,  34 => 8,  27 => 5,  25 => 4,  21 => 2,  19 => 1,  83 => 38,  79 => 36,  77 => 55,  74 => 34,  68 => 33,  63 => 39,  61 => 29,  53 => 26,  47 => 14,  45 => 21,  42 => 17,  39 => 15,  37 => 14,  35 => 11,  30 => 6,  28 => 6,  26 => 10,  24 => 3,);
    }
}
