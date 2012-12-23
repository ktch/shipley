<?php

/* settings/assets/sources */
class __TwigTemplate_c8e5f551758947b57b8a025f9f8b37c4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("settings/assets/_layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "settings/assets/_layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page"] = "sources";
        // line 3
        $context["title"] = \Blocks\Blocks::t("Asset Sources");
        // line 4
        $context["sources"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getAllSources");
        // line 7
        ob_start();
        // line 8
        echo "\t<p id=\"nosources\"";
        if (twig_length_filter($this->env, (isset($context["sources"]) ? $context["sources"] : $this->getContext($context, "sources")))) {
            echo " class=\"hidden\"";
        }
        echo ">
\t\t";
        // line 9
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("No sources exist yet."), "html", null, true);
        echo "
\t</p>

\t";
        // line 12
        if (twig_length_filter($this->env, (isset($context["sources"]) ? $context["sources"] : $this->getContext($context, "sources")))) {
            // line 13
            echo "\t\t";
            $context["sortable"] = (twig_length_filter($this->env, (isset($context["sources"]) ? $context["sources"] : $this->getContext($context, "sources"))) > 1);
            // line 14
            echo "
\t\t<table id=\"sources\" class=\"data\">
\t\t\t<thead>
\t\t\t\t<th scope=\"col\">";
            // line 17
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Name"), "html", null, true);
            echo "</th>
\t\t\t\t";
            // line 18
            if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Cloud"), "method")) {
                echo "<th scope=\"col\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Type"), "html", null, true);
                echo "</th>";
            }
            // line 19
            echo "\t\t\t\t";
            if ((isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))) {
                echo "<td class=\"thin\"></td>";
            }
            // line 20
            echo "\t\t\t\t<td class=\"thin\"></td>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
            // line 23
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sources"]) ? $context["sources"] : $this->getContext($context, "sources")));
            foreach ($context['_seq'] as $context["_key"] => $context["source"]) {
                // line 24
                echo "\t\t\t\t\t<tr data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "id"), "html", null, true);
                echo "\" data-name=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "name")), "html", null, true);
                echo "\">
\t\t\t\t\t\t<th scope=\"row\"><a href=\"";
                // line 25
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("settings/assets/sources/" . $this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "name")), "html", null, true);
                echo "</a></th>
\t\t\t\t\t\t";
                // line 26
                if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Cloud"), "method")) {
                    echo "<td>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "populateSourceType", array(0 => (isset($context["source"]) ? $context["source"] : $this->getContext($context, "source"))), "method"), "name"), "html", null, true);
                    echo "</td>";
                }
                // line 27
                echo "\t\t\t\t\t\t";
                if ((isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))) {
                    echo "<td class=\"thin\"><a class=\"move icon\" title=\"";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Reorder"), "html", null, true);
                    echo "\"></a></td>";
                }
                // line 28
                echo "\t\t\t\t\t\t<td class=\"thin\"><a class=\"delete icon\" title=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Delete"), "html", null, true);
                echo "\"></a></td>
\t\t\t\t\t</tr>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['source'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 31
            echo "\t\t\t</tbody>
\t\t</table>
\t";
        }
        // line 34
        echo "
\t<div class=\"buttons\">
\t\t<a class=\"btn add icon\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets/sources/new"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("New Source"), "html", null, true);
        echo "</a>
\t</div>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 41
        $context["js"] = ('' === $tmp = "\tnew Blocks.ui.AdminTable({
\t\ttableSelector: '#sources',
\t\tnoObjectsSelector: '#nosources',
\t\tsortable: true,
\t\treorderAction: 'assetSources/reorderSources',
\t\tdeleteAction: 'assetSources/deleteSource'
\t});
") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 50
        \Blocks\blx()->templates->includeJs((isset($context["js"]) ? $context["js"] : $this->getContext($context, "js")));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/assets/sources";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 50,  132 => 41,  124 => 36,  120 => 34,  115 => 31,  105 => 28,  98 => 27,  92 => 26,  86 => 25,  79 => 24,  75 => 23,  70 => 20,  65 => 19,  59 => 18,  55 => 17,  50 => 14,  47 => 13,  45 => 12,  39 => 9,  32 => 8,  30 => 7,  28 => 4,  26 => 3,  24 => 2,);
    }
}
