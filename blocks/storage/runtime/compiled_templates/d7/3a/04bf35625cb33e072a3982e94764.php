<?php

/* _components/widgets/Feed/settings */
class __TwigTemplate_d73a04bf35625cb33e072a3982e94764 extends Twig_Template
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
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("URL"), "id" => "url", "name" => "url", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "url"), "required" => true, "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "url"), "method")));
        // line 11
        echo "


";
        // line 14
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Title"), "id" => "title", "name" => "title", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "title"), "required" => true, "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "title"), "method")));
        // line 21
        echo "


";
        // line 24
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Limit"), "id" => "limit", "name" => "limit", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "limit"), "size" => 2, "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "limit"), "method")));
        // line 31
        echo "
";
    }

    public function getTemplateName()
    {
        return "_components/widgets/Feed/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 21,  27 => 11,  25 => 4,  21 => 2,  19 => 1,  161 => 80,  157 => 78,  151 => 77,  146 => 74,  144 => 73,  142 => 72,  132 => 70,  130 => 69,  127 => 68,  124 => 67,  121 => 66,  118 => 65,  115 => 64,  112 => 63,  109 => 62,  105 => 61,  101 => 59,  99 => 49,  96 => 48,  94 => 47,  91 => 46,  85 => 45,  80 => 42,  78 => 41,  70 => 36,  64 => 34,  62 => 33,  59 => 29,  56 => 27,  54 => 26,  52 => 23,  49 => 19,  47 => 18,  44 => 15,  41 => 31,  39 => 24,  37 => 11,  32 => 14,  30 => 6,  28 => 5,  26 => 3,  24 => 2,);
    }
}
