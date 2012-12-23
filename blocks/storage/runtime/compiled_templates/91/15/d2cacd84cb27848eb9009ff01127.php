<?php

/* settings/users/_layout */
class __TwigTemplate_9115d2cacd84cb27848eb9009ff01127 extends Twig_Template
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
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Users"), "html", null, true);
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
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == "groups")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/users"), "html", null, true);
        echo "\" data-icon=\"U\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("User Groups"), "html", null, true);
        echo "</a></li>
\t<li><a";
        // line 15
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == "blocks")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/users/blocks"), "html", null, true);
        echo "\" data-icon=\"b\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Profile Blocks"), "html", null, true);
        echo "</a></li>
\t<li><a class=\"settings icon";
        // line 16
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == "settings")) {
            echo " active";
        }
        echo "\" href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/users/settings"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
        echo "</a></li>
";
        $context["tabs"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/users/_layout";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 16,  44 => 14,  42 => 13,  34 => 8,  116 => 44,  109 => 37,  101 => 32,  97 => 30,  92 => 27,  83 => 24,  79 => 23,  73 => 22,  66 => 21,  62 => 20,  55 => 15,  51 => 15,  47 => 13,  45 => 12,  39 => 9,  32 => 8,  30 => 7,  28 => 6,  26 => 5,  24 => 2,);
    }
}
