<?php

/* settings/users/groups/_settings */
class __TwigTemplate_e588bd78f37e9c2e61fd1873ed4fc165 extends Twig_Template
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
        $context["centered"] = true;
        // line 3
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 6
        if (((!array_key_exists("group", $context)) && array_key_exists("groupId", $context))) {
            // line 7
            $context["group"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "userGroups"), "getGroupById", array(0 => (isset($context["groupId"]) ? $context["groupId"] : $this->getContext($context, "groupId"))), "method");
            // line 8
            if ((!(isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 12
        $context["isNewGroup"] = ((!array_key_exists("group", $context)) || (!array_key_exists("groupId", $context)));
        // line 15
        if ((isset($context["isNewGroup"]) ? $context["isNewGroup"] : $this->getContext($context, "isNewGroup"))) {
            // line 16
            $context["title"] = \Blocks\Blocks::t("Create a new user group");
        } else {
            // line 18
            $context["title"] = \Blocks\Blocks::t("{name} Settings", array("name" => (("<i>" . \Blocks\Blocks::t($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "name"))) . "</i>")));
        }
        // line 22
        ob_start();
        // line 23
        echo "\t<h1>";
        echo (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"));
        echo "</h1>
\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 25
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/users"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("User Groups"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 30
        ob_start();
        // line 31
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"userGroups/saveGroup\">
\t\t<input type=\"hidden\" name=\"redirect\" value=\"settings/users\">
\t\t";
        // line 34
        if ((!(isset($context["isNewGroup"]) ? $context["isNewGroup"] : $this->getContext($context, "isNewGroup")))) {
            echo "<input type=\"hidden\" name=\"groupId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id"), "html", null, true);
            echo "\">";
        }
        // line 35
        echo "
\t\t";
        // line 36
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Name"), "id" => "name", "name" => "name", "value" => ((array_key_exists("group", $context)) ? ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "name")) : (null)), "errors" => ((array_key_exists("group", $context)) ? ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "getErrors", array(0 => "name"), "method")) : (null)), "autofocus" => true, "required" => true, "translatable" => true));
        // line 45
        echo "

\t\t";
        // line 47
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Handle"), "id" => "handle", "name" => "handle", "value" => ((array_key_exists("group", $context)) ? ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "handle")) : (null)), "errors" => ((array_key_exists("group", $context)) ? ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "getErrors", array(0 => "handle"), "method")) : (null)), "required" => true));
        // line 54
        echo "

\t\t<hr>

\t\t<h2>";
        // line 58
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Permissions"), "html", null, true);
        echo "</h2>

\t\t";
        // line 60
        $this->env->loadTemplate("_includes/permissions")->display(array("userOrGroup" => ((array_key_exists("group", $context)) ? ((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group"))) : (null))));
        // line 61
        echo "
\t\t<div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 63
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">
\t\t</div>
\t</form>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 69
        if (((!array_key_exists("group", $context)) || (!$this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "handle")))) {
            // line 70
            \Blocks\blx()->templates->includeJs("new Blocks.ui.HandleGenerator('#name', '#handle');");
        }
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/users/groups/_settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 70,  111 => 69,  104 => 63,  100 => 61,  98 => 60,  93 => 58,  87 => 54,  85 => 47,  81 => 45,  79 => 36,  76 => 35,  70 => 34,  65 => 31,  63 => 30,  55 => 25,  49 => 23,  47 => 22,  44 => 18,  41 => 16,  39 => 15,  37 => 12,  32 => 8,  30 => 7,  28 => 6,  26 => 3,  24 => 2,);
    }
}
