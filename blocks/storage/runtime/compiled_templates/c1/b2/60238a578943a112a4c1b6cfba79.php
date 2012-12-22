<?php

/* _special/install/account */
class __TwigTemplate_c1b260238a578943a112a4c1b6cfba79 extends Twig_Template
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

<div id=\"account\" class=\"modal\">
\t<h1>";
        // line 5
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Create your account"), "html", null, true);
        echo "</h1>

\t<form id=\"accountform\" accept-charset=\"UTF-8\">
\t\t";
        // line 8
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Username"), "id" => "username", "maxlength" => 255));
        echo "
\t\t";
        // line 9
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Email"), "id" => "email", "maxlength" => 255));
        echo "
\t\t";
        // line 10
        echo $context["forms"]->getpasswordField(array("label" => \Blocks\Blocks::t("Password"), "id" => "password"));
        echo "

\t\t<div class=\"buttons\">
\t\t\t<div id=\"accountsubmit\" class=\"btn big submit\">";
        // line 13
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Next"), "html", null, true);
        echo "
\t\t\t\t<input type=\"submit\" tabindex=\"-1\">
\t\t\t</div>
\t\t</div>
\t</form>

\t";
        // line 19
        $this->env->loadTemplate("_special/install/dots")->display(array_merge($context, array("dot" => 2)));
        // line 20
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "_special/install/account";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 20,  55 => 19,  36 => 9,  32 => 8,  34 => 4,  42 => 12,  33 => 7,  22 => 2,  139 => 68,  132 => 64,  128 => 63,  124 => 62,  120 => 61,  116 => 60,  112 => 59,  108 => 58,  104 => 57,  100 => 56,  96 => 55,  82 => 44,  71 => 36,  64 => 32,  56 => 31,  49 => 26,  29 => 6,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,  46 => 13,  43 => 14,  40 => 10,  37 => 12,  35 => 11,  30 => 6,  28 => 3,  26 => 5,  24 => 2,);
    }
}
