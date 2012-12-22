<?php

/* _components/widgets/RecentEntries/body */
class __TwigTemplate_ea314e0ec6c1de0d98ec0a556c40009b extends Twig_Template
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
        $context["params"] = array("status" => "*", "limit" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "limit"));
        // line 2
        echo "
";
        // line 3
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
            // line 4
            echo "\t";
            $context["params"] = twig_array_merge((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), array("sectionId" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "section")));
        }
        // line 6
        echo "
";
        // line 7
        $context["entries"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entries"), "find", array(0 => (isset($context["params"]) ? $context["params"] : $this->getContext($context, "params"))), "method");
        // line 8
        echo "

<div class=\"container\">
\t";
        // line 11
        if (twig_length_filter($this->env, (isset($context["entries"]) ? $context["entries"] : $this->getContext($context, "entries")))) {
            // line 12
            echo "\t\t<table class=\"data\">
\t\t\t";
            // line 13
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["entries"]) ? $context["entries"] : $this->getContext($context, "entries")));
            foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                // line 14
                echo "\t\t\t\t";
                if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
                    // line 15
                    echo "\t\t\t\t\t";
                    $context["path"] = ((("content/" . $this->getAttribute($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "section"), "handle")) . "/") . $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "id"));
                    // line 16
                    echo "\t\t\t\t";
                } else {
                    // line 17
                    echo "\t\t\t\t\t";
                    $context["path"] = ("content/blog/" . $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "id"));
                    // line 18
                    echo "\t\t\t\t";
                }
                // line 19
                echo "\t\t\t\t<tr>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
                // line 21
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl((isset($context["path"]) ? $context["path"] : $this->getContext($context, "path"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "title"), "html", null, true);
                echo "</a>
\t\t\t\t\t\t<span class=\"light\">
\t\t\t\t\t\t\t";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "postDate"), "w3cDate"), "html", null, true);
                echo "
\t\t\t\t\t\t\t";
                // line 24
                if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Users"), "method")) {
                    // line 25
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("by {author}", array("author" => $this->getAttribute($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "author"), "username"))), "html", null, true);
                    echo "
\t\t\t\t\t\t\t";
                }
                // line 27
                echo "\t\t\t\t\t\t</span>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 31
            echo "\t\t</table>
\t";
        } else {
            // line 33
            echo "\t\t<p>";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("No entries exist yet."), "html", null, true);
            echo "</p>
\t";
        }
        // line 35
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "_components/widgets/RecentEntries/body";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 35,  100 => 33,  96 => 31,  87 => 27,  81 => 25,  79 => 24,  68 => 21,  64 => 19,  49 => 14,  45 => 13,  33 => 7,  52 => 15,  47 => 13,  43 => 11,  39 => 9,  34 => 7,  69 => 26,  65 => 24,  59 => 23,  50 => 14,  40 => 11,  35 => 8,  27 => 5,  25 => 3,  21 => 2,  19 => 1,  205 => 72,  202 => 71,  195 => 67,  191 => 65,  189 => 64,  183 => 63,  180 => 62,  174 => 59,  171 => 58,  169 => 57,  163 => 53,  152 => 51,  148 => 50,  137 => 44,  131 => 40,  123 => 37,  118 => 35,  116 => 34,  114 => 33,  101 => 32,  98 => 31,  94 => 30,  76 => 22,  73 => 21,  66 => 18,  60 => 17,  56 => 22,  53 => 21,  42 => 12,  37 => 8,  31 => 7,  88 => 28,  82 => 23,  75 => 23,  70 => 21,  61 => 18,  58 => 17,  55 => 16,  51 => 14,  48 => 16,  46 => 19,  38 => 10,  32 => 6,  30 => 6,  28 => 4,  26 => 4,  24 => 3,);
    }
}
