<?php

/* settings/general */
class __TwigTemplate_53e622b7e34e179ad24f662291c4c85a extends Twig_Template
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
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 3
        $context["title"] = \Blocks\Blocks::t("General Settings");
        // line 4
        $context["centered"] = true;
        // line 7
        ob_start();
        // line 8
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 15
        ob_start();
        // line 16
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"systemSettings/saveGeneralSettings\">
\t\t<input type=\"hidden\" name=\"redirect\" value=\"settings\">

\t\t";
        // line 20
        echo $context["forms"]->getlightswitchField(array("label" => \Blocks\Blocks::t("System Status"), "id" => "on", "name" => "isSystemOn", "on" => ((array_key_exists("post", $context)) ? ($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "on")) : ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "app"), "isSystemOn"))), "onLabel" => \Blocks\Blocks::t("On"), "offLabel" => \Blocks\Blocks::t("Off")));
        // line 27
        echo "

\t\t";
        // line 29
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Site Name"), "id" => "siteName", "name" => "siteName", "value" => ((array_key_exists("post", $context)) ? ($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "siteName")) : ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "app"), "siteName"))), "autofocus" => true, "required" => true, "errors" => ((array_key_exists("post", $context)) ? ($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "getErrors", array(0 => "siteName"), "method")) : (null))));
        // line 37
        echo "

\t\t";
        // line 39
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Site URL"), "id" => "siteUrl", "name" => "siteUrl", "value" => ((array_key_exists("post", $context)) ? ($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "siteUrl")) : ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "app"), "siteUrl"))), "required" => true, "errors" => ((array_key_exists("post", $context)) ? ($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "getErrors", array(0 => "siteUrl"), "method")) : (null))));
        // line 46
        echo "

\t\t";
        // line 48
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("License Key"), "id" => "licenseKey", "class" => "code", "name" => "licenseKey", "value" => ((array_key_exists("post", $context)) ? ($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "licenseKey")) : ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "app"), "licenseKey"))), "required" => true, "errors" => ((array_key_exists("post", $context)) ? ($this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "getErrors", array(0 => "licenseKey"), "method")) : (null))));
        // line 56
        echo "

\t\t";
        // line 58
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Rebrand"), "method")) {
            // line 59
            echo "
\t\t\t";
            // line 60
            \Blocks\blx()->templates->includeTranslations(
            	"Are you sure you want to delete the logo?"
            );
            // line 63
            echo "\t\t\t";
            \Blocks\blx()->templates->includeJsResource("js/global/ui/QQUploader.js");
            // line 64
            echo "\t\t\t";
            \Blocks\blx()->templates->includeJsResource("lib/imgareaselect/jquery.imgareaselect.pack.js");
            // line 65
            echo "\t\t\t";
            \Blocks\blx()->templates->includeJsResource("js/global/ui/ImageUpload.js");
            // line 66
            echo "\t\t\t";
            \Blocks\blx()->templates->includeJsResource("js/rebrand.js");
            // line 67
            echo "\t\t\t";
            \Blocks\blx()->templates->includeCssResource("lib/imgareaselect/imgareaselect-animated.css");
            // line 68
            echo "\t\t\t";
            \Blocks\blx()->templates->includeCssResource("css/rebrand.css");
            // line 69
            echo "
\t\t\t";
            // line 70
            ob_start();
            // line 71
            echo "                ";
            $this->env->loadTemplate("settings/general/_logo")->display($context);
            // line 72
            echo "\t\t\t";
            $context["logoInput"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 73
            echo "
\t\t\t";
            // line 74
            echo $context["forms"]->getfield(array("label" => \Blocks\Blocks::t("Logo")), (isset($context["logoInput"]) ? $context["logoInput"] : $this->getContext($context, "logoInput")));
            // line 76
            echo "

\t\t\t<div class=\"clear\"></div>
\t\t";
        }
        // line 80
        echo "
\t\t<div class=\"buttons\">
\t\t\t<input class=\"btn submit\" type=\"submit\" value=\"";
        // line 82
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">
\t\t</div>
\t</form>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/general";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 82,  127 => 80,  121 => 76,  119 => 74,  116 => 73,  113 => 72,  110 => 71,  108 => 70,  105 => 69,  102 => 68,  99 => 67,  96 => 66,  93 => 65,  90 => 64,  87 => 63,  83 => 60,  80 => 59,  78 => 58,  74 => 56,  72 => 48,  68 => 46,  66 => 39,  62 => 37,  60 => 29,  56 => 27,  54 => 20,  48 => 16,  46 => 15,  38 => 10,  32 => 8,  30 => 7,  28 => 4,  26 => 3,  24 => 2,);
    }
}
