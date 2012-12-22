<?php

/* _components/widgets/Feed/body */
class __TwigTemplate_f7796a9e8d212318a460701804d40a2e extends Twig_Template
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
        echo "<table class=\"data\">
\t";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["limit"]) ? $context["limit"] : $this->getContext($context, "limit"))));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 3
            echo "\t\t<tr>
\t\t\t<td>&nbsp;</td>
\t\t</tr>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 7
        echo "</table>
";
    }

    public function getTemplateName()
    {
        return "_components/widgets/Feed/body";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  106 => 35,  100 => 33,  96 => 31,  87 => 27,  81 => 25,  79 => 24,  68 => 21,  64 => 19,  49 => 14,  45 => 13,  33 => 7,  52 => 15,  47 => 13,  43 => 11,  39 => 9,  34 => 7,  69 => 26,  65 => 24,  59 => 23,  50 => 14,  40 => 11,  35 => 7,  27 => 5,  25 => 3,  21 => 2,  19 => 1,  205 => 72,  202 => 71,  195 => 67,  191 => 65,  189 => 64,  183 => 63,  180 => 62,  174 => 59,  171 => 58,  169 => 57,  163 => 53,  152 => 51,  148 => 50,  137 => 44,  131 => 40,  123 => 37,  118 => 35,  116 => 34,  114 => 33,  101 => 32,  98 => 31,  94 => 30,  76 => 22,  73 => 21,  66 => 18,  60 => 17,  56 => 22,  53 => 21,  42 => 12,  37 => 8,  31 => 7,  88 => 28,  82 => 23,  75 => 23,  70 => 21,  61 => 18,  58 => 17,  55 => 16,  51 => 14,  48 => 16,  46 => 19,  38 => 10,  32 => 6,  30 => 6,  28 => 4,  26 => 3,  24 => 3,);
    }
}
