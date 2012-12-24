<?php

/* content/pages */
class __TwigTemplate_61c3a3e3490be7fb5af2c35ed17ea91a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("content/_layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "content/_layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["title"] = \Blocks\Blocks::t("Pages");
        // line 3
        $context["tab"] = "pages";
        // line 4
        $context["centered"] = true;
        // line 5
        $context["pages"] = $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "pages"), "getEditablePages");
        // line 6
        \Blocks\blx()->templates->includeCssResource("css/pages.css");
        // line 9
        ob_start();
        // line 10
        echo "\t<p id=\"nopages\"";
        if (twig_length_filter($this->env, $this->getContext($context, "pages"))) {
            echo " class=\"hidden\"";
        }
        echo ">
\t\t";
        // line 11
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("No pages exist yet."), "html", null, true);
        echo "
\t</p>

\t";
        // line 14
        if (twig_length_filter($this->env, $this->getContext($context, "pages"))) {
            // line 15
            echo "\t\t<table id=\"pages\" class=\"data\">
\t\t\t<thead>
\t\t\t\t<th scope=\"col\" width=\"33%\">";
            // line 17
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Title"), "html", null, true);
            echo "</th>
\t\t\t\t<th scope=\"col\" width=\"33%\">";
            // line 18
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("URL"), "html", null, true);
            echo "</th>
\t\t\t\t\t<td class=\"thin\"></td>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
            // line 22
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "pages"));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 23
                echo "\t\t\t\t\t<tr data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "page"), "id"), "html", null, true);
                echo "\" data-name=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute($this->getContext($context, "page"), "title")), "html", null, true);
                echo "\">
\t\t\t\t\t\t<th><a href=\"";
                // line 24
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("content/pages/" . $this->getAttribute($this->getContext($context, "page"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute($this->getContext($context, "page"), "title")), "html", null, true);
                echo "</a></th>
\t\t\t\t\t\t<td><a href=\"";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "page"), "getUrl"), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "page"), "getUrl"), "html", null, true);
                echo "</a></td>
\t\t\t\t\t\t<td class=\"thin\"><a class=\"delete icon\" title=\"";
                // line 26
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Delete"), "html", null, true);
                echo "\"></a></td>
\t\t\t\t\t</tr>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 29
            echo "\t\t\t</tbody>
\t\t</table>
\t";
        }
        // line 32
        echo "
\t<div class=\"buttons\">
\t\t<a class=\"btn add icon\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("content/pages/new"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("New Page"), "html", null, true);
        echo "</a>
\t</div>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 39
        $context["js"] = ('' === $tmp = "\tnew Blocks.ui.AdminTable({
\t\ttableSelector: '#pages',
\t\tnoObjectsSelector: '#nopages',
\t\tdeleteAction: 'pages/deletePage'
\t});
") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 46
        \Blocks\blx()->templates->includeJs($this->getContext($context, "js"));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "content/pages";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 46,  115 => 39,  107 => 34,  103 => 32,  98 => 29,  89 => 26,  83 => 25,  77 => 24,  70 => 23,  66 => 22,  59 => 18,  55 => 17,  51 => 15,  49 => 14,  43 => 11,  36 => 10,  34 => 9,  32 => 6,  30 => 5,  28 => 4,  26 => 3,  24 => 2,);
    }
}
