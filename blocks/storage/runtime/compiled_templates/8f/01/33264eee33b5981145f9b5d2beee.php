<?php

/* settings/users/groups */
class __TwigTemplate_8f0133264eee33b5981145f9b5d2beee extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("settings/users/_layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "settings/users/_layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["page"] = "groups";
        // line 3
        $context["title"] = \Blocks\Blocks::t("User Groups");
        // line 4
        $context["groups"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "userGroups"), "getAllGroups");
        // line 7
        ob_start();
        // line 8
        echo "\t<p id=\"nogroups\"";
        if (twig_length_filter($this->env, (isset($context["groups"]) ? $context["groups"] : $this->getContext($context, "groups")))) {
            echo " class=\"hidden\"";
        }
        echo ">
\t\t";
        // line 9
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("No groups exist yet."), "html", null, true);
        echo "
\t</p>

\t";
        // line 12
        if (twig_length_filter($this->env, (isset($context["groups"]) ? $context["groups"] : $this->getContext($context, "groups")))) {
            // line 13
            echo "\t\t<table id=\"groups\" class=\"data\">
\t\t\t<thead>
\t\t\t\t<th scope=\"col\">";
            // line 15
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Name"), "html", null, true);
            echo "</th>
\t\t\t\t<th scope=\"col\">";
            // line 16
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Handle"), "html", null, true);
            echo "</th>
\t\t\t\t<td class=\"thin\"></td>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
            // line 20
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : $this->getContext($context, "groups")));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 21
                echo "\t\t\t\t\t<tr data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id"), "html", null, true);
                echo "\" data-name=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "name")), "html", null, true);
                echo "\">
\t\t\t\t\t\t<th scope=\"row\"><a href=\"";
                // line 22
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("settings/users/groups/" . $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "name")), "html", null, true);
                echo "</a></th>
\t\t\t\t\t\t<td><code>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "handle"), "html", null, true);
                echo "</code></td>
\t\t\t\t\t\t<td class=\"thin\"><a class=\"delete icon\" title=\"";
                // line 24
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Delete"), "html", null, true);
                echo "\"></a></td>
\t\t\t\t\t</tr>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 27
            echo "\t\t\t</tbody>
\t\t</table>
\t";
        }
        // line 30
        echo "
\t<div class=\"buttons\">
\t\t<a href=\"";
        // line 32
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/users/groups/new"), "html", null, true);
        echo "\" class=\"btn add icon\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("New Group"), "html", null, true);
        echo "</a>
\t</div>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 37
        $context["js"] = ('' === $tmp = "\tnew Blocks.ui.AdminTable({
\t\ttableSelector: '#groups',
\t\tnoObjectsSelector: '#nogroups',
\t\tdeleteAction: 'userGroups/deleteGroup'
\t});
") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 44
        \Blocks\blx()->templates->includeJs((isset($context["js"]) ? $context["js"] : $this->getContext($context, "js")));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/users/groups";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 44,  109 => 37,  101 => 32,  97 => 30,  92 => 27,  83 => 24,  79 => 23,  73 => 22,  66 => 21,  62 => 20,  55 => 16,  51 => 15,  47 => 13,  45 => 12,  39 => 9,  32 => 8,  30 => 7,  28 => 4,  26 => 3,  24 => 2,);
    }
}
