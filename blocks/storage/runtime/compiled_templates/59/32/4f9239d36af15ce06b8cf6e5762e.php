<?php

/* assets/_views/thumbs */
class __TwigTemplate_59324f9239d36af15ce06b8cf6e5762e extends Twig_Template
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
        echo "<div class=\"files thumbs\">
\t<ul>
        ";
        // line 9
        echo "\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : $this->getContext($context, "files")));
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 10
            echo "\t\t\t<li class=\"open-file\" data-file=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "id"), "html", null, true);
            echo "\">
\t\t\t\t<div class=\"thumb thumb-";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "id"), "html", null, true);
            echo "\"></div>
\t\t\t\t<div class=\"filename\">";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "filename"), "html", null, true);
            echo "</div>
\t\t\t</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 15
        echo "\t</ul>
</div>

<style type=\"text/css\">
    ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : $this->getContext($context, "files")));
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 20
            echo "        .thumb-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "id"), "html", null, true);
            echo " { background-image: url(";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "getThumbnailUrl"), "html", null, true);
            echo "); }
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 22
        echo "</style>";
    }

    public function getTemplateName()
    {
        return "assets/_views/thumbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 22,  56 => 20,  52 => 19,  46 => 15,  37 => 12,  33 => 11,  28 => 10,  23 => 9,  43 => 9,  40 => 8,  35 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
