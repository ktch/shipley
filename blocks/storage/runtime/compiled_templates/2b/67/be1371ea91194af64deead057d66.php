<?php

/* settings/sections/_edit/settings */
class __TwigTemplate_2b67be1371ea91194af64deead057d66 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("settings/sections/_edit/layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "settings/sections/_edit/layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (((!array_key_exists("section", $context)) && array_key_exists("sectionId", $context))) {
            // line 2
            $context["section"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "sections"), "id", array(0 => (isset($context["sectionId"]) ? $context["sectionId"] : $this->getContext($context, "sectionId"))), "method"), "first");
            // line 3
            if ((!(isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 8
        $context["tab"] = "settings";
        // line 9
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 12
        $context["isNewSection"] = ((!array_key_exists("section", $context)) || (!$this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")));
        // line 15
        ob_start();
        // line 16
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"sections/saveSection\">
\t\t<input type=\"hidden\" name=\"redirect\" value=\"settings/sections/{sectionId}\">
\t\t";
        // line 19
        if ((!(isset($context["isNewSection"]) ? $context["isNewSection"] : $this->getContext($context, "isNewSection")))) {
            echo "<input type=\"hidden\" name=\"sectionId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"), "html", null, true);
            echo "\">";
        }
        // line 20
        echo "

\t\t";
        // line 22
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Name"), "instructions" => \Blocks\Blocks::t("What this section will be called in the CP."), "id" => "name", "name" => "name", "value" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "name")) : (null)), "errors" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "getErrors", array(0 => "name"), "method")) : (null)), "autofocus" => true, "required" => true, "translatable" => true));
        // line 32
        echo "

\t\t";
        // line 34
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Handle"), "instructions" => \Blocks\Blocks::t("How you’ll refer to this section in the templates."), "id" => "handle", "class" => "code", "name" => "handle", "value" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "handle")) : (null)), "errors" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "getErrors", array(0 => "handle"), "method")) : (null)), "required" => true));
        // line 43
        echo "

\t\t";
        // line 45
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("“Title” Label"), "instructions" => \Blocks\Blocks::t("What do you want the entries’ “Title” fields to be labeled?"), "id" => "titleLabel", "name" => "titleLabel", "value" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "titleLabel")) : ("Title")), "errors" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "getErrors", array(0 => "titleLabel"), "method")) : (null)), "required" => true, "translatable" => true));
        // line 54
        echo "

\t\t";
        // line 56
        echo $context["forms"]->getcheckboxField(array("label" => \Blocks\Blocks::t("Entries in this section have their own URLs"), "name" => "hasUrls", "checked" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "hasUrls")) : (true)), "toggle" => "has-urls-setting"));
        // line 61
        echo "

\t\t<div id=\"has-urls-setting\" class=\"nested-fields";
        // line 63
        if ((array_key_exists("section", $context) && (!$this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "hasUrls")))) {
            echo " hidden";
        }
        echo "\">

\t\t\t<hr>

\t\t\t";
        // line 67
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Entry URL Format"), "instructions" => \Blocks\Blocks::t("What the entry URLs should look like."), "id" => "urlFormat", "class" => "code", "name" => "urlFormat", "value" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "urlFormat")) : (null)), "errors" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "getErrors", array(0 => "urlFormat"), "method")) : (null)), "required" => true));
        // line 76
        echo "

\t\t\t";
        // line 78
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Entry Template"), "instructions" => \Blocks\Blocks::t("The template to use when an entry’s URL is requested."), "id" => "template", "name" => "template", "value" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "template")) : (null)), "errors" => ((array_key_exists("section", $context)) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "getErrors", array(0 => "template"), "method")) : (null))));
        // line 85
        echo "

\t\t\t<hr>

\t\t</div>

\t\t<div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">
\t\t</div>
\t</form>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 98
        ob_start();
        // line 99
        echo "\t";
        if (((!array_key_exists("section", $context)) || (!$this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "handle")))) {
            echo "new Blocks.ui.HandleGenerator('#name', '#handle');";
        }
        // line 100
        echo "\t";
        if (((!array_key_exists("section", $context)) || (!$this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "urlFormat")))) {
            echo "new Blocks.ui.EntryUrlFormatGenerator('#name', '#urlFormat');";
        }
        $context["js"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 102
        \Blocks\blx()->templates->includeJs((isset($context["js"]) ? $context["js"] : $this->getContext($context, "js")));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/sections/_edit/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 102,  120 => 100,  115 => 99,  113 => 98,  106 => 92,  97 => 85,  95 => 78,  91 => 76,  89 => 67,  80 => 63,  76 => 61,  74 => 56,  70 => 54,  68 => 45,  64 => 43,  62 => 34,  58 => 32,  56 => 22,  52 => 20,  46 => 19,  41 => 16,  39 => 15,  37 => 12,  35 => 9,  33 => 8,  28 => 3,  26 => 2,  24 => 1,);
    }
}
