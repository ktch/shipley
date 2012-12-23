<?php

/* settings/globals */
class __TwigTemplate_a30f3e773f7765ba223dfc199309f97b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("_layouts/cp");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "_layouts/cp";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["title"] = \Blocks\Blocks::t("Global Blocks");
        // line 3
        $context["centered"] = true;
        // line 6
        ob_start();
        // line 7
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>

\t<ul class=\"left\">
\t\t<li><a class=\"backbtn\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 15
        ob_start();
        // line 16
        echo "\t";
        $this->env->loadTemplate("_includes/blockindex")->display(array("blocks" => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "globals"), "getAllBlocks"), "settingsUrlPrefix" => "settings/globals/", "controller" => "globals"));
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/globals";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 16,  45 => 15,  37 => 10,  30 => 7,  28 => 6,  26 => 3,  24 => 2,);
    }
}
