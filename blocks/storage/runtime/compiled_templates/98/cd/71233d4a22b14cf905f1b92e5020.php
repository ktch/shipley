<?php

/* content/_layout */
class __TwigTemplate_98cd71233d4a22b14cf905f1b92e5020 extends Twig_Template
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
        // line 2
        $context["totalGlobals"] = (($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "can", array(0 => "editGlobals"), "method")) ? ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "globals"), "getTotalBlocks")) : (0));
        // line 5
        ob_start();
        // line 6
        echo "\t<h1>";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Content"), "html", null, true);
        echo "</h1>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 10
        ob_start();
        // line 11
        echo "\t<li><a";
        if (((isset($context["tab"]) ? $context["tab"] : $this->getContext($context, "tab")) == "entries")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("content"), "html", null, true);
        echo "\" data-icon=\"C\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Entries"), "html", null, true);
        echo "</a></li>
\t<li><a";
        // line 12
        if (((isset($context["tab"]) ? $context["tab"] : $this->getContext($context, "tab")) == "pages")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("content/pages"), "html", null, true);
        echo "\" data-icon=\"c\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Pages"), "html", null, true);
        echo "</a></li>
\t";
        // line 13
        if ((isset($context["totalGlobals"]) ? $context["totalGlobals"] : $this->getContext($context, "totalGlobals"))) {
            echo "<li><a";
            if (((isset($context["tab"]) ? $context["tab"] : $this->getContext($context, "tab")) == "globals")) {
                echo " class=\"active\"";
            }
            echo " href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("content/globals"), "html", null, true);
            echo "\" data-icon=\"G\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Globals"), "html", null, true);
            echo "</a></li>";
        }
        $context["tabs"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "content/_layout";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 12,  458 => 170,  451 => 163,  446 => 158,  438 => 156,  436 => 155,  432 => 154,  429 => 153,  425 => 151,  421 => 149,  416 => 146,  408 => 143,  402 => 141,  400 => 140,  397 => 139,  388 => 138,  382 => 137,  376 => 136,  370 => 135,  363 => 134,  360 => 133,  357 => 132,  354 => 131,  350 => 130,  345 => 127,  336 => 126,  328 => 125,  322 => 124,  316 => 123,  312 => 121,  309 => 120,  307 => 119,  304 => 118,  302 => 117,  299 => 116,  297 => 115,  291 => 112,  285 => 111,  282 => 110,  280 => 109,  274 => 106,  267 => 101,  255 => 99,  252 => 98,  249 => 97,  246 => 96,  243 => 95,  241 => 94,  238 => 93,  232 => 92,  218 => 90,  215 => 89,  211 => 88,  208 => 87,  205 => 86,  190 => 84,  185 => 83,  183 => 82,  172 => 80,  168 => 78,  165 => 77,  157 => 74,  154 => 73,  151 => 72,  148 => 71,  144 => 69,  136 => 67,  131 => 64,  120 => 62,  116 => 61,  109 => 58,  107 => 57,  104 => 56,  101 => 55,  99 => 54,  96 => 53,  93 => 52,  91 => 51,  88 => 47,  86 => 46,  83 => 42,  80 => 40,  78 => 39,  75 => 37,  73 => 36,  70 => 34,  68 => 33,  65 => 31,  63 => 30,  61 => 29,  59 => 26,  57 => 13,  54 => 21,  51 => 19,  44 => 15,  42 => 14,  40 => 12,  36 => 11,  34 => 10,  32 => 8,  30 => 7,  28 => 6,  26 => 5,  24 => 2,);
    }
}
