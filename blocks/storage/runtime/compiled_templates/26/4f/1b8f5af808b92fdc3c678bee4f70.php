<?php

/* 404 */
class __TwigTemplate_264f1b8f5af808b92fdc3c678bee4f70 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("_layouts/message");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "_layouts/message";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["title"] = \Blocks\Blocks::t("Page Not Found");
        // line 4
        ob_start();
        // line 5
        echo "\t<h2>";
        echo twig_escape_filter($this->env, $this->getContext($context, "title"), "html", null, true);
        echo "</h2>
\t<p>";
        // line 6
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("The requested URL was not found on this server."), "html", null, true);
        echo "</p>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "404";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 6,  28 => 5,  26 => 4,  24 => 2,);
    }
}
