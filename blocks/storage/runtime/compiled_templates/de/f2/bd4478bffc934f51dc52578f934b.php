<?php

/* assets/_views/file */
class __TwigTemplate_def2bd4478bffc934f51dc52578f934b extends Twig_Template
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
        echo "<header class=\"header\"><h1>";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Editing data for "), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "filename"), "html", null, true);
        echo "</h1></header>
<form id=\"file-blocks\">
    <input type=\"hidden\" name=\"fileId\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "id"), "html", null, true);
        echo "\" />
    ";
        // line 4
        $this->env->loadTemplate("_includes/blockfields")->display(array("blocks" => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getAllBlocks"), "entity" => (isset($context["file"]) ? $context["file"] : $this->getContext($context, "file"))));
        // line 8
        echo "</form>
<footer class=\"footer\">
    <ul class=\"right\">
        <li><input type=\"button\" class=\"btn cancel\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Cancel"), "html", null, true);
        echo "\"></li>
        <li><input type=\"submit\" class=\"btn submit\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\"></li>
    </ul>
</footer>
";
    }

    public function getTemplateName()
    {
        return "assets/_views/file";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 12,  37 => 11,  32 => 8,  30 => 4,  26 => 3,  19 => 1,);
    }
}
