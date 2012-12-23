<?php

/* dashboard/settings/_widgetsettings */
class __TwigTemplate_bb93a4aa1624794d1143bb3ea23cf9fb extends Twig_Template
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
        // line 3
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 5
        if (((!array_key_exists("widget", $context)) && array_key_exists("widgetId", $context))) {
            // line 6
            $context["widget"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "dashboard"), "getUserWidgetById", array(0 => (isset($context["widgetId"]) ? $context["widgetId"] : $this->getContext($context, "widgetId"))), "method");
            // line 7
            if ((!(isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 11
        if (array_key_exists("widget", $context)) {
            // line 12
            $context["widgetType"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "dashboard"), "populateWidgetType", array(0 => (isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget"))), "method");
            // line 13
            $context["isWidgetTypeMissing"] = (!(isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType")));
        } else {
            // line 15
            $context["isWidgetTypeMissing"] = false;
        }
        // line 18
        if (((!array_key_exists("widgetType", $context)) || (isset($context["isWidgetTypeMissing"]) ? $context["isWidgetTypeMissing"] : $this->getContext($context, "isWidgetTypeMissing")))) {
            // line 19
            $context["widgetType"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "dashboard"), "getWidgetType", array(0 => "Feed"), "method");
        }
        // line 23
        $context["isNewWidget"] = ((!array_key_exists("widget", $context)) || (!$this->getAttribute((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "id")));
        // line 26
        if ((isset($context["isNewWidget"]) ? $context["isNewWidget"] : $this->getContext($context, "isNewWidget"))) {
            // line 27
            $context["title"] = \Blocks\Blocks::t("Add a new widget.");
        } else {
            // line 29
            $context["title"] = \Blocks\Blocks::t("{name} Settings", array("name" => (("<i>" . $this->getAttribute((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType")), "title")) . "</i>")));
        }
        // line 33
        ob_start();
        // line 34
        echo "\t<h1>";
        echo (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"));
        echo "</h1>
\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 36
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("dashboard/settings"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Dashboard Settings"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 41
        ob_start();
        // line 42
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"dashboard/saveUserWidget\">
\t\t<input type=\"hidden\" name=\"redirect\" value=\"dashboard/settings\">
\t\t";
        // line 45
        if ((!(isset($context["isNewWidget"]) ? $context["isNewWidget"] : $this->getContext($context, "isNewWidget")))) {
            echo "<input type=\"hidden\" name=\"widgetId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "id"), "html", null, true);
            echo "\">";
        }
        // line 46
        echo "
\t\t";
        // line 47
        $context["widgetTypes"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "dashboard"), "getAllWidgetTypes");
        // line 48
        echo "
\t\t";
        // line 49
        echo $context["forms"]->getselectField(array("label" => "Type", "instructions" => \Blocks\Blocks::t("What type of widget is this?"), "id" => "type", "name" => "type", "options" => (isset($context["widgetTypes"]) ? $context["widgetTypes"] : $this->getContext($context, "widgetTypes")), "value" => $this->getAttribute((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType")), "classHandle"), "errors" => (((isset($context["isWidgetTypeMissing"]) ? $context["isWidgetTypeMissing"] : $this->getContext($context, "isWidgetTypeMissing"))) ? (array(0 => \Blocks\Blocks::t("The widget class “{class}” could not be found.", array("class" => $this->getAttribute((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "type"))))) : (null)), "autofocus" => true, "toggle" => true));
        // line 59
        echo "

\t\t";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["widgetTypes"]) ? $context["widgetTypes"] : $this->getContext($context, "widgetTypes")));
        foreach ($context['_seq'] as $context["_key"] => $context["_widgetType"]) {
            // line 62
            echo "\t\t\t";
            $context["isCurrent"] = ($this->getAttribute((isset($context["_widgetType"]) ? $context["_widgetType"] : $this->getContext($context, "_widgetType")), "classHandle") == $this->getAttribute((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType")), "classHandle"));
            // line 63
            echo "\t\t\t";
            if ((isset($context["isCurrent"]) ? $context["isCurrent"] : $this->getContext($context, "isCurrent"))) {
                // line 64
                echo "\t\t\t\t";
                $context["settings"] = $this->getAttribute((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType")), "settingsHtml");
                // line 65
                echo "\t\t\t";
            } else {
                // line 66
                echo "\t\t\t\t";
                $context["settings"] = $this->getAttribute((isset($context["_widgetType"]) ? $context["_widgetType"] : $this->getContext($context, "_widgetType")), "settingsHtml");
                // line 67
                echo "\t\t\t";
            }
            // line 68
            echo "
\t\t\t";
            // line 69
            if ((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings"))) {
                // line 70
                echo "\t\t\t\t<div id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["_widgetType"]) ? $context["_widgetType"] : $this->getContext($context, "_widgetType")), "classHandle"), "html", null, true);
                echo "\"";
                if ((!(isset($context["isCurrent"]) ? $context["isCurrent"] : $this->getContext($context, "isCurrent")))) {
                    echo " class=\"hidden\"";
                }
                echo ">
\t\t\t\t\t<hr>
\t\t\t\t\t";
                // line 72
                $context["namespace"] = (("types[" . $this->getAttribute((isset($context["_widgetType"]) ? $context["_widgetType"] : $this->getContext($context, "_widgetType")), "classHandle")) . "]");
                // line 73
                echo \Blocks\blx()->templates->namespaceInputs((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), (isset($context["namespace"]) ? $context["namespace"] : $this->getContext($context, "namespace")));
                // line 74
                echo "<hr>
\t\t\t\t</div>
\t\t\t";
            }
            // line 77
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['_widgetType'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 78
        echo "
\t\t<div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 80
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
        return "dashboard/settings/_widgetsettings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 80,  157 => 78,  151 => 77,  146 => 74,  144 => 73,  142 => 72,  132 => 70,  130 => 69,  127 => 68,  124 => 67,  121 => 66,  118 => 65,  115 => 64,  112 => 63,  109 => 62,  105 => 61,  101 => 59,  99 => 49,  96 => 48,  94 => 47,  91 => 46,  85 => 45,  80 => 42,  78 => 41,  70 => 36,  64 => 34,  62 => 33,  59 => 29,  56 => 27,  54 => 26,  52 => 23,  49 => 19,  47 => 18,  44 => 15,  41 => 13,  39 => 12,  37 => 11,  32 => 7,  30 => 6,  28 => 5,  26 => 3,  24 => 2,);
    }
}
