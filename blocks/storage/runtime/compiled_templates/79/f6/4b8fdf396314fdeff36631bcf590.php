<?php

/* settings/general/_logo */
class __TwigTemplate_79f64b8fdf396314fdeff36631bcf590 extends Twig_Template
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
        echo "<div class=\"cp-logo\">
    <div class=\"current-logo\" ";
        // line 2
        if ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "rebrand"), "isLogoUploaded")) {
            // line 3
            echo "style=\"background-image: url(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "rebrand"), "logo"), "url"), "html", null, true);
            echo "); width: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "rebrand"), "logo"), "width"), "html", null, true);
            echo "px; height: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "rebrand"), "logo"), "height"), "html", null, true);
            echo "px;\"";
        }
        // line 4
        echo "></div>
    <div class=\"logo-controls\"";
        // line 5
        if ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "rebrand"), "isLogoUploaded")) {
            echo " style=\"margin-left: ";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "rebrand"), "logo"), "width") + 15), "html", null, true);
            echo "px;\"";
        }
        echo ">
        ";
        // line 6
        if ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "rebrand"), "isLogoUploaded")) {
            // line 7
            echo "            <div class=\"btn upload-logo\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Change logo"), "html", null, true);
            echo "</div>
            <div class=\"btn delete-logo\">";
            // line 8
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Delete logo"), "html", null, true);
            echo "</div>
        ";
        } else {
            // line 10
            echo "            <div class=\"btn upload-logo\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Upload a logo"), "html", null, true);
            echo "</div>
        ";
        }
        // line 12
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "settings/general/_logo";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 8,  44 => 6,  36 => 5,  33 => 4,  22 => 2,  19 => 1,  131 => 82,  127 => 80,  121 => 76,  119 => 74,  116 => 73,  113 => 72,  110 => 71,  108 => 70,  105 => 69,  102 => 68,  99 => 67,  96 => 66,  93 => 65,  90 => 64,  87 => 63,  83 => 60,  80 => 59,  78 => 58,  74 => 56,  72 => 48,  68 => 46,  66 => 39,  62 => 12,  60 => 29,  56 => 10,  54 => 20,  48 => 16,  46 => 7,  38 => 10,  32 => 8,  30 => 7,  28 => 4,  26 => 3,  24 => 3,);
    }
}
