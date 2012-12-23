<?php

/* settings/assets/sizes/_settings */
class __TwigTemplate_3d9f7766b9a0bb20e61782de760b27f3 extends Twig_Template
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
        if (((!array_key_exists("size", $context)) && array_key_exists("sizeHandle", $context))) {
            // line 7
            $context["size"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getSizeByHandle", array(0 => (isset($context["sizeHandle"]) ? $context["sizeHandle"] : $this->getContext($context, "sizeHandle"))), "method");
            // line 8
            if ((!(isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 11
        $context["isNewSize"] = ((!array_key_exists("size", $context)) || (!$this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "id")));
        // line 14
        if ((isset($context["isNewSize"]) ? $context["isNewSize"] : $this->getContext($context, "isNewSize"))) {
            // line 15
            $context["title"] = \Blocks\Blocks::t("Create a new asset size");
        } else {
            // line 17
            $context["title"] = \Blocks\Blocks::t("{name} Settings", array("name" => (("<i>" . \Blocks\Blocks::t($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "name"))) . "</i>")));
        }
        // line 21
        ob_start();
        // line 22
        echo "\t<h1>";
        echo (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"));
        echo "</h1>
\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 24
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Asset Sizes"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 29
        ob_start();
        // line 30
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"assetSizes/saveSize\">
\t\t<input type=\"hidden\" name=\"redirect\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets/operations", array("size" => "{handle}")), "html", null, true);
        echo "\">

\t\t";
        // line 34
        if ((!(isset($context["isNewSize"]) ? $context["isNewSize"] : $this->getContext($context, "isNewSize")))) {
            echo "<input type=\"hidden\" name=\"sizeId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "id"), "html", null, true);
            echo "\">";
        }
        // line 35
        echo "
\t\t";
        // line 36
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Name"), "id" => "name", "name" => "name", "value" => ((array_key_exists("size", $context)) ? ($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "name")) : (null)), "errors" => ((array_key_exists("size", $context)) ? ($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "getErrors", array(0 => "name"), "method")) : (null)), "autofocus" => true, "required" => true, "translatable" => true));
        // line 45
        echo "

\t\t";
        // line 47
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Handle"), "id" => "handle", "name" => "handle", "value" => ((array_key_exists("size", $context)) ? ($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "handle")) : (null)), "errors" => ((array_key_exists("size", $context)) ? ($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "getErrors", array(0 => "handle"), "method")) : (null)), "required" => true, "translatable" => true));
        // line 55
        echo "

        ";
        // line 57
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Width"), "id" => "width", "name" => "width", "value" => ((array_key_exists("size", $context)) ? ($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "width")) : (null)), "errors" => ((array_key_exists("size", $context)) ? ($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "getErrors", array(0 => "width"), "method")) : (null)), "required" => true, "translatable" => true));
        // line 65
        echo "

        ";
        // line 67
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Height"), "id" => "height", "name" => "height", "value" => ((array_key_exists("size", $context)) ? ($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "height")) : (null)), "errors" => ((array_key_exists("size", $context)) ? ($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "getErrors", array(0 => "height"), "method")) : (null)), "required" => true, "translatable" => true));
        // line 75
        echo "

        <div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 78
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">
\t\t</div>
\t</form>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 84
        ob_start();
        // line 85
        echo "    ";
        if (((!array_key_exists("size", $context)) || (!$this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "handle")))) {
            echo "new Blocks.ui.HandleGenerator('#name', '#handle');";
        }
        $context["js"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 87
        \Blocks\blx()->templates->includeJs((isset($context["js"]) ? $context["js"] : $this->getContext($context, "js")));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/assets/sizes/_settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 87,  117 => 85,  115 => 84,  108 => 78,  103 => 75,  101 => 67,  97 => 65,  95 => 57,  91 => 55,  89 => 47,  85 => 45,  83 => 36,  80 => 35,  74 => 34,  69 => 32,  65 => 30,  63 => 29,  55 => 24,  49 => 22,  47 => 21,  44 => 17,  41 => 15,  39 => 14,  37 => 11,  32 => 8,  30 => 7,  28 => 6,  26 => 3,  24 => 2,);
    }
}
