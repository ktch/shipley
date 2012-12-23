<?php

/* settings */
class __TwigTemplate_27711bdf37b78ebda6bcca25be53000b extends Twig_Template
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
        $context["title"] = \Blocks\Blocks::t("Settings");
        // line 3
        $context["centered"] = true;
        // line 6
        ob_start();
        // line 7
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 11
        ob_start();
        // line 12
        echo "\t<h2>System</h2>

\t<ul class=\"icons\">
\t\t<li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/general"), "html", null, true);
        echo "\" data-icon=\"g\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("General"), "html", null, true);
        echo "</a></li>
\t\t";
        // line 16
        if (($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "config"), "siteRoutesSource") != "file")) {
            // line 17
            echo "\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/routes"), "html", null, true);
            echo "\" data-icon=\"⇈\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Routes"), "html", null, true);
            echo "</a></li>
\t\t";
        }
        // line 19
        echo "\t\t";
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Users"), "method")) {
            // line 20
            echo "\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/users"), "html", null, true);
            echo "\" data-icon=\"U\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Users"), "html", null, true);
            echo "</a></li>
\t\t";
        }
        // line 22
        echo "\t\t<li><a href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/email"), "html", null, true);
        echo "\" data-icon=\"E\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Email"), "html", null, true);
        echo "</a></li>
\t\t<li><a href=\"";
        // line 23
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/plugins"), "html", null, true);
        echo "\" data-icon=\"P\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Plugins"), "html", null, true);
        echo "</a></li>
\t</ul>

\t<hr>

\t<h2>Content</h2>

\t<ul class=\"icons\">
\t\t";
        // line 31
        if ((!$this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method"))) {
            // line 32
            echo "\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/blog"), "html", null, true);
            echo "\" data-icon=\"C\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Blog"), "html", null, true);
            echo "</a></li>
\t\t";
        } else {
            // line 34
            echo "\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/sections"), "html", null, true);
            echo "\" data-icon=\"n\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Sections"), "html", null, true);
            echo "</a></li>
\t\t";
        }
        // line 36
        echo "\t\t<li><a href=\"";
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/globals"), "html", null, true);
        echo "\" data-icon=\"G\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Globals"), "html", null, true);
        echo "</a></li>
\t\t<li><a href=\"";
        // line 37
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets"), "html", null, true);
        echo "\" data-icon=\"A\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Assets"), "html", null, true);
        echo "</a></li>
\t\t";
        // line 38
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Language"), "method")) {
            // line 39
            echo "\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/languages"), "html", null, true);
            echo "\" data-icon=\"L\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Languages"), "html", null, true);
            echo "</a></li>
\t\t";
        }
        // line 41
        echo "\t</ul>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 41,  123 => 39,  121 => 38,  115 => 37,  108 => 36,  100 => 34,  92 => 32,  90 => 31,  77 => 23,  70 => 22,  62 => 20,  59 => 19,  51 => 17,  49 => 16,  43 => 15,  38 => 12,  36 => 11,  30 => 7,  28 => 6,  26 => 3,  24 => 2,);
    }
}
