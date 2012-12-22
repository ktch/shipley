<?php

/* _components/widgets/GetHelp/body */
class __TwigTemplate_19081a42841fda052d5dd8d7c0739e8e extends Twig_Template
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
        $context["__internal_8415b68dbe4d5e1195d938cd6a48a6c565eb9eaa"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        echo "

";
        // line 4
        echo $context["__internal_8415b68dbe4d5e1195d938cd6a48a6c565eb9eaa"]->gettextarea(array("class" => "message nicetext", "rows" => 10, "value" => (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message"))));
        // line 8
        echo "

<div class=\"buttons\">
\t<div class=\"btn submit\">";
        // line 11
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Send"), "html", null, true);
        echo "</div>
\t<div class=\"spinner hidden\"></div>
</div>

";
        // line 15
        $context["email"] = ('' === $tmp = "<a href=\"mailto:support@blockscms.com\">support@blockscms.com</a>") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 16
        echo "<p class=\"error hidden\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Couldn’t send your message. Please email it to {email} instead.", array("email" => (isset($context["email"]) ? $context["email"] : $this->getContext($context, "email")))), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "_components/widgets/GetHelp/body";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 16,  22 => 2,  106 => 35,  100 => 33,  96 => 31,  87 => 27,  81 => 25,  79 => 24,  68 => 21,  64 => 19,  49 => 14,  45 => 13,  33 => 7,  52 => 15,  47 => 13,  43 => 11,  39 => 15,  34 => 7,  69 => 26,  65 => 24,  59 => 23,  50 => 14,  40 => 11,  35 => 7,  27 => 8,  25 => 4,  21 => 2,  19 => 1,  205 => 72,  202 => 71,  195 => 67,  191 => 65,  189 => 64,  183 => 63,  180 => 62,  174 => 59,  171 => 58,  169 => 57,  163 => 53,  152 => 51,  148 => 50,  137 => 44,  131 => 40,  123 => 37,  118 => 35,  116 => 34,  114 => 33,  101 => 32,  98 => 31,  94 => 30,  76 => 22,  73 => 21,  66 => 18,  60 => 17,  56 => 22,  53 => 21,  42 => 12,  37 => 8,  31 => 7,  88 => 28,  82 => 23,  75 => 23,  70 => 21,  61 => 18,  58 => 17,  55 => 16,  51 => 14,  48 => 16,  46 => 19,  38 => 10,  32 => 11,  30 => 6,  28 => 4,  26 => 3,  24 => 3,);
    }
}
