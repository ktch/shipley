<?php

/* settings/sections/_edit/layout */
class __TwigTemplate_cc08e13af44512204bc120a7803e019d extends Twig_Template
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
        $context["centered"] = true;
        // line 5
        if (((!array_key_exists("section", $context)) || (!$this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")))) {
            // line 6
            $context["title"] = \Blocks\Blocks::t("Create a new section");
        } else {
            // line 8
            $context["title"] = \Blocks\Blocks::t($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "name"));
            // line 10
            ob_start();
            // line 11
            echo "\t\t<li><a class=\"settings icon";
            if (((isset($context["tab"]) ? $context["tab"] : $this->getContext($context, "tab")) == "settings")) {
                echo " active";
            }
            echo "\" href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("settings/sections/" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
            echo "</a></li>
\t\t<li><a";
            // line 12
            if (((isset($context["tab"]) ? $context["tab"] : $this->getContext($context, "tab")) == "blocks")) {
                echo " class=\"active\"";
            }
            echo " href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl((("settings/sections/" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")) . "/blocks")), "html", null, true);
            echo "\" data-icon=\"b\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Blocks"), "html", null, true);
            echo "</a></li>
\t";
            $context["tabs"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        }
        // line 17
        ob_start();
        // line 18
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 20
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/sections"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Sections"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/sections/_edit/layout";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 20,  60 => 18,  31 => 8,  126 => 102,  120 => 100,  115 => 99,  113 => 98,  106 => 92,  97 => 85,  95 => 78,  91 => 76,  89 => 67,  80 => 63,  76 => 61,  74 => 56,  70 => 54,  68 => 45,  64 => 43,  62 => 34,  58 => 17,  56 => 22,  52 => 20,  46 => 12,  41 => 16,  39 => 15,  37 => 12,  35 => 11,  33 => 10,  28 => 6,  26 => 5,  24 => 2,);
    }
}
