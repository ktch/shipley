<?php

/* settings/sections/_edit/blocks */
class __TwigTemplate_eb676f099ea6d4561684a9e2785a08d5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("settings/sections/_edit/layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "settings/sections/_edit/layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["tab"] = "blocks";
        // line 3
        $context["section"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "sections"), "id", array(0 => (isset($context["sectionId"]) ? $context["sectionId"] : $this->getContext($context, "sectionId"))), "method"), "first");
        // line 4
        if ((!(isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")))) {
            throw new \Blocks\HttpException(404);
        }
        // line 7
        ob_start();
        // line 8
        echo "\t";
        $this->env->loadTemplate("_includes/blockindex")->display(array("blocks" => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryBlocks"), "getBlocksBySectionId", array(0 => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")), "method"), "settingsUrlPrefix" => (("settings/sections/" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")) . "/blocks/"), "controller" => "sections"));
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/sections/_edit/blocks";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 8,  32 => 7,  28 => 4,  26 => 3,  24 => 2,);
    }
}
