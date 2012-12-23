<?php

/* _components/blocktypes/Links/input */
class __TwigTemplate_2453d90a84c62a18eba06616b98c0d06 extends Twig_Template
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
        $context["minRows"] = (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "limit")) ? (min(3, $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "limit"))) : (3));
        // line 2
        $context["bufferRows"] = ((((isset($context["minRows"]) ? $context["minRows"] : $this->getContext($context, "minRows")) > twig_length_filter($this->env, (isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities"))))) ? (((isset($context["minRows"]) ? $context["minRows"] : $this->getContext($context, "minRows")) - twig_length_filter($this->env, (isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities"))))) : (0));
        // line 3
        echo "
<div class=\"links\">
\t<input type=\"hidden\" name=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "[]\" value=\"\">

\t<div id=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "\" class=\"border-box\">
\t\t<table class=\"data\">
\t\t\t<tbody>
\t\t\t\t";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 11
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<div class=\"entity\" data-id=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t";
            // line 14
            echo twig_escape_filter($this->env, (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"";
            // line 15
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
            echo "[]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
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
        if ((isset($context["bufferRows"]) ? $context["bufferRows"] : $this->getContext($context, "bufferRows"))) {
            // line 21
            echo "\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["bufferRows"]) ? $context["bufferRows"] : $this->getContext($context, "bufferRows"))));
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
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "limit") && (twig_length_filter($this->env, (isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities"))) >= $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "limit")))) {
            echo " disabled";
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "addLabel"), "html", null, true);
        echo "</div>
\t\t<div class=\"btn remove small disabled\">";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "removeLabel"), "html", null, true);
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
        return array (  102 => 33,  94 => 32,  87 => 27,  84 => 26,  75 => 22,  70 => 21,  67 => 20,  54 => 15,  50 => 14,  46 => 13,  42 => 11,  38 => 10,  27 => 5,  23 => 3,  21 => 2,  41 => 12,  37 => 11,  32 => 7,  30 => 4,  26 => 3,  19 => 1,);
    }
}
