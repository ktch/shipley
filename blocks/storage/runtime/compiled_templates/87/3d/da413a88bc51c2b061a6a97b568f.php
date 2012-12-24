<?php

/* content/globals/index */
class __TwigTemplate_873dda413a88bc51c2b061a6a97b568f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("content/_layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "content/_layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["tab"] = "globals";
        // line 3
        $context["title"] = \Blocks\Blocks::t("Globals");
        // line 4
        $context["centered"] = true;
        // line 7
        ob_start();
        // line 8
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"globals/saveContent\">

\t\t";
        // line 11
        $this->env->loadTemplate("_includes/blockfields")->display(array("blocks" => $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "globals"), "getAllBlocks"), "entity" => $this->getContext($context, "globals")));
        // line 15
        echo "
\t\t<div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">
\t\t</div>
\t</form>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "content/globals/index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 17,  39 => 15,  37 => 11,  32 => 8,  30 => 7,  28 => 4,  26 => 3,  24 => 2,);
    }
}
