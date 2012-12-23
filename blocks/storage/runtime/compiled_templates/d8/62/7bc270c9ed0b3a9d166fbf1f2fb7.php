<?php

/* _components/assetsourcetypes/S3/settings */
class __TwigTemplate_d8627bc270c9ed0b3a9d166fbf1f2fb7 extends Twig_Template
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
        $context["__internal_72d4cefa0dd8bc0c571cab57b275292b77c521c6"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        echo "
";
        // line 3
        echo $context["__internal_72d4cefa0dd8bc0c571cab57b275292b77c521c6"]->gettextField(array("label" => \Blocks\Blocks::t("Access Key ID"), "id" => "keyId", "name" => "keyId", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "keyId"), "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "keyId"), "method"), "class" => "s3-key-id", "required" => true));
        // line 11
        echo "

";
        // line 13
        echo $context["__internal_72d4cefa0dd8bc0c571cab57b275292b77c521c6"]->gettextField(array("label" => \Blocks\Blocks::t("Secret Access Key"), "id" => "secret", "name" => "secret", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "secret"), "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "secret"), "method"), "class" => "s3-secret-key", "required" => true));
        // line 21
        echo "

<hr>

<div class=\"btn refresh-buckets\">";
        // line 25
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Refresh bucket list"), "html", null, true);
        echo "</div>

";
        // line 27
        echo $context["__internal_72d4cefa0dd8bc0c571cab57b275292b77c521c6"]->getselectField(array("label" => "Bucket", "instructions" => \Blocks\Blocks::t("Choose a bucket to use"), "id" => "bucket", "name" => "bucket", "options" => array($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "bucket") => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "bucket")), "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "bucket"), "disabled" => true, "class" => "bucket-select"));
        // line 36
        echo "

";
        // line 38
        echo $context["__internal_72d4cefa0dd8bc0c571cab57b275292b77c521c6"]->gettextField(array("label" => \Blocks\Blocks::t("URL prefix "), "instructions" => \Blocks\Blocks::t("If you have set up a CNAME record pointing to this bucket, you can enter it here. Otherwise leave this setting alone."), "id" => "urlPrefix", "name" => "urlPrefix", "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "urlPrefix"), "errors" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "url_prefix"), "method"), "required" => true, "class" => "url-prefix"));
        // line 47
        echo "

<input type=\"hidden\" name=\"location\" class=\"bucket-location\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "location"), "html", null, true);
        echo "\" />";
    }

    public function getTemplateName()
    {
        return "_components/assetsourcetypes/S3/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 47,  43 => 27,  38 => 25,  21 => 2,  19 => 1,  180 => 93,  176 => 91,  173 => 89,  170 => 88,  167 => 87,  164 => 86,  158 => 85,  153 => 82,  151 => 81,  149 => 80,  139 => 78,  137 => 77,  134 => 76,  131 => 75,  128 => 74,  125 => 73,  122 => 72,  119 => 71,  116 => 70,  112 => 69,  108 => 67,  106 => 59,  103 => 58,  101 => 57,  98 => 56,  95 => 55,  93 => 54,  89 => 52,  87 => 43,  84 => 42,  78 => 41,  73 => 38,  71 => 37,  63 => 32,  57 => 30,  55 => 49,  52 => 25,  49 => 38,  47 => 22,  45 => 36,  42 => 15,  39 => 13,  37 => 12,  32 => 21,  30 => 13,  28 => 6,  26 => 11,  24 => 3,);
    }
}
