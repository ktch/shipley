<?php

/* settings/assets/sources/_settings */
class __TwigTemplate_5324a2245f9ecb9fd8a989a014af2887 extends Twig_Template
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
        // line 6
        if (((!array_key_exists("source", $context)) && array_key_exists("sourceId", $context))) {
            // line 7
            $context["source"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getSourceById", array(0 => (isset($context["sourceId"]) ? $context["sourceId"] : $this->getContext($context, "sourceId"))), "method");
            // line 8
            if ((!(isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 12
        if (array_key_exists("source", $context)) {
            // line 13
            $context["sourceType"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "populateSourceType", array(0 => (isset($context["source"]) ? $context["source"] : $this->getContext($context, "source"))), "method");
        } else {
            // line 15
            $context["sourceType"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getSourceType", array(0 => "Local"), "method");
        }
        // line 19
        $context["isNewSource"] = ((!array_key_exists("source", $context)) || (!$this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "id")));
        // line 22
        if ((isset($context["isNewSource"]) ? $context["isNewSource"] : $this->getContext($context, "isNewSource"))) {
            // line 23
            $context["title"] = \Blocks\Blocks::t("Create a new asset source");
        } else {
            // line 25
            $context["title"] = \Blocks\Blocks::t("{name} Settings", array("name" => (("<i>" . \Blocks\Blocks::t($this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "name"))) . "</i>")));
        }
        // line 29
        ob_start();
        // line 30
        echo "\t<h1>";
        echo (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"));
        echo "</h1>
\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 32
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Asset Sources"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 37
        ob_start();
        // line 38
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"assetSources/saveSource\">
\t\t<input type=\"hidden\" name=\"redirect\" value=\"settings/assets\">
\t\t";
        // line 41
        if ((!(isset($context["isNewSource"]) ? $context["isNewSource"] : $this->getContext($context, "isNewSource")))) {
            echo "<input type=\"hidden\" name=\"sourceId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "id"), "html", null, true);
            echo "\">";
        }
        // line 42
        echo "
\t\t";
        // line 43
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Name"), "id" => "name", "name" => "name", "value" => ((array_key_exists("source", $context)) ? ($this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "name")) : (null)), "errors" => ((array_key_exists("source", $context)) ? ($this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "getErrors", array(0 => "name"), "method")) : (null)), "autofocus" => true, "required" => true, "translatable" => true));
        // line 52
        echo "

\t\t";
        // line 54
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Cloud"), "method")) {
            // line 55
            echo "\t\t\t";
            $context["sourceTypes"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getAllSourceTypes");
            // line 56
            echo "
            ";
            // line 57
            \Blocks\blx()->templates->includeJsResource("js/Assets/EditSource.js");
            // line 58
            echo "
\t\t\t";
            // line 59
            echo $context["forms"]->getselectField(array("label" => "Type", "instructions" => \Blocks\Blocks::t("What type of source is this?"), "id" => "type", "name" => "type", "options" => (isset($context["sourceTypes"]) ? $context["sourceTypes"] : $this->getContext($context, "sourceTypes")), "value" => $this->getAttribute((isset($context["sourceType"]) ? $context["sourceType"] : $this->getContext($context, "sourceType")), "classHandle"), "toggle" => true));
            // line 67
            echo "

\t\t\t";
            // line 69
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sourceTypes"]) ? $context["sourceTypes"] : $this->getContext($context, "sourceTypes")));
            foreach ($context['_seq'] as $context["_key"] => $context["_sourceType"]) {
                // line 70
                echo "\t\t\t\t";
                $context["isCurrent"] = ($this->getAttribute((isset($context["_sourceType"]) ? $context["_sourceType"] : $this->getContext($context, "_sourceType")), "classHandle") == $this->getAttribute((isset($context["sourceType"]) ? $context["sourceType"] : $this->getContext($context, "sourceType")), "classHandle"));
                // line 71
                echo "\t\t\t\t";
                if ((isset($context["isCurrent"]) ? $context["isCurrent"] : $this->getContext($context, "isCurrent"))) {
                    // line 72
                    echo "\t\t\t\t\t";
                    $context["settings"] = $this->getAttribute((isset($context["sourceType"]) ? $context["sourceType"] : $this->getContext($context, "sourceType")), "settingsHtml");
                    // line 73
                    echo "\t\t\t\t";
                } else {
                    // line 74
                    echo "\t\t\t\t\t";
                    $context["settings"] = $this->getAttribute((isset($context["_sourceType"]) ? $context["_sourceType"] : $this->getContext($context, "_sourceType")), "settingsHtml");
                    // line 75
                    echo "\t\t\t\t";
                }
                // line 76
                echo "
\t\t\t\t";
                // line 77
                if ((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings"))) {
                    // line 78
                    echo "\t\t\t\t\t<div id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["_sourceType"]) ? $context["_sourceType"] : $this->getContext($context, "_sourceType")), "classHandle"), "html", null, true);
                    echo "\"";
                    if ((!(isset($context["isCurrent"]) ? $context["isCurrent"] : $this->getContext($context, "isCurrent")))) {
                        echo " class=\"hidden\"";
                    }
                    echo ">
\t\t\t\t\t\t<hr>
\t\t\t\t\t\t";
                    // line 80
                    $context["namespace"] = (("types[" . $this->getAttribute((isset($context["_sourceType"]) ? $context["_sourceType"] : $this->getContext($context, "_sourceType")), "classHandle")) . "]");
                    // line 81
                    echo \Blocks\blx()->templates->namespaceInputs((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), (isset($context["namespace"]) ? $context["namespace"] : $this->getContext($context, "namespace")));
                    // line 82
                    echo "<hr>
\t\t\t\t\t</div>
\t\t\t\t";
                }
                // line 85
                echo "\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['_sourceType'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 86
            echo "\t\t";
        } else {
            // line 87
            echo "\t\t\t";
            $context["settings"] = $this->getAttribute((isset($context["sourceType"]) ? $context["sourceType"] : $this->getContext($context, "sourceType")), "settingsHtml");
            // line 88
            echo "\t\t\t";
            $context["namespace"] = (("types[" . $this->getAttribute((isset($context["sourceType"]) ? $context["sourceType"] : $this->getContext($context, "sourceType")), "classHandle")) . "]");
            // line 89
            echo \Blocks\blx()->templates->namespaceInputs((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), (isset($context["namespace"]) ? $context["namespace"] : $this->getContext($context, "namespace")));
        }
        // line 91
        echo "
\t\t<div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 93
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
        return "settings/assets/sources/_settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 93,  176 => 91,  173 => 89,  170 => 88,  167 => 87,  164 => 86,  158 => 85,  153 => 82,  151 => 81,  149 => 80,  139 => 78,  137 => 77,  134 => 76,  131 => 75,  128 => 74,  125 => 73,  122 => 72,  119 => 71,  116 => 70,  112 => 69,  108 => 67,  106 => 59,  103 => 58,  101 => 57,  98 => 56,  95 => 55,  93 => 54,  89 => 52,  87 => 43,  84 => 42,  78 => 41,  73 => 38,  71 => 37,  63 => 32,  57 => 30,  55 => 29,  52 => 25,  49 => 23,  47 => 22,  45 => 19,  42 => 15,  39 => 13,  37 => 12,  32 => 8,  30 => 7,  28 => 6,  26 => 3,  24 => 2,);
    }
}
