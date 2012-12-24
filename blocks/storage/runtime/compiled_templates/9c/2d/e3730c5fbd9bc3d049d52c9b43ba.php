<?php

/* _includes/blockfields */
class __TwigTemplate_9c2de3730c5fbd9bc3d049d52c9b43ba extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "blocks"));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 4
            echo "\t";
            $this->env->loadTemplate("_includes/blockfield")->display(array("block" => $this->getContext($context, "block"), "entity" => $this->getContext($context, "entity")));
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
        return array (  23 => 2,  19 => 1,  43 => 17,  39 => 15,  37 => 11,  32 => 8,  30 => 4,  28 => 4,  26 => 3,  24 => 2,);
    }
}
