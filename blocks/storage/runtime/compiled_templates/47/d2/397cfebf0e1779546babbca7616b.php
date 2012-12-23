<?php

/* settings/assets/_layout */
class __TwigTemplate_47d2397cfebf0e1779546babbca7616b extends Twig_Template
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
        ob_start();
        // line 6
        echo "\t<h1>";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Assets"), "html", null, true);
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
        echo "\t<li><a";
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == "sources")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Sources"), "html", null, true);
        echo "</a></li>
    <li><a";
        // line 15
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == "operations")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets/operations"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Operations"), "html", null, true);
        echo "</a></li>
    <li><a";
        // line 16
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == "sizes")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets/sizes"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Sizes"), "html", null, true);
        echo "</a></li>
\t<li><a";
        // line 17
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == "blocks")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets/blocks"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Asset Blocks"), "html", null, true);
        echo "</a></li>
";
        $context["tabs"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/assets/_layout";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 14,  42 => 13,  34 => 8,  141 => 50,  132 => 41,  124 => 36,  120 => 34,  115 => 31,  105 => 28,  98 => 27,  92 => 26,  86 => 25,  79 => 24,  75 => 17,  70 => 20,  65 => 16,  59 => 18,  55 => 15,  50 => 14,  47 => 13,  45 => 12,  39 => 9,  32 => 8,  30 => 7,  28 => 6,  26 => 5,  24 => 2,);
    }
}
