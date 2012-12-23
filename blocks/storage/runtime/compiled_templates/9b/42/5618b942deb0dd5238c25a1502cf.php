<?php

/* _includes/paginatelinks */
class __TwigTemplate_9b425618b942deb0dd5238c25a1502cf extends Twig_Template
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
        if (($this->getAttribute((isset($context["paginate"]) ? $context["paginate"] : $this->getContext($context, "paginate")), "totalPages") > 1)) {
            // line 2
            echo "\t<div class=\"paginate\">
\t\t<p>";
            // line 3
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Showing {first} through {last} of {total} {type}", array("first" => $this->getAttribute((isset($context["paginate"]) ? $context["paginate"] : $this->getContext($context, "paginate")), "first"), "last" => $this->getAttribute((isset($context["paginate"]) ? $context["paginate"] : $this->getContext($context, "paginate")), "last"), "total" => $this->getAttribute((isset($context["paginate"]) ? $context["paginate"] : $this->getContext($context, "paginate")), "total"), "type" => (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")))), "html", null, true);
            echo "</p>

\t\t<div class=\"btngroup\">
\t\t\t";
            // line 6
            if ($this->getAttribute((isset($context["paginate"]) ? $context["paginate"] : $this->getContext($context, "paginate")), "prevUrl")) {
                // line 7
                echo "\t\t\t\t<a class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginate"]) ? $context["paginate"] : $this->getContext($context, "paginate")), "prevUrl"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Previous"), "html", null, true);
                echo "</a>
\t\t\t";
            } else {
                // line 9
                echo "\t\t\t\t<div class=\"btn disabled\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Previous"), "html", null, true);
                echo "</div>
\t\t\t";
            }
            // line 11
            echo "
\t\t\t";
            // line 12
            if ($this->getAttribute((isset($context["paginate"]) ? $context["paginate"] : $this->getContext($context, "paginate")), "nextUrl")) {
                // line 13
                echo "\t\t\t\t<a class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginate"]) ? $context["paginate"] : $this->getContext($context, "paginate")), "nextUrl"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Next"), "html", null, true);
                echo "</a>
\t\t\t";
            } else {
                // line 15
                echo "\t\t\t\t<div class=\"btn disabled\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Next"), "html", null, true);
                echo "</div>
\t\t\t";
            }
            // line 17
            echo "\t\t</div>
\t</div>
";
        }
    }

    public function getTemplateName()
    {
        return "_includes/paginatelinks";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 17,  59 => 15,  51 => 13,  49 => 12,  46 => 11,  40 => 9,  21 => 2,  19 => 1,  159 => 61,  156 => 58,  148 => 53,  144 => 51,  140 => 49,  135 => 46,  126 => 43,  120 => 42,  116 => 41,  110 => 40,  101 => 39,  97 => 38,  90 => 34,  86 => 33,  82 => 32,  77 => 29,  75 => 28,  72 => 27,  70 => 26,  64 => 23,  58 => 22,  55 => 21,  52 => 20,  50 => 19,  42 => 14,  36 => 12,  34 => 11,  32 => 7,  30 => 6,  26 => 2,  24 => 3,);
    }
}
