<?php

/* _components/assetsourcetypes/Local/settings */
class __TwigTemplate_6a21c3b1dd1931f43e0419db65c280e6 extends Twig_Template
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
        $context["__internal_749ee7fbedef4dad6909a4d4b4203bca831e1e4a"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        echo "
";
        // line 3
        echo $context["__internal_749ee7fbedef4dad6909a4d4b4203bca831e1e4a"]->gettextField(array("label" => \Blocks\Blocks::t("File System Path"), "instructions" => \Blocks\Blocks::t("The path to your folder on the file system."), "id" => "path", "name" => "path", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "path"), "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "path"), "method"), "required" => true, "hint" => "/path/to/folder/"));
        // line 12
        echo "

";
        // line 14
        echo $context["__internal_749ee7fbedef4dad6909a4d4b4203bca831e1e4a"]->gettextField(array("label" => \Blocks\Blocks::t("URL"), "instructions" => \Blocks\Blocks::t("The URL to your folder."), "id" => "url", "name" => "url", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "url"), "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "url"), "method"), "required" => true, "hint" => "http://url/to/folder/"));
        // line 23
        echo "
";
    }

    public function getTemplateName()
    {
        return "_components/assetsourcetypes/Local/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 47,  43 => 27,  38 => 25,  21 => 2,  19 => 1,  180 => 93,  176 => 91,  173 => 89,  170 => 88,  167 => 87,  164 => 86,  158 => 85,  153 => 82,  151 => 81,  149 => 80,  139 => 78,  137 => 77,  134 => 76,  131 => 75,  128 => 74,  125 => 73,  122 => 72,  119 => 71,  116 => 70,  112 => 69,  108 => 67,  106 => 59,  103 => 58,  101 => 57,  98 => 56,  95 => 55,  93 => 54,  89 => 52,  87 => 43,  84 => 42,  78 => 41,  73 => 38,  71 => 37,  63 => 32,  57 => 30,  55 => 49,  52 => 25,  49 => 38,  47 => 22,  45 => 36,  42 => 15,  39 => 13,  37 => 12,  32 => 23,  30 => 14,  28 => 6,  26 => 12,  24 => 3,);
    }
}
