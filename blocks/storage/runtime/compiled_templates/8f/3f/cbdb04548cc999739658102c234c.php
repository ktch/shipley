<?php

/* settings/sections */
class __TwigTemplate_8f3fcbdb04548cc999739658102c234c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("_layouts/cp");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "_layouts/cp";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        \Blocks\blx()->templates->includeJsResource("js/SectionAdminTable.js");
        // line 2
        \Blocks\blx()->templates->includeTranslations(
        	"Are you sure you want to delete “{name}” and its {entries} entries?"
        );
        // line 7
        $context["title"] = \Blocks\Blocks::t("Sections");
        // line 8
        $context["centered"] = true;
        // line 11
        ob_start();
        // line 12
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 19
        ob_start();
        // line 20
        echo "\t";
        list($context['paginate'], $context["sections"]) = \Blocks\TemplateHelper::paginateCriteria($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "sections"), "limit", array(0 => 50), "method"));
        // line 21
        echo "
\t\t<p id=\"nosections\"";
        // line 22
        if (twig_length_filter($this->env, (isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")))) {
            echo " class=\"hidden\"";
        }
        echo ">
\t\t\t";
        // line 23
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("No sections exist yet."), "html", null, true);
        echo "
\t\t</p>

\t\t";
        // line 26
        if (twig_length_filter($this->env, (isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")))) {
            // line 27
            echo "
\t\t\t";
            // line 28
            $this->env->loadTemplate("_includes/paginatelinks")->display(array_merge($context, array("type" => \Blocks\Blocks::t("sections"))));
            // line 29
            echo "
\t\t\t<table id=\"sections\" class=\"data\">
\t\t\t\t<thead>
\t\t\t\t\t<th scope=\"col\" width=\"33%\">";
            // line 32
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Name"), "html", null, true);
            echo "</th>
\t\t\t\t\t<th scope=\"col\" width=\"33%\">";
            // line 33
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Handle"), "html", null, true);
            echo "</th>
\t\t\t\t\t<th scope=\"col\" width=\"33%\">";
            // line 34
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Blocks"), "html", null, true);
            echo "</th>
\t\t\t\t\t<td class=\"thin\"></td>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
            // line 38
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")));
            foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
                // line 39
                echo "\t\t\t\t\t\t<tr data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"), "html", null, true);
                echo "\" data-name=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "name")), "html", null, true);
                echo "\" data-entries=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entries"), "sectionId", array(0 => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")), "method"), "total"), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t<th scope=\"row\"><a href=\"";
                // line 40
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("settings/sections/" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "name")), "html", null, true);
                echo "</a></th>
\t\t\t\t\t\t\t<td><code>";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "handle"), "html", null, true);
                echo "</code></td>
\t\t\t\t\t\t\t<td><a href=\"";
                // line 42
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl((("settings/sections/" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")) . "/blocks")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryBlocks"), "getTotalBlocksBySectionId", array(0 => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")), "method"), "html", null, true);
                echo "</a></td>
\t\t\t\t\t\t\t<td class=\"thin\"><a class=\"delete icon\" title=\"";
                // line 43
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Delete"), "html", null, true);
                echo "\"></a></td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 46
            echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t";
        }
        // line 49
        echo "
\t";
        unset($context['paginate'], $context["sections"]);
        // line 51
        echo "
\t<div class=\"buttons\">
\t\t<a href=\"";
        // line 53
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/sections/new"), "html", null, true);
        echo "\" class=\"btn add icon\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("New Section"), "html", null, true);
        echo "</a>
\t</div>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 58
        $context["js"] = ('' === $tmp = "\tnew Blocks.ui.SectionAdminTable();
") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 61
        \Blocks\blx()->templates->includeJs((isset($context["js"]) ? $context["js"] : $this->getContext($context, "js")));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/sections";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 61,  156 => 58,  148 => 53,  144 => 51,  140 => 49,  135 => 46,  126 => 43,  120 => 42,  116 => 41,  110 => 40,  101 => 39,  97 => 38,  90 => 34,  86 => 33,  82 => 32,  77 => 29,  75 => 28,  72 => 27,  70 => 26,  64 => 23,  58 => 22,  55 => 21,  52 => 20,  50 => 19,  42 => 14,  36 => 12,  34 => 11,  32 => 8,  30 => 7,  26 => 2,  24 => 1,);
    }
}
