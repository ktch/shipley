<?php

/* _components/blocktypes/Links/settings */
class __TwigTemplate_66d9eeaa4306f0f6145109d8732d15c2 extends Twig_Template
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
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        echo "

";
        // line 4
        echo $context["forms"]->getselectField(array("label" => \Blocks\Blocks::t("Link Type"), "instructions" => \Blocks\Blocks::t("What do you want to link to?"), "id" => "type", "name" => "type", "options" => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "links"), "getAllLinkTypes"), "value" => $this->getAttribute((isset($context["linkType"]) ? $context["linkType"] : $this->getContext($context, "linkType")), "classHandle"), "toggle" => true, "targetPrefix" => "linktype-"));
        // line 13
        echo "


";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "links"), "getAllLinkTypes"));
        foreach ($context['_seq'] as $context["_key"] => $context["_linkType"]) {
            // line 17
            echo "\t";
            $context["isCurrent"] = ($this->getAttribute((isset($context["_linkType"]) ? $context["_linkType"] : $this->getContext($context, "_linkType")), "classHandle") == $this->getAttribute((isset($context["linkType"]) ? $context["linkType"] : $this->getContext($context, "linkType")), "classHandle"));
            // line 18
            echo "\t";
            if ((isset($context["isCurrent"]) ? $context["isCurrent"] : $this->getContext($context, "isCurrent"))) {
                // line 19
                echo "\t\t";
                $context["linkTypeSettings"] = $this->getAttribute((isset($context["linkType"]) ? $context["linkType"] : $this->getContext($context, "linkType")), "settingsHtml");
                // line 20
                echo "\t";
            } else {
                // line 21
                echo "\t\t";
                $context["linkTypeSettings"] = $this->getAttribute((isset($context["_linkType"]) ? $context["_linkType"] : $this->getContext($context, "_linkType")), "settingsHtml");
                // line 22
                echo "\t";
            }
            // line 23
            echo "
\t";
            // line 24
            if ((isset($context["linkTypeSettings"]) ? $context["linkTypeSettings"] : $this->getContext($context, "linkTypeSettings"))) {
                // line 25
                echo "\t\t<div id=\"linktype-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["_linkType"]) ? $context["_linkType"] : $this->getContext($context, "_linkType")), "classHandle"), "html", null, true);
                echo "\"";
                if ((!(isset($context["isCurrent"]) ? $context["isCurrent"] : $this->getContext($context, "isCurrent")))) {
                    echo " class=\"hidden\"";
                }
                echo ">
\t\t\t";
                // line 26
                $context["namespace"] = (("types[" . $this->getAttribute((isset($context["_linkType"]) ? $context["_linkType"] : $this->getContext($context, "_linkType")), "classHandle")) . "]");
                // line 27
                echo \Blocks\blx()->templates->namespaceInputs((isset($context["linkTypeSettings"]) ? $context["linkTypeSettings"] : $this->getContext($context, "linkTypeSettings")), (isset($context["namespace"]) ? $context["namespace"] : $this->getContext($context, "namespace")));
                // line 28
                echo "</div>
\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['_linkType'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 31
        echo "

";
        // line 33
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("“Add Links” Label"), "translatable" => true, "instructions" => \Blocks\Blocks::t("What do you want the “Add Links” button to say?"), "id" => "addLabel", "name" => "addLabel", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "addLabel")));
        // line 40
        echo "

";
        // line 42
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("“Remove Links” Label"), "translatable" => true, "instructions" => \Blocks\Blocks::t("What do you want the “Remove Links” button to say?"), "id" => "removeLabel", "name" => "removeLabel", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "removeLabel")));
        // line 49
        echo "

";
        // line 51
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Limit"), "id" => "limit", "name" => "limit", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "limit"), "size" => 5));
        // line 57
        echo "

";
        // line 59
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Reverse Link Handle"), "instructions" => \Blocks\Blocks::t("How you’ll refer to the links in the templates, from the linked entities."), "id" => "reverseHandle", "name" => "reverseHandle", "class" => "code", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "reverseHandle")));
        // line 66
        echo "
";
    }

    public function getTemplateName()
    {
        return "_components/blocktypes/Links/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 66,  96 => 51,  90 => 42,  86 => 40,  72 => 28,  70 => 27,  54 => 23,  48 => 21,  36 => 17,  32 => 16,  154 => 95,  152 => 94,  148 => 92,  139 => 88,  137 => 87,  135 => 86,  125 => 84,  123 => 83,  120 => 82,  117 => 81,  114 => 80,  111 => 79,  108 => 78,  105 => 77,  102 => 59,  98 => 57,  94 => 73,  92 => 49,  89 => 63,  87 => 62,  84 => 33,  80 => 31,  75 => 54,  71 => 52,  69 => 48,  65 => 46,  59 => 25,  57 => 24,  51 => 22,  43 => 12,  41 => 11,  38 => 10,  34 => 8,  27 => 13,  25 => 4,  21 => 2,  19 => 1,  83 => 38,  79 => 36,  77 => 55,  74 => 34,  68 => 26,  63 => 39,  61 => 29,  53 => 26,  47 => 14,  45 => 20,  42 => 19,  39 => 18,  37 => 14,  35 => 11,  30 => 6,  28 => 6,  26 => 10,  24 => 3,);
    }
}
