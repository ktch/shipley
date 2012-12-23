<?php

/* _components/blocktypes/PlainText/input */
class __TwigTemplate_2fb35c00f256eab4408cc94b4ba25493 extends Twig_Template
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
        // line 3
        $context["config"] = array("id" => (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "name" => (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "value" => (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "hint" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "hint"), "rows" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "initialRows"));
        // line 10
        echo "
";
        // line 11
        if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "multiline")) {
            // line 12
            echo "\t";
            echo $context["forms"]->gettextarea((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            echo "
";
        } else {
            // line 14
            echo "\t";
            echo $context["forms"]->gettext((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "_components/blocktypes/PlainText/input";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 12,  29 => 11,  21 => 2,  19 => 1,  43 => 17,  39 => 15,  37 => 14,  32 => 8,  30 => 7,  28 => 4,  26 => 10,  24 => 3,);
    }
}
