<?php

/* _components/linktypes/Assets/settings */
class __TwigTemplate_8a77eb5fbd829e149cb086f8536cf2cf extends Twig_Template
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
        $context["__internal_de70c890ae7eca0cccbbf8997a47c5a7980533ec"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        echo "
";
        // line 3
        echo $context["__internal_de70c890ae7eca0cccbbf8997a47c5a7980533ec"]->getcheckboxSelectField(array("label" => \Blocks\Blocks::t("Asset Sources"), "instructions" => \Blocks\Blocks::t("Which asset sources do you want to link files from?"), "id" => "sourceId", "name" => "sourceId", "options" => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getAllSources", array(0 => "id"), "method"), "values" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "sourceId")));
        // line 10
        echo "
";
    }

    public function getTemplateName()
    {
        return "_components/linktypes/Assets/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 66,  96 => 51,  90 => 42,  86 => 40,  72 => 28,  70 => 27,  54 => 23,  48 => 21,  36 => 17,  32 => 16,  154 => 95,  152 => 94,  148 => 92,  139 => 88,  137 => 87,  135 => 86,  125 => 84,  123 => 83,  120 => 82,  117 => 81,  114 => 80,  111 => 79,  108 => 78,  105 => 77,  102 => 59,  98 => 57,  94 => 73,  92 => 49,  89 => 63,  87 => 62,  84 => 33,  80 => 31,  75 => 54,  71 => 52,  69 => 48,  65 => 46,  59 => 25,  57 => 24,  51 => 22,  43 => 12,  41 => 11,  38 => 10,  34 => 8,  27 => 13,  25 => 4,  21 => 2,  19 => 1,  83 => 38,  79 => 36,  77 => 55,  74 => 34,  68 => 26,  63 => 39,  61 => 29,  53 => 26,  47 => 14,  45 => 20,  42 => 19,  39 => 18,  37 => 14,  35 => 11,  30 => 6,  28 => 6,  26 => 10,  24 => 3,);
    }
}
