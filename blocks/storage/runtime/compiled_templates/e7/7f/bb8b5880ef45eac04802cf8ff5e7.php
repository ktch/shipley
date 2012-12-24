<?php

/* _includes/blockfield */
class __TwigTemplate_e77fbb8b5880ef45eac04802cf8ff5e7 extends Twig_Template
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
        $context["__internal_3dc77cea6f29685ff6a100ee6dc8a3b65cd1c1ba"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        if ((!array_key_exists("entity", $context))) {
            $context["entity"] = null;
        }
        // line 3
        echo "
";
        // line 4
        $context["value"] = (($this->getContext($context, "entity")) ? ($this->getAttribute($this->getContext($context, "entity"), $this->getAttribute($this->getContext($context, "block"), "handle"))) : (null));
        // line 5
        $context["errors"] = (($this->getContext($context, "entity")) ? ($this->getAttribute($this->getContext($context, "entity"), "getErrors", array(0 => $this->getAttribute($this->getContext($context, "block"), "handle")), "method")) : (null));
        // line 6
        $context["blockType"] = $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "blockTypes"), "populateBlockType", array(0 => $this->getContext($context, "block"), 1 => $this->getContext($context, "entity")), "method");
        // line 7
        echo "
";
        // line 8
        if ($this->getContext($context, "blockType")) {
            // line 9
            echo "\t";
            $context["input"] = $this->getAttribute($this->getContext($context, "blockType"), "getInputHtml", array(0 => $this->getAttribute($this->getContext($context, "block"), "handle"), 1 => $this->getContext($context, "value")), "method");
        } else {
            // line 11
            echo "\t";
            $context["input"] = (("<p class=\"error\">" . \Blocks\Blocks::t("The blocktype class “{class}” could not be found.", array("class" => $this->getAttribute($this->getContext($context, "block"), "type")))) . "</p>");
        }
        // line 13
        echo "
";
        // line 14
        echo \Blocks\blx()->templates->namespaceInputs($context["__internal_3dc77cea6f29685ff6a100ee6dc8a3b65cd1c1ba"]->getfield(array("label" => $this->getAttribute($this->getContext($context, "block"), "name"), "required" => $this->getAttribute($this->getContext($context, "block"), "required"), "translatable" => $this->getAttribute($this->getContext($context, "block"), "translatable"), "instructions" => $this->getAttribute($this->getContext($context, "block"), "instructions"), "id" => $this->getAttribute($this->getContext($context, "block"), "handle"), "errors" => $this->getContext($context, "errors")), $this->getContext($context, "input")), "blocks");
        // line 21
        echo "
";
    }

    public function getTemplateName()
    {
        return "_includes/blockfield";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 21,  47 => 13,  43 => 11,  39 => 9,  34 => 7,  69 => 26,  65 => 24,  59 => 23,  50 => 14,  40 => 12,  35 => 9,  27 => 5,  25 => 3,  21 => 2,  19 => 1,  205 => 72,  202 => 71,  195 => 67,  191 => 65,  189 => 64,  183 => 63,  180 => 62,  174 => 59,  171 => 58,  169 => 57,  163 => 53,  152 => 51,  148 => 50,  137 => 44,  131 => 40,  123 => 37,  118 => 35,  116 => 34,  114 => 33,  101 => 32,  98 => 31,  94 => 30,  76 => 22,  73 => 21,  66 => 18,  60 => 17,  56 => 22,  53 => 21,  42 => 17,  37 => 8,  31 => 7,  88 => 28,  82 => 23,  75 => 23,  70 => 21,  61 => 20,  58 => 19,  55 => 18,  51 => 14,  48 => 16,  46 => 19,  38 => 10,  32 => 6,  30 => 5,  28 => 4,  26 => 4,  24 => 2,);
    }
}
