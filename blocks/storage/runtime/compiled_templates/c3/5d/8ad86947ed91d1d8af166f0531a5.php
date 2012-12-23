<?php

/* _includes/blockfields */
class __TwigTemplate_c35d8ad86947ed91d1d8af166f0531a5 extends Twig_Template
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
        if ((!array_key_exists("entity", $context))) {
            $context["entity"] = null;
        }
        // line 2
        echo "
";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks")));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 4
            echo "\t";
            $this->env->loadTemplate("_includes/blockfield")->display(array("block" => (isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "entity" => (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity"))));
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return "_includes/blockfields";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 2,  19 => 1,  381 => 237,  379 => 236,  374 => 231,  371 => 230,  368 => 229,  363 => 227,  359 => 226,  356 => 225,  353 => 224,  350 => 223,  342 => 221,  340 => 220,  334 => 218,  330 => 216,  324 => 214,  322 => 213,  319 => 212,  317 => 211,  314 => 210,  309 => 207,  305 => 205,  297 => 203,  295 => 202,  290 => 200,  286 => 199,  280 => 198,  276 => 196,  274 => 195,  267 => 190,  263 => 188,  260 => 185,  256 => 183,  253 => 179,  250 => 178,  244 => 176,  241 => 175,  239 => 174,  235 => 172,  233 => 165,  229 => 163,  227 => 156,  223 => 154,  221 => 147,  218 => 146,  214 => 144,  211 => 138,  209 => 137,  205 => 135,  203 => 128,  198 => 125,  196 => 121,  192 => 119,  190 => 111,  186 => 109,  180 => 107,  178 => 106,  175 => 105,  169 => 103,  167 => 102,  164 => 101,  162 => 100,  153 => 96,  148 => 95,  146 => 94,  140 => 88,  138 => 87,  134 => 85,  132 => 84,  124 => 81,  117 => 78,  115 => 77,  113 => 74,  109 => 69,  107 => 68,  105 => 67,  102 => 65,  100 => 64,  97 => 60,  94 => 58,  92 => 57,  89 => 53,  86 => 51,  83 => 49,  80 => 46,  78 => 45,  76 => 44,  73 => 40,  70 => 38,  68 => 37,  66 => 34,  61 => 30,  58 => 27,  55 => 25,  52 => 23,  50 => 22,  48 => 21,  46 => 18,  43 => 14,  40 => 12,  36 => 10,  34 => 9,  32 => 8,  30 => 4,  28 => 4,  26 => 3,  24 => 2,);
    }
}
