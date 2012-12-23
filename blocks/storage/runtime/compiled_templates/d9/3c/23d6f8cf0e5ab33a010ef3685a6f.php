<?php

/* assets/_views/folder_contents */
class __TwigTemplate_d93c23d6f8cf0e5ab33a010ef3685a6f extends Twig_Template
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
        echo "<div class=\"folder-breadcrumbs\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["folder"]) ? $context["folder"] : $this->getContext($context, "folder")), "getBreadcrumbs"));
        foreach ($context['_seq'] as $context["folder_id"] => $context["folder_name"]) {
            // line 3
            echo "        <a href=\"#\">";
            echo twig_escape_filter($this->env, (isset($context["folder_name"]) ? $context["folder_name"] : $this->getContext($context, "folder_name")), "html", null, true);
            echo "</a> &nbsp;
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['folder_id'], $context['folder_name'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 5
        echo "</div>

<div class=\"folder-contents\">
    ";
        // line 8
        $template = $this->env->resolveTemplate(("assets/_views/" . (isset($context["view"]) ? $context["view"] : $this->getContext($context, "view"))));
        $template->display(array("files" => (isset($context["files"]) ? $context["files"] : $this->getContext($context, "files")), "folders" => (isset($context["subfolders"]) ? $context["subfolders"] : $this->getContext($context, "subfolders"))));
        // line 9
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "assets/_views/folder_contents";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 9,  40 => 8,  35 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
