<?php

/* _includes/paginatelinks */
class __TwigTemplate_e542ac88c03967426ad2292cce51bbcb extends Twig_Template
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
        if (($this->getAttribute($this->getContext($context, "paginate"), "totalPages") > 1)) {
            // line 2
            echo "\t<div class=\"paginate\">
\t\t<p>";
            // line 3
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Showing {first} through {last} of {total} {type}", array("first" => $this->getAttribute($this->getContext($context, "paginate"), "first"), "last" => $this->getAttribute($this->getContext($context, "paginate"), "last"), "total" => $this->getAttribute($this->getContext($context, "paginate"), "total"), "type" => $this->getContext($context, "type"))), "html", null, true);
            echo "</p>

\t\t<div class=\"btngroup\">
\t\t\t";
            // line 6
            if ($this->getAttribute($this->getContext($context, "paginate"), "prevUrl")) {
                // line 7
                echo "\t\t\t\t<a class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "paginate"), "prevUrl"), "html", null, true);
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
            if ($this->getAttribute($this->getContext($context, "paginate"), "nextUrl")) {
                // line 13
                echo "\t\t\t\t<a class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "paginate"), "nextUrl"), "html", null, true);
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
        return array (  49 => 12,  46 => 11,  21 => 2,  19 => 1,  47 => 12,  458 => 170,  451 => 163,  446 => 158,  438 => 156,  436 => 155,  432 => 154,  429 => 153,  425 => 151,  421 => 149,  416 => 146,  408 => 143,  402 => 141,  400 => 140,  397 => 139,  388 => 138,  382 => 137,  376 => 136,  370 => 135,  363 => 134,  360 => 133,  357 => 132,  354 => 131,  350 => 130,  345 => 127,  336 => 126,  328 => 125,  322 => 124,  316 => 123,  312 => 121,  309 => 120,  307 => 119,  304 => 118,  302 => 117,  299 => 116,  297 => 115,  291 => 112,  285 => 111,  282 => 110,  280 => 109,  274 => 106,  267 => 101,  255 => 99,  252 => 98,  249 => 97,  246 => 96,  243 => 95,  241 => 94,  238 => 93,  232 => 92,  218 => 90,  215 => 89,  211 => 88,  208 => 87,  205 => 86,  190 => 84,  185 => 83,  183 => 82,  172 => 80,  168 => 78,  165 => 77,  157 => 74,  154 => 73,  151 => 72,  148 => 71,  144 => 69,  136 => 67,  131 => 64,  120 => 62,  116 => 61,  109 => 58,  107 => 57,  104 => 56,  101 => 55,  99 => 54,  96 => 53,  93 => 52,  91 => 51,  88 => 47,  86 => 46,  83 => 42,  80 => 40,  78 => 39,  75 => 37,  73 => 36,  70 => 34,  68 => 33,  65 => 17,  63 => 30,  61 => 29,  59 => 15,  57 => 13,  54 => 21,  51 => 13,  44 => 15,  42 => 14,  40 => 9,  36 => 11,  34 => 10,  32 => 7,  30 => 6,  28 => 6,  26 => 5,  24 => 3,);
    }
}
