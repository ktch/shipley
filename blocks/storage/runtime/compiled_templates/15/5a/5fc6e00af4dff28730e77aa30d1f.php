<?php

/* settings/sections/_edit/blocks/settings */
class __TwigTemplate_155a5fc6e00af4dff28730e77aa30d1f extends Twig_Template
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
        // line 5
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
            // line 6
            if ((!array_key_exists("sectionId", $context))) {
                throw new \Blocks\HttpException(404);
            }
            // line 7
            $context["section"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "sections"), "id", array(0 => (isset($context["sectionId"]) ? $context["sectionId"] : $this->getContext($context, "sectionId"))), "method"), "first");
            // line 8
            if ((!(isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 12
        if (((!array_key_exists("block", $context)) && array_key_exists("blockId", $context))) {
            // line 13
            $context["block"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryBlocks"), "getBlockById", array(0 => (isset($context["blockId"]) ? $context["blockId"] : $this->getContext($context, "blockId"))), "method");
            // line 14
            if ((!(isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 18
        $context["isNewBlock"] = ((!array_key_exists("block", $context)) || (!$this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id")));
        // line 21
        if ((isset($context["isNewBlock"]) ? $context["isNewBlock"] : $this->getContext($context, "isNewBlock"))) {
            // line 22
            $context["title"] = \Blocks\Blocks::t("Create a new entry block");
        } else {
            // line 24
            $context["title"] = \Blocks\Blocks::t("{name} Settings", array("name" => (("<i>" . \Blocks\Blocks::t($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "name"))) . "</i>")));
        }
        // line 28
        ob_start();
        // line 29
        echo "\t<h1>";
        echo (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"));
        echo "</h1>
\t<ul class=\"left\">
\t\t";
        // line 31
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
            // line 32
            echo "\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl((("settings/sections/" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")) . "/blocks")), "html", null, true);
            echo "\" class=\"backbtn\">";
            echo \Blocks\Blocks::t("{section} Entry Blocks", array("section" => (("<i>" . \Blocks\Blocks::t($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "name"))) . "</i>")));
            echo "</a></li>
\t\t";
        } else {
            // line 34
            echo "\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/blog"), "html", null, true);
            echo "\" class=\"backbtn\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Blog"), "html", null, true);
            echo "</a></li>
\t\t";
        }
        // line 36
        echo "\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 40
        ob_start();
        // line 41
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t";
        // line 42
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
            // line 43
            echo "\t\t\t<input type=\"hidden\" name=\"action\" value=\"sections/saveBlock\">
\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"settings/sections/";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"), "html", null, true);
            echo "/blocks\">
\t\t\t<input type=\"hidden\" name=\"sectionId\" value=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"), "html", null, true);
            echo "\">
\t\t";
        } else {
            // line 47
            echo "\t\t\t<input type=\"hidden\" name=\"action\" value=\"entries/saveBlock\">
\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"settings/blog\">
\t\t";
        }
        // line 50
        echo "
\t\t";
        // line 51
        if ((!(isset($context["isNewBlock"]) ? $context["isNewBlock"] : $this->getContext($context, "isNewBlock")))) {
            // line 52
            echo "\t\t\t<input type=\"hidden\" name=\"blockId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id"), "html", null, true);
            echo "\">
\t\t";
        }
        // line 54
        echo "
\t\t";
        // line 55
        $this->env->loadTemplate("_includes/blocksettings")->display(array("block" => ((array_key_exists("block", $context)) ? ((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) : (null)), "canBeTranslatable" => true));
        // line 56
        echo "
\t\t<div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 58
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
        return "settings/sections/_edit/blocks/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 58,  128 => 56,  126 => 55,  123 => 54,  117 => 52,  115 => 51,  112 => 50,  107 => 47,  102 => 45,  98 => 44,  95 => 43,  93 => 42,  90 => 41,  88 => 40,  84 => 36,  76 => 34,  68 => 32,  66 => 31,  60 => 29,  58 => 28,  55 => 24,  52 => 22,  50 => 21,  48 => 18,  43 => 14,  41 => 13,  39 => 12,  34 => 8,  32 => 7,  28 => 6,  26 => 5,  24 => 2,);
    }
}
