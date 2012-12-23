<?php

/* _includes/blocksettings */
class __TwigTemplate_beba370a7ff55f45e628f4da57f75424 extends Twig_Template
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
        if ((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) {
            // line 5
            echo "\t";
            $context["blockType"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "blockTypes"), "populateBlockType", array(0 => (isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))), "method");
            // line 6
            echo "\t";
            $context["isBlockTypeMissing"] = (!(isset($context["blockType"]) ? $context["blockType"] : $this->getContext($context, "blockType")));
        } else {
            // line 8
            echo "\t";
            $context["isBlockTypeMissing"] = false;
        }
        // line 10
        echo "
";
        // line 11
        if (((!array_key_exists("blockType", $context)) || (isset($context["isBlockTypeMissing"]) ? $context["isBlockTypeMissing"] : $this->getContext($context, "isBlockTypeMissing")))) {
            // line 12
            echo "\t";
            $context["blockType"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "blockTypes"), "getBlockType", array(0 => "PlainText"), "method");
        }
        // line 14
        echo "

";
        // line 16
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Name"), "instructions" => \Blocks\Blocks::t("What this block will be called in the CP."), "id" => "name", "name" => "name", "value" => (((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) ? ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "name")) : (null)), "errors" => (((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) ? ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "getErrors", array(0 => "name"), "method")) : (null)), "autofocus" => true, "required" => true, "translatable" => true));
        // line 26
        echo "

";
        // line 28
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Handle"), "instructions" => \Blocks\Blocks::t("How you’ll refer to this block in the templates."), "id" => "handle", "class" => "code", "name" => "handle", "value" => (((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) ? ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "handle")) : (null)), "errors" => (((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) ? ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "getErrors", array(0 => "handle"), "method")) : (null)), "required" => true));
        // line 37
        echo "

";
        // line 39
        echo $context["forms"]->gettextareaField(array("label" => \Blocks\Blocks::t("Instructions"), "instructions" => \Blocks\Blocks::t("Helper text to guide the author."), "name" => "instructions", "value" => (((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) ? ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "instructions")) : (null)), "errors" => (((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) ? ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "getErrors", array(0 => "instructions"), "method")) : (null)), "translatable" => true));
        // line 46
        echo "

";
        // line 48
        echo $context["forms"]->getcheckboxField(array("label" => \Blocks\Blocks::t("This block is required"), "name" => "required", "checked" => (((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) ? ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "required")) : (false))));
        // line 52
        echo "

";
        // line 54
        if ((($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Language"), "method") && array_key_exists("canBeTranslatable", $context)) && (isset($context["canBeTranslatable"]) ? $context["canBeTranslatable"] : $this->getContext($context, "canBeTranslatable")))) {
            // line 55
            echo "\t";
            echo $context["forms"]->getcheckboxField(array("label" => \Blocks\Blocks::t("This block is translatable"), "name" => "translatable", "checked" => (((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) ? ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "translatable")) : (false))));
            // line 59
            echo "
";
        }
        // line 61
        echo "
";
        // line 62
        $context["blockTypes"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "blockTypes"), "getAllBlockTypes");
        // line 63
        echo "
";
        // line 64
        echo $context["forms"]->getselectField(array("label" => "Type", "instructions" => \Blocks\Blocks::t("What type of block is this?"), "id" => "type", "name" => "type", "options" => (isset($context["blockTypes"]) ? $context["blockTypes"] : $this->getContext($context, "blockTypes")), "value" => $this->getAttribute((isset($context["blockType"]) ? $context["blockType"] : $this->getContext($context, "blockType")), "classHandle"), "errors" => (((isset($context["isBlockTypeMissing"]) ? $context["isBlockTypeMissing"] : $this->getContext($context, "isBlockTypeMissing"))) ? (array(0 => \Blocks\Blocks::t("The blocktype class “{class}” could not be found.", array("class" => $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "type"))))) : (null)), "toggle" => true));
        // line 73
        echo "

";
        // line 75
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["blockTypes"]) ? $context["blockTypes"] : $this->getContext($context, "blockTypes")));
        foreach ($context['_seq'] as $context["_key"] => $context["_blockType"]) {
            // line 76
            echo "\t";
            $context["isCurrent"] = ($this->getAttribute((isset($context["_blockType"]) ? $context["_blockType"] : $this->getContext($context, "_blockType")), "classHandle") == $this->getAttribute((isset($context["blockType"]) ? $context["blockType"] : $this->getContext($context, "blockType")), "classHandle"));
            // line 77
            echo "\t";
            if ((isset($context["isCurrent"]) ? $context["isCurrent"] : $this->getContext($context, "isCurrent"))) {
                // line 78
                echo "\t\t";
                $context["settings"] = $this->getAttribute((isset($context["blockType"]) ? $context["blockType"] : $this->getContext($context, "blockType")), "settingsHtml");
                // line 79
                echo "\t";
            } else {
                // line 80
                echo "\t\t";
                $context["settings"] = $this->getAttribute((isset($context["_blockType"]) ? $context["_blockType"] : $this->getContext($context, "_blockType")), "settingsHtml");
                // line 81
                echo "\t";
            }
            // line 82
            echo "
\t";
            // line 83
            if ((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings"))) {
                // line 84
                echo "\t\t<div id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["_blockType"]) ? $context["_blockType"] : $this->getContext($context, "_blockType")), "classHandle"), "html", null, true);
                echo "\"";
                if ((!(isset($context["isCurrent"]) ? $context["isCurrent"] : $this->getContext($context, "isCurrent")))) {
                    echo " class=\"hidden\"";
                }
                echo ">
\t\t\t<hr>
\t\t\t";
                // line 86
                $context["namespace"] = (("types[" . $this->getAttribute((isset($context["_blockType"]) ? $context["_blockType"] : $this->getContext($context, "_blockType")), "classHandle")) . "]");
                // line 87
                echo \Blocks\blx()->templates->namespaceInputs((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), (isset($context["namespace"]) ? $context["namespace"] : $this->getContext($context, "namespace")));
                // line 88
                echo "<hr>
\t\t</div>
\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['_blockType'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 92
        echo "

";
        // line 94
        if (((!(isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) || (!$this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "handle")))) {
            // line 95
            echo "\t";
            \Blocks\blx()->templates->includeJs("new Blocks.ui.HandleGenerator('#name', '#handle');");
        }
    }

    public function getTemplateName()
    {
        return "_includes/blocksettings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 95,  152 => 94,  148 => 92,  139 => 88,  137 => 87,  135 => 86,  125 => 84,  123 => 83,  120 => 82,  117 => 81,  114 => 80,  111 => 79,  108 => 78,  105 => 77,  102 => 76,  98 => 75,  94 => 73,  92 => 64,  89 => 63,  87 => 62,  84 => 61,  80 => 59,  75 => 54,  71 => 52,  69 => 48,  65 => 46,  59 => 37,  57 => 28,  51 => 16,  43 => 12,  41 => 11,  38 => 10,  34 => 8,  27 => 5,  25 => 4,  21 => 2,  19 => 1,  83 => 38,  79 => 36,  77 => 55,  74 => 34,  68 => 33,  63 => 39,  61 => 29,  53 => 26,  47 => 14,  45 => 21,  42 => 17,  39 => 15,  37 => 14,  35 => 11,  30 => 6,  28 => 6,  26 => 5,  24 => 2,);
    }
}
