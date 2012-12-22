<?php

/* _layouts/base */
class __TwigTemplate_eca74fadfe3009c9bd4e864d19f62e16 extends Twig_Template
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
        \Blocks\blx()->templates->includeCssResource("css/blocks.css", true);
        // line 2
        \Blocks\blx()->templates->includeJsResource("js/cp.js", true);
        // line 3
        \Blocks\blx()->templates->includeJsResource((($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "config"), "useCompressedJs")) ? ("js/blocks.js") : ("js/global/bootstrap.js")), true);
        // line 4
        \Blocks\blx()->templates->includeJsResource("lib/Base.js", true);
        // line 5
        \Blocks\blx()->templates->includeJsResource("lib/jquery-1.8.2.min.js", true);
        // line 6
        \Blocks\blx()->templates->includeTranslations(
        	"Are you sure you want to delete this entry block?",
        	"Attempted to get the height of a modal whose container has not been set.",
        	"Attempted to get the width of a modal whose container has not been set.",
        	"Attempted to position a modal whose container has not been set.",
        	"Attempted to position a modal whose container has not been set.",
        	"Save",
        	"Cancel",
        	"Delete",
        	"Show",
        	"Hide",
        	"Close",
        	"An unknown error occurred.",
        	"New order saved.",
        	"Couldn’t save new order.",
        	"Are you sure you want to delete “{name}”?",
        	"“{name}” deleted.",
        	"Couldn’t delete “{name}”."
        );
        // line 26
        echo "<!DOCTYPE html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en-US\">
<head>
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<meta charset=\"utf-8\">
\t<title>";
        // line 31
        echo twig_escape_filter($this->env, strip_tags((isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"))), "html", null, true);
        if (((isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")) && $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "app"), "siteName"))) {
            echo " - ";
        }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "app"), "siteName"), "html", null, true);
        echo "</title>
\t";
        // line 32
        echo \Blocks\blx()->templates->getHeadNodes();
        echo "
\t<meta name=\"viewport\" content=\"width=device-width, maximum-scale=1.0\">
</head>
<body>
\t";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["body"]) ? $context["body"] : $this->getContext($context, "body")), "html", null, true);
        echo "

\t<noscript>
\t\t<div class=\"no-access\">
\t\t\t<div class=\"pane notice\">
\t\t\t\t<div class=\"pane-body\">
\t\t\t\t\t<div class=\"pane-item notice\">
\t\t\t\t\t\t<div class=\"icon\"></div>
\t\t\t\t\t\t<p>";
        // line 44
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("JavaScript must be enabled to access the Blocks CP."), "html", null, true);
        echo "<br>
\t\t\t\t\t\t\t<a class=\"go\" href=\"\">See how</a>
\t\t\t\t\t\t</p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</noscript>

<script type=\"text/javascript\">
\twindow.Blocks = {
\t\tbaseUrl: '";
        // line 55
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(), "html", null, true);
        echo "',
\t\tactionUrl: '";
        // line 56
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getActionUrl(), "html", null, true);
        echo "',
\t\tresourceUrl: '";
        // line 57
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getResourceUrl(), "html", null, true);
        echo "',
\t\tusePathInfo: ";
        // line 58
        echo (($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "config"), "usePathInfo", array(), "method")) ? ("true") : ("false"));
        echo ",
\t\tresourceTrigger: '";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "config"), "resourceTrigger"), "html", null, true);
        echo "',
\t\tactionTrigger: '";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "config"), "actionTrigger"), "html", null, true);
        echo "',
\t\tlanguage: '";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "language"), "html", null, true);
        echo "',
\t\tpackages: ";
        // line 62
        echo twig_jsonencode_filter($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "getPackages"));
        echo ",
\t\ttranslations: ";
        // line 63
        echo \Blocks\blx()->templates->getTranslations();
        echo ",
\t\tmaxUploadSize: ";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "app"), "getMaxUploadSize", array(), "method"), "html", null, true);
        echo "
\t};
</script>

";
        // line 68
        echo \Blocks\blx()->templates->getFootNodes();
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "_layouts/base";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 68,  132 => 64,  128 => 63,  124 => 62,  120 => 61,  116 => 60,  112 => 59,  108 => 58,  104 => 57,  100 => 56,  96 => 55,  82 => 44,  71 => 36,  64 => 32,  56 => 31,  49 => 26,  29 => 6,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,  46 => 15,  43 => 14,  40 => 13,  37 => 12,  35 => 11,  30 => 6,  28 => 4,  26 => 3,  24 => 2,);
    }
}
