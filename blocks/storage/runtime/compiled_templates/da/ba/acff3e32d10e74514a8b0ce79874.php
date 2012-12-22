<?php

/* _components/widgets/QuickPost/body */
class __TwigTemplate_dabaacff3e32d10e74514a8b0ce79874 extends Twig_Template
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
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        echo "

";
        // line 4
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
            // line 5
            echo "\t";
            $context["blocks"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryBlocks"), "getBlocksBySectionId", array(0 => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "section")), "method");
        } else {
            // line 7
            echo "\t";
            $context["blocks"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryBlocks"), "getAllBlocks");
        }
        // line 9
        echo "

<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t";
        // line 12
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Title"), "id" => "title", "name" => "title", "required" => true));
        // line 17
        echo "

\t";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks")));
        foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
            // line 20
            echo "\t\t";
            if (($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "required") || twig_in_filter($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id"), $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "blocks")))) {
                // line 21
                echo "\t\t\t";
                $this->env->loadTemplate("_includes/blockfield")->display(array("block" => (isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))));
                // line 22
                echo "\t\t";
            }
            // line 23
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 24
        echo "
\t<div class=\"buttons\">
\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Post"), "html", null, true);
        echo "\">
\t\t<div class=\"spinner hidden\"></div>
\t</div>
</form>
";
    }

    public function getTemplateName()
    {
        return "_components/widgets/QuickPost/body";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 26,  65 => 24,  59 => 23,  50 => 20,  40 => 12,  35 => 9,  27 => 5,  25 => 4,  21 => 2,  19 => 1,  205 => 72,  202 => 71,  195 => 67,  191 => 65,  189 => 64,  183 => 63,  180 => 62,  174 => 59,  171 => 58,  169 => 57,  163 => 53,  152 => 51,  148 => 50,  137 => 44,  131 => 40,  123 => 37,  118 => 35,  116 => 34,  114 => 33,  101 => 32,  98 => 31,  94 => 30,  76 => 22,  73 => 21,  66 => 18,  60 => 17,  56 => 22,  53 => 21,  42 => 17,  37 => 8,  31 => 7,  88 => 28,  82 => 23,  75 => 23,  70 => 21,  61 => 20,  58 => 19,  55 => 18,  51 => 14,  48 => 16,  46 => 19,  38 => 10,  32 => 8,  30 => 7,  28 => 5,  26 => 4,  24 => 2,);
    }
}
