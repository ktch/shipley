<?php

/* dashboard/settings */
class __TwigTemplate_1de8c80a259ca862e0d949f3fb28a287 extends Twig_Template
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
        // line 2
        $context["title"] = \Blocks\Blocks::t("Dashboard Settings");
        // line 3
        $context["centered"] = true;
        // line 4
        $context["widgets"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "dashboard"), "getUserWidgets");
        // line 5
        $context["sortable"] = (twig_length_filter($this->env, (isset($context["widgets"]) ? $context["widgets"] : $this->getContext($context, "widgets"))) > 1);
        // line 8
        ob_start();
        // line 9
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("dashboard"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Dashboard"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 16
        ob_start();
        // line 17
        echo "\t<h2>";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("My Widgets"), "html", null, true);
        echo "</h2>

\t<p id=\"nowidgets\"";
        // line 19
        if (twig_length_filter($this->env, (isset($context["widgets"]) ? $context["widgets"] : $this->getContext($context, "widgets")))) {
            echo " class=\"hidden\"";
        }
        echo ">
\t\t";
        // line 20
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("You don’t have any widgets yet."), "html", null, true);
        echo "
\t</p>

\t";
        // line 23
        if (twig_length_filter($this->env, (isset($context["widgets"]) ? $context["widgets"] : $this->getContext($context, "widgets")))) {
            // line 24
            echo "\t\t<table id=\"widgets\" class=\"data\">
\t\t\t<tbody>
\t\t\t\t";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["widgets"]) ? $context["widgets"] : $this->getContext($context, "widgets")));
            foreach ($context['_seq'] as $context["_key"] => $context["widget"]) {
                // line 27
                echo "\t\t\t\t\t";
                $context["widgetType"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "dashboard"), "populateWidgetType", array(0 => (isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget"))), "method");
                // line 28
                echo "\t\t\t\t\t<tr data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "id"), "html", null, true);
                echo "\" data-name=\"";
                echo twig_escape_filter($this->env, (((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType"))) ? ($this->getAttribute((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType")), "title")) : ($this->getAttribute((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "type"))), "html", null, true);
                echo "\">
\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t<a href=\"";
                // line 30
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("dashboard/settings/" . $this->getAttribute((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType"))) ? ($this->getAttribute((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType")), "title")) : (\Blocks\Blocks::t("Unknown"))), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t";
                // line 31
                if ((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType"))) {
                    // line 32
                    echo "\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType")), "name") != $this->getAttribute((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType")), "title"))) {
                        echo "<span class=\"light\">(";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widgetType"]) ? $context["widgetType"] : $this->getContext($context, "widgetType")), "name"), "html", null, true);
                        echo ")</span>";
                    }
                    // line 33
                    echo "\t\t\t\t\t\t\t";
                } else {
                    // line 34
                    echo "\t\t\t\t\t\t\t\t<span class=\"light error\">(";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "type"), "html", null, true);
                    echo ")</span>
\t\t\t\t\t\t\t";
                }
                // line 36
                echo "\t\t\t\t\t\t</th>
\t\t\t\t\t\t";
                // line 37
                if ((isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))) {
                    echo "<td class=\"thin\"><a class=\"move icon\" title=\"";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Reorder"), "html", null, true);
                    echo "\"></a></td>";
                }
                // line 38
                echo "\t\t\t\t\t\t<td class=\"thin\"><a class=\"delete icon\" title=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Delete"), "html", null, true);
                echo "\"></a></td>
\t\t\t\t\t</tr>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['widget'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 41
            echo "\t\t\t</tbody>
\t\t</table>
\t";
        }
        // line 44
        echo "
\t<div class=\"buttons\">
\t\t<a href=\"";
        // line 46
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("dashboard/settings/new"), "html", null, true);
        echo "\" class=\"btn add icon\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("New Widget"), "html", null, true);
        echo "</a>
\t</div>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 51
        $context["js"] = ('' === $tmp = "\tnew Blocks.ui.AdminTable({
\t\ttableSelector: '#widgets',
\t\tnoObjectsSelector: '#nowidgets',
\t\tsortable: true,
\t\treorderAction: 'dashboard/reorderUserWidgets',
\t\tdeleteAction: 'dashboard/deleteUserWidget'
\t});
") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 60
        \Blocks\blx()->templates->includeJs((isset($context["js"]) ? $context["js"] : $this->getContext($context, "js")));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "dashboard/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 60,  149 => 51,  141 => 46,  137 => 44,  132 => 41,  122 => 38,  116 => 37,  113 => 36,  107 => 34,  104 => 33,  97 => 32,  95 => 31,  89 => 30,  81 => 28,  78 => 27,  74 => 26,  70 => 24,  68 => 23,  62 => 20,  56 => 19,  50 => 17,  48 => 16,  40 => 11,  34 => 9,  32 => 8,  30 => 5,  28 => 4,  26 => 3,  24 => 2,);
    }
}
