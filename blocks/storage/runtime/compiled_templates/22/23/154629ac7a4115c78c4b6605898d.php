<?php

/* settings/email/_layout */
class __TwigTemplate_2223154629ac7a4115c78c4b6605898d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("_layouts/cp");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "_layouts/cp";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 4
        ob_start();
        // line 5
        echo "\t<h1>";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Email"), "html", null, true);
        echo "</h1>

\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 13
        ob_start();
        // line 14
        echo "\t<li><a class=\"settings icon";
        if (($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "segment", array(0 => 3), "method") == "")) {
            echo " active";
        }
        echo "\" href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/email"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
        echo "</a></li>
\t<li><a";
        // line 15
        if (($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "segment", array(0 => 3), "method") == "messages")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/email/messages"), "html", null, true);
        echo "\" data-icon=\"E\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Messages"), "html", null, true);
        echo "</a></li>
";
        $context["tabs"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/email/_layout";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 15,  43 => 14,  33 => 8,  26 => 5,  24 => 4,  173 => 168,  169 => 167,  161 => 161,  159 => 154,  154 => 151,  152 => 145,  148 => 143,  146 => 137,  140 => 136,  136 => 134,  134 => 128,  130 => 126,  128 => 121,  124 => 119,  122 => 112,  118 => 110,  116 => 104,  112 => 102,  110 => 95,  106 => 93,  104 => 87,  100 => 85,  98 => 80,  93 => 77,  91 => 70,  86 => 67,  82 => 65,  79 => 58,  77 => 57,  73 => 55,  71 => 47,  67 => 45,  65 => 36,  59 => 32,  57 => 31,  48 => 25,  41 => 13,  39 => 21,  37 => 20,  34 => 16,  31 => 14,  29 => 13,  27 => 12,  22 => 6,  20 => 5,  18 => 4,  16 => 3,  14 => 2,);
    }
}
