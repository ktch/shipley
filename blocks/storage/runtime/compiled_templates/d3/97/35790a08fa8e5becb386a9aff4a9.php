<?php

/* updates */
class __TwigTemplate_d39735790a08fa8e5becb386a9aff4a9 extends Twig_Template
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
        // line 1
        \Blocks\blx()->user->requirePermission("autoUpdateBlocks");
        // line 4
        $context["title"] = \Blocks\Blocks::t("Updates");
        // line 5
        $context["centered"] = true;
        // line 6
        \Blocks\blx()->templates->includeCssResource("css/updates.css");
        // line 7
        \Blocks\blx()->templates->includeJsResource("js/updates.js");
        // line 8
        \Blocks\blx()->templates->includeTranslations(
        	"build {build}",
        	"Critical",
        	"Update",
        	"Install",
        	"{packages} upgrades",
        	"Blocks update required",
        	"Added",
        	"Improved",
        	"Fixed"
        );
        // line 21
        ob_start();
        // line 22
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>

";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 27
        ob_start();
        // line 28
        echo "\t<p id=\"loading\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Checking for updates…"), "html", null, true);
        echo "</p>

\t<div id=\"updates\">
\t\t<h2>";
        // line 31
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("System"), "html", null, true);
        echo "</h2>
\t\t<p id=\"no-system-updates\">";
        // line 32
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("No system updates are available."), "html", null, true);
        echo "</p>

\t\t<table id=\"system-updates\" class=\"data\">
\t\t\t<tbody>
\t\t\t</tbody>
\t\t</table>

\t\t<h2>";
        // line 39
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Plugins"), "html", null, true);
        echo "</h2>
\t\t<p id=\"no-plugin-updates\">";
        // line 40
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("No plugin updates are available."), "html", null, true);
        echo "</p>

\t\t<table id=\"plugin-updates\" class=\"data\">
\t\t\t<tbody>
\t\t\t</tbody>
\t\t</table>
\t</div>

\t<div id=\"update-error\"></div>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "updates";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 40,  78 => 39,  68 => 32,  64 => 31,  57 => 28,  55 => 27,  48 => 22,  46 => 21,  34 => 8,  32 => 7,  30 => 6,  28 => 5,  26 => 4,  24 => 1,);
    }
}
