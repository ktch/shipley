<?php

/* _components/linktypes/Users/settings */
class __TwigTemplate_d24667e7c7ef1416b330b1ad32190135 extends Twig_Template
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
        $context["__internal_b4f1829a56d1bfb99489533b1be8ad438e85b71d"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        echo "
";
        // line 3
        echo $context["__internal_b4f1829a56d1bfb99489533b1be8ad438e85b71d"]->getcheckboxSelectField(array("label" => \Blocks\Blocks::t("User Groups"), "instructions" => \Blocks\Blocks::t("Which user groups do you want to link users from?"), "id" => "groupId", "name" => "groupId", "options" => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "userGroups"), "getAllGroups", array(0 => "id"), "method"), "values" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "groupId")));
        // line 10
        echo "
";
    }

    public function getTemplateName()
    {
        return "_components/linktypes/Users/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 11,  104 => 66,  96 => 51,  90 => 42,  86 => 40,  72 => 28,  70 => 27,  54 => 23,  48 => 21,  36 => 17,  32 => 16,  154 => 95,  152 => 94,  148 => 92,  139 => 88,  137 => 87,  135 => 86,  125 => 84,  123 => 83,  120 => 82,  117 => 81,  114 => 80,  111 => 79,  108 => 78,  105 => 77,  102 => 59,  98 => 57,  94 => 73,  92 => 49,  89 => 63,  87 => 62,  84 => 33,  80 => 31,  75 => 54,  71 => 52,  69 => 48,  65 => 46,  59 => 25,  57 => 24,  51 => 22,  43 => 12,  41 => 11,  38 => 10,  34 => 8,  27 => 13,  25 => 4,  21 => 2,  19 => 1,  83 => 38,  79 => 36,  77 => 55,  74 => 34,  68 => 26,  63 => 39,  61 => 29,  53 => 26,  47 => 14,  45 => 20,  42 => 19,  39 => 18,  37 => 14,  35 => 11,  30 => 6,  28 => 6,  26 => 10,  24 => 3,);
    }
}
