<?php

/* _special/install/dots */
class __TwigTemplate_a9fb1672fe459cdf33341fcad097e95d extends Twig_Template
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
        echo "<div class=\"dots\">
\t<div ";
        // line 2
        if (((isset($context["dot"]) ? $context["dot"] : $this->getContext($context, "dot")) >= 1)) {
            echo "class=\"sel\"";
        }
        echo "></div>
\t<div ";
        // line 3
        if (((isset($context["dot"]) ? $context["dot"] : $this->getContext($context, "dot")) >= 2)) {
            echo "class=\"sel\"";
        }
        echo "></div>
\t<div ";
        // line 4
        if (((isset($context["dot"]) ? $context["dot"] : $this->getContext($context, "dot")) >= 3)) {
            echo "class=\"sel\"";
        }
        echo "></div>
\t<div ";
        // line 5
        if (((isset($context["dot"]) ? $context["dot"] : $this->getContext($context, "dot")) >= 4)) {
            echo "class=\"sel\"";
        }
        echo "></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "_special/install/dots";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 4,  42 => 12,  33 => 7,  22 => 2,  139 => 68,  132 => 64,  128 => 63,  124 => 62,  120 => 61,  116 => 60,  112 => 59,  108 => 58,  104 => 57,  100 => 56,  96 => 55,  82 => 44,  71 => 36,  64 => 32,  56 => 31,  49 => 26,  29 => 6,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,  46 => 15,  43 => 14,  40 => 5,  37 => 12,  35 => 11,  30 => 6,  28 => 3,  26 => 3,  24 => 2,);
    }
}
