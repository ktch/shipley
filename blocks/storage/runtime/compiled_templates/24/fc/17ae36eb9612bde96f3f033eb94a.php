<?php

/* _components/widgets/Updates/body */
class __TwigTemplate_24fc17ae36eb9612bde96f3f033eb94a extends Twig_Template
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
        echo "<p class=\"centeralign\">
\t";
        // line 2
        if ((isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) {
            // line 3
            echo "\t\t";
            if (((isset($context["total"]) ? $context["total"] : $this->getContext($context, "total")) == 1)) {
                // line 4
                echo "\t\t\t";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("One update available!"), "html", null, true);
                echo "
\t\t";
            } else {
                // line 6
                echo "\t\t\t";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("{total} updates available!", array("total" => (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total")))), "html", null, true);
                echo "
\t\t";
            }
            // line 8
            echo "\t\t<a class=\"go\" href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("updates"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Go to Updates"), "html", null, true);
            echo "</a>
\t";
        } else {
            // line 10
            echo "\t\t";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("You’re up-to-date!"), "html", null, true);
            echo "
\t";
        }
        // line 12
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "_components/widgets/Updates/body";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 12,  47 => 10,  39 => 8,  33 => 6,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
