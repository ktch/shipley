<?php

/* _special/install/welcome */
class __TwigTemplate_792f245818dbd625b761ad8409328a5c extends Twig_Template
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
        echo "<div id=\"welcome\" class=\"modal scaleddown\">
\t<h1>";
        // line 2
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Welcome to Blocks"), "html", null, true);
        echo "</h1>

\t<form id=\"licensekeyform\">
\t\t<input id=\"licensekey\" type=\"text\" class=\"text nicetext fullwidth code\" data-hint=\"";
        // line 5
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Enter your license key…"), "html", null, true);
        echo "\" value=\"71DA-8A58-8775-3FB4-1585-3169\">
\t\t<div id=\"licensekeysubmit\" class=\"btn big submit\">
\t\t\t<input type=\"submit\" tabindex=\"-1\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Submit"), "html", null, true);
        echo "\">
\t\t</div>
\t</form>

\t";
        // line 11
        $this->env->loadTemplate("_special/install/dots")->display(array_merge($context, array("dot" => 1)));
        // line 12
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "_special/install/welcome";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 12,  33 => 7,  22 => 2,  139 => 68,  132 => 64,  128 => 63,  124 => 62,  120 => 61,  116 => 60,  112 => 59,  108 => 58,  104 => 57,  100 => 56,  96 => 55,  82 => 44,  71 => 36,  64 => 32,  56 => 31,  49 => 26,  29 => 6,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,  46 => 15,  43 => 14,  40 => 11,  37 => 12,  35 => 11,  30 => 6,  28 => 5,  26 => 3,  24 => 2,);
    }
}
