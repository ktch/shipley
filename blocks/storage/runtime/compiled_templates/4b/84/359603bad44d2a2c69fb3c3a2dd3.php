<?php

/* _components/widgets/RecentEntries/settings */
class __TwigTemplate_4b84359603bad44d2a2c69fb3c3a2dd3 extends Twig_Template
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
            ob_start();
            // line 6
            echo "\t\t<div class=\"select\">
\t\t\t<select id=\"section\" name=\"section\">
\t\t\t\t<option value=\"*\">";
            // line 8
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("All"), "html", null, true);
            echo "</option>
\t\t\t\t";
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "sections"), "find"));
            foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
                // line 10
                echo "\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"), "html", null, true);
                echo "\"";
                if (($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id") == $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "section"))) {
                    echo " selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "name")), "html", null, true);
                echo "</option>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 12
            echo "\t\t\t</select>
\t\t</div>
\t";
            $context["sectionInput"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 15
            echo "
\t";
            // line 16
            echo $context["forms"]->getfield(array("label" => \Blocks\Blocks::t("Section"), "instructions" => \Blocks\Blocks::t("Which section do you want to pull recent entries from?"), "id" => "section"), (isset($context["sectionInput"]) ? $context["sectionInput"] : $this->getContext($context, "sectionInput")));
            // line 20
            echo "
";
        }
        // line 22
        echo "

";
        // line 24
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Limit"), "id" => "limit", "name" => "limit", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "limit"), "size" => 2, "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "limit"), "method")));
        // line 31
        echo "
";
    }

    public function getTemplateName()
    {
        return "_components/widgets/RecentEntries/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 24,  71 => 22,  67 => 20,  57 => 12,  42 => 10,  38 => 9,  171 => 19,  169 => 13,  166 => 12,  159 => 9,  156 => 8,  152 => 7,  149 => 6,  133 => 4,  128 => 63,  126 => 60,  122 => 58,  107 => 52,  104 => 51,  100 => 49,  97 => 48,  79 => 45,  77 => 31,  68 => 43,  65 => 16,  45 => 40,  36 => 28,  31 => 26,  29 => 25,  34 => 8,  27 => 5,  25 => 4,  21 => 2,  19 => 1,  161 => 10,  157 => 78,  151 => 77,  146 => 5,  144 => 73,  142 => 72,  132 => 70,  130 => 69,  127 => 68,  124 => 67,  121 => 66,  118 => 56,  115 => 64,  112 => 54,  109 => 53,  105 => 61,  101 => 59,  99 => 49,  96 => 48,  94 => 47,  91 => 46,  85 => 45,  80 => 42,  78 => 41,  70 => 36,  64 => 34,  62 => 15,  59 => 29,  56 => 27,  54 => 26,  52 => 23,  49 => 19,  47 => 41,  44 => 15,  41 => 38,  39 => 29,  37 => 11,  32 => 14,  30 => 6,  28 => 5,  26 => 3,  24 => 2,);
    }
}
