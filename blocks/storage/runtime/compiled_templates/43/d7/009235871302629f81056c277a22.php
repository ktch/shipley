<?php

/* assets/_views/list */
class __TwigTemplate_43d7009235871302629f81056c277a22 extends Twig_Template
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
        echo "<div class=\"files listview\">
\t<table class=\"data\">
\t\t<thead>
\t\t\t<th scope=\"col\">";
        // line 4
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Name"), "html", null, true);
        echo "</th>
\t\t\t<th scope=\"col\">";
        // line 5
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Date Modified"), "html", null, true);
        echo "</th>
\t\t\t<th scope=\"col\">";
        // line 6
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Size"), "html", null, true);
        echo "</th>
\t\t</thead>
\t\t<tbody>
            ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : $this->getContext($context, "files")));
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 10
            echo "                <tr class=\"assets-list-row\">
                    <td><img src=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "getThumbnailUrl", array(0 => 24), "method"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "filename"), "html", null, true);
            echo "\" class=\"open-file\" data-file=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "id"), "html", null, true);
            echo "\"/> <span class=\"open-file\" data-file=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "filename"), "html", null, true);
            echo "</span></td>
                    <td>";
            // line 12
            echo twig_escape_filter($this->env, \Blocks\blx()->dateFormatter->formatDateTime($this->getAttribute($this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "dateModified"), "format", array(0 => "Y-m-d H:i:s"), "method")), "html", null, true);
            echo "</td>
                    <td>";
            // line 13
            echo twig_escape_filter($this->env, \Blocks\blx()->formatter->formatSize($this->getAttribute((isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "size")), "html", null, true);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 16
        echo "\t\t</tbody>
\t</table>
</div>
";
    }

    public function getTemplateName()
    {
        return "assets/_views/list";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 16,  61 => 13,  57 => 12,  45 => 11,  42 => 10,  38 => 9,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
