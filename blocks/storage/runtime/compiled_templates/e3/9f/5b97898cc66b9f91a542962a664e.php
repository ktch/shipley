<?php

/* _components/blocktypes/Links/modalbody */
class __TwigTemplate_e39f5b97898cc66b9f91a542962a664e extends Twig_Template
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
\t<tbody>
\t\t";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 4
            echo "\t\t\t<tr";
            if (twig_in_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), (isset($context["selectedIds"]) ? $context["selectedIds"] : $this->getContext($context, "selectedIds")))) {
                echo " class=\"hidden\"";
            }
            echo ">
\t\t\t\t<td>
\t\t\t\t\t<div class=\"entity\" data-id=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "\">
\t\t\t\t\t\t";
            // line 7
            echo twig_escape_filter($this->env, (isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "html", null, true);
            echo "
\t\t\t\t\t\t<input type=\"hidden\" name=\"";
            // line 8
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
            echo "[]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "\">
\t\t\t\t\t</div>
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 13
        echo "\t</tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "_components/blocktypes/Links/modalbody";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 13,  43 => 8,  39 => 7,  35 => 6,  27 => 4,  23 => 3,  19 => 1,);
    }
}
