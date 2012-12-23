<?php

/* settings/globals/_settings */
class __TwigTemplate_f7bf8f62b569588584d46d5c01e18850 extends Twig_Template
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
        if (((!array_key_exists("block", $context)) && array_key_exists("blockId", $context))) {
            // line 6
            $context["block"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "globals"), "getBlockById", array(0 => (isset($context["blockId"]) ? $context["blockId"] : $this->getContext($context, "blockId"))), "method");
            // line 7
            if ((!(isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 11
        $context["isNewBlock"] = ((!array_key_exists("block", $context)) || (!$this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id")));
        // line 14
        if ((isset($context["isNewBlock"]) ? $context["isNewBlock"] : $this->getContext($context, "isNewBlock"))) {
            // line 15
            $context["title"] = \Blocks\Blocks::t("Create a new global block");
        } else {
            // line 17
            $context["title"] = \Blocks\Blocks::t("{name} Settings", array("name" => (("<i>" . \Blocks\Blocks::t($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "name"))) . "</i>")));
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
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/globals"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Global Blocks"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 29
        ob_start();
        // line 30
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"globals/saveBlock\">
\t\t<input type=\"hidden\" name=\"redirect\" value=\"settings/globals\">
\t\t";
        // line 33
        if ((!(isset($context["isNewBlock"]) ? $context["isNewBlock"] : $this->getContext($context, "isNewBlock")))) {
            echo "<input type=\"hidden\" name=\"blockId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id"), "html", null, true);
            echo "\">";
        }
        // line 34
        echo "
\t\t";
        // line 35
        $this->env->loadTemplate("_includes/blocksettings")->display(array("block" => ((array_key_exists("block", $context)) ? ((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))) : (null))));
        // line 36
        echo "
\t\t<div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 38
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
        return "settings/globals/_settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 38,  79 => 36,  77 => 35,  74 => 34,  68 => 33,  63 => 30,  61 => 29,  53 => 24,  47 => 22,  45 => 21,  42 => 17,  39 => 15,  37 => 14,  35 => 11,  30 => 7,  28 => 6,  26 => 5,  24 => 2,);
    }
}
