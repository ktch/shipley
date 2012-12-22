<?php

/* _special/install */
class __TwigTemplate_01c2d55700a2da5cc0fed292d081982c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("_layouts/base");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "_layouts/base";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["title"] = \Blocks\Blocks::t("Install Blocks");
        // line 3
        \Blocks\blx()->templates->includeCssResource("css/install.css");
        // line 4
        \Blocks\blx()->templates->includeJsResource("js/install.js");
        // line 6
        \Blocks\blx()->templates->includeTranslations(
        	"All done!",
        	"Go to Blocks"
        );
        // line 11
        ob_start();
        // line 12
        echo "\t";
        $this->env->loadTemplate("_special/install/welcome")->display($context);
        // line 13
        echo "\t";
        $this->env->loadTemplate("_special/install/account")->display($context);
        // line 14
        echo "\t";
        $this->env->loadTemplate("_special/install/site")->display($context);
        // line 15
        echo "\t";
        $this->env->loadTemplate("_special/install/installing")->display($context);
        $context["body"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "_special/install";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 15,  43 => 14,  40 => 13,  37 => 12,  35 => 11,  30 => 6,  28 => 4,  26 => 3,  24 => 2,);
    }
}
