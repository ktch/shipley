<?php

/* settings/assets/blocks */
class __TwigTemplate_717320ba2e35eb02a2339113b0f4c99c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("settings/assets/_layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "settings/assets/_layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page"] = "blocks";
        // line 3
        $context["title"] = \Blocks\Blocks::t("Asset Blocks");
        // line 6
        ob_start();
        // line 7
        echo "\t";
        $this->env->loadTemplate("_includes/blockindex")->display(array("blocks" => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getAllBlocks"), "settingsUrlPrefix" => "settings/assets/blocks/", "controller" => "assets"));
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/assets/blocks";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 7,  28 => 6,  26 => 3,  24 => 2,);
    }
}
