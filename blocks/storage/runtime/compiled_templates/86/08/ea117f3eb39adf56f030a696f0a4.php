<?php

/* _components/blocktypes/PlainText/input */
class __TwigTemplate_8608ea117f3eb39adf56f030a696f0a4 extends Twig_Template
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
        // line 3
        $context["config"] = array("id" => $this->getContext($context, "name"), "name" => $this->getContext($context, "name"), "value" => $this->getContext($context, "value"), "hint" => $this->getAttribute($this->getContext($context, "settings"), "hint"), "rows" => $this->getAttribute($this->getContext($context, "settings"), "initialRows"));
        // line 10
        echo "
";
        // line 11
        if ($this->getAttribute($this->getContext($context, "settings"), "multiline")) {
            // line 12
            echo "\t";
            echo $context["forms"]->gettextarea($this->getContext($context, "config"));
            echo "
";
        } else {
            // line 14
            echo "\t";
            echo $context["forms"]->gettext($this->getContext($context, "config"));
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "_components/blocktypes/PlainText/input";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 11,  52 => 21,  47 => 13,  43 => 11,  39 => 9,  34 => 7,  69 => 26,  65 => 24,  59 => 23,  50 => 14,  40 => 12,  35 => 9,  27 => 5,  25 => 3,  21 => 2,  19 => 1,  205 => 72,  202 => 71,  195 => 67,  191 => 65,  189 => 64,  183 => 63,  180 => 62,  174 => 59,  171 => 58,  169 => 57,  163 => 53,  152 => 51,  148 => 50,  137 => 44,  131 => 40,  123 => 37,  118 => 35,  116 => 34,  114 => 33,  101 => 32,  98 => 31,  94 => 30,  76 => 22,  73 => 21,  66 => 18,  60 => 17,  56 => 22,  53 => 21,  42 => 17,  37 => 14,  31 => 12,  88 => 28,  82 => 23,  75 => 23,  70 => 21,  61 => 20,  58 => 19,  55 => 18,  51 => 14,  48 => 16,  46 => 19,  38 => 10,  32 => 6,  30 => 5,  28 => 4,  26 => 10,  24 => 3,);
    }
}
