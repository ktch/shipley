<?php

/* dashboard */
class __TwigTemplate_e74a1cc03a7dbfdfd3d0458868ac558c extends Twig_Template
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
        $context["title"] = \Blocks\Blocks::t("Dashboard");
        // line 3
        \Blocks\blx()->templates->includeCssResource("css/dashboard.css");
        // line 4
        \Blocks\blx()->templates->includeJsResource("js/dashboard.js");
        // line 7
        ob_start();
        // line 8
        echo "\t<h1>";
        echo twig_escape_filter($this->env, $this->getContext($context, "title"), "html", null, true);
        echo "</h1>
\t<ul class=\"right\">
\t\t<li><a class=\"btn settings icon\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("dashboard/settings"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 15
        ob_start();
        // line 16
        echo "\t<div id=\"widgets\" class=\"grid\">
\t\t";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "dashboard"), "getUserWidgets"));
        foreach ($context['_seq'] as $context["_key"] => $context["widget"]) {
            // line 18
            echo "\t\t\t";
            $context["widgetType"] = $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "dashboard"), "populateWidgetType", array(0 => $this->getContext($context, "widget")), "method");
            // line 19
            echo "\t\t\t";
            if ($this->getContext($context, "widgetType")) {
                // line 20
                echo "\t\t\t\t<div id=\"widget";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "widget"), "id"), "html", null, true);
                echo "\" class=\"widget ";
                echo twig_escape_filter($this->env, strtolower($this->getAttribute($this->getContext($context, "widgetType"), "classHandle")), "html", null, true);
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "widget"), "id"), "html", null, true);
                echo "\">
\t\t\t\t\t<h2>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "widgetType"), "title"), "html", null, true);
                echo "</h2>
\t\t\t\t\t<div class=\"body\">
\t\t\t\t\t\t";
                // line 23
                echo $this->getAttribute($this->getContext($context, "widgetType"), "getBodyHtml");
                echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            }
            // line 27
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['widget'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 28
        echo "\t</div>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "dashboard";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 28,  82 => 27,  75 => 23,  70 => 21,  61 => 20,  58 => 19,  55 => 18,  51 => 17,  48 => 16,  46 => 15,  38 => 10,  32 => 8,  30 => 7,  28 => 4,  26 => 3,  24 => 2,);
    }
}
