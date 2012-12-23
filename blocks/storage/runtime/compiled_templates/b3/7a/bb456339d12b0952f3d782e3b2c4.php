<?php

/* settings/users/settings */
class __TwigTemplate_b37abb456339d12b0952f3d782e3b2c4 extends Twig_Template
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
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 3
        $context["page"] = "settings";
        // line 4
        $context["title"] = \Blocks\Blocks::t("User Settings");
        // line 7
        if ((!array_key_exists("settings", $context))) {
            // line 8
            $context["settings"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "systemSettings"), "users");
            // line 9
            $context["freshSettings"] = true;
        } else {
            // line 11
            $context["freshSettings"] = false;
        }
        // line 15
        ob_start();
        // line 16
        echo "\t<form id=\"settings-form\" method=\"post\" action=\"\" class=\"centered\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"users/saveUserSettings\">

\t\t\t";
        // line 19
        echo $context["forms"]->getcheckboxField(array("label" => \Blocks\Blocks::t("Allow public registration?"), "name" => "allowPublicRegistration", "checked" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "allowPublicRegistration", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "allowPublicRegistration")) : (false)), "toggle" => "verify"));
        // line 24
        echo "

\t\t<div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">
\t\t</div>
\t</form>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/users/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 27,  49 => 24,  47 => 19,  42 => 16,  40 => 15,  37 => 11,  34 => 9,  32 => 8,  30 => 7,  28 => 4,  26 => 3,  24 => 2,);
    }
}
