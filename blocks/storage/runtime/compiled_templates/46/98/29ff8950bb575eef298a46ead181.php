<?php

/* _components/blocktypes/Links/input */
class __TwigTemplate_469829ff8950bb575eef298a46ead181 extends Twig_Template
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
        $context["minRows"] = (($this->getAttribute($this->getContext($context, "settings"), "limit")) ? (min(3, $this->getAttribute($this->getContext($context, "settings"), "limit"))) : (3));
        // line 2
        $context["bufferRows"] = ((($this->getContext($context, "minRows") > twig_length_filter($this->env, $this->getContext($context, "entities")))) ? (($this->getContext($context, "minRows") - twig_length_filter($this->env, $this->getContext($context, "entities")))) : (0));
        // line 3
        echo "
<div class=\"links\">
\t<input type=\"hidden\" name=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "[]\" value=\"\">

\t<div id=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "\" class=\"border-box\">
\t\t<table class=\"data\">
\t\t\t<tbody>
\t\t\t\t";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 11
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<div class=\"entity\" data-id=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t";
            // line 14
            echo twig_escape_filter($this->env, $this->getContext($context, "entity"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
            echo "[]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 20
        echo "\t\t\t\t";
        if ($this->getContext($context, "bufferRows")) {
            // line 21
            echo "\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, "bufferRows")));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 22
                echo "\t\t\t\t\t\t<tr class=\"filler\">
\t\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 26
            echo "\t\t\t\t";
        }
        // line 27
        echo "\t\t\t</tbody>
\t\t</table>
\t</div>

\t<div class=\"buttons\">
\t\t<div class=\"btn add icon small";
        // line 32
        if (($this->getAttribute($this->getContext($context, "settings"), "limit") && (twig_length_filter($this->env, $this->getContext($context, "entities")) >= $this->getAttribute($this->getContext($context, "settings"), "limit")))) {
            echo " disabled";
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "addLabel"), "html", null, true);
        echo "</div>
\t\t<div class=\"btn remove small disabled\">";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "removeLabel"), "html", null, true);
        echo "</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "_components/blocktypes/Links/input";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 26,  67 => 20,  54 => 15,  42 => 11,  38 => 10,  27 => 5,  155 => 43,  151 => 41,  144 => 39,  136 => 36,  121 => 34,  114 => 32,  108 => 30,  106 => 29,  101 => 27,  98 => 26,  87 => 27,  81 => 20,  79 => 19,  75 => 22,  64 => 17,  60 => 16,  57 => 15,  51 => 13,  49 => 12,  45 => 11,  33 => 8,  23 => 3,  21 => 2,  19 => 1,  381 => 237,  379 => 236,  374 => 231,  371 => 230,  368 => 229,  363 => 227,  359 => 226,  356 => 225,  353 => 224,  350 => 223,  342 => 221,  340 => 220,  334 => 218,  330 => 216,  324 => 214,  322 => 213,  319 => 212,  317 => 211,  314 => 210,  309 => 207,  305 => 205,  297 => 203,  295 => 202,  290 => 200,  286 => 199,  280 => 198,  276 => 196,  274 => 195,  267 => 190,  263 => 188,  260 => 185,  256 => 183,  253 => 179,  250 => 178,  244 => 176,  241 => 175,  239 => 174,  235 => 172,  233 => 165,  229 => 163,  227 => 156,  223 => 154,  221 => 147,  218 => 146,  214 => 144,  211 => 138,  209 => 137,  205 => 135,  203 => 128,  198 => 125,  196 => 121,  192 => 119,  190 => 111,  186 => 109,  180 => 107,  178 => 106,  175 => 105,  169 => 103,  167 => 102,  164 => 101,  162 => 100,  153 => 96,  148 => 95,  146 => 94,  140 => 88,  138 => 37,  134 => 85,  132 => 35,  124 => 81,  117 => 33,  115 => 77,  113 => 74,  109 => 69,  107 => 68,  105 => 67,  102 => 33,  100 => 64,  97 => 60,  94 => 32,  92 => 57,  89 => 53,  86 => 51,  83 => 49,  80 => 46,  78 => 45,  76 => 44,  73 => 40,  70 => 21,  68 => 37,  66 => 34,  61 => 30,  58 => 27,  55 => 25,  52 => 23,  50 => 14,  48 => 21,  46 => 13,  43 => 14,  40 => 12,  36 => 10,  34 => 9,  32 => 7,  30 => 5,  28 => 4,  26 => 4,  24 => 2,);
    }
}
