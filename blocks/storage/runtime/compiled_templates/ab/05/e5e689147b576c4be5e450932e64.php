<?php

/* settings/users/blocks */
class __TwigTemplate_ab05e5e689147b576c4be5e450932e64 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("settings/users/_layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "settings/users/_layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page"] = "blocks";
        // line 3
        $context["title"] = \Blocks\Blocks::t("Profile Blocks");
        // line 6
        ob_start();
        // line 7
        echo "\t";
        $this->env->loadTemplate("_includes/blockindex")->display(array("blocks" => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "userProfileBlocks"), "getAllBlocks"), "settingsUrlPrefix" => "settings/users/blocks/", "controller" => "users"));
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/users/blocks";
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
