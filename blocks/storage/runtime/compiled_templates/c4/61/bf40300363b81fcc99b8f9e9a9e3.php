<?php

/* _components/tools/cropper_modal */
class __TwigTemplate_c461bf40300363b81fcc99b8f9e9a9e3 extends Twig_Template
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
        echo "<div class=\"crop-image\">
    <div class=\"image-chooser\" style=\"margin-left: ";
        // line 2
        echo twig_escape_filter($this->env, round(((500 - (isset($context["width"]) ? $context["width"] : $this->getContext($context, "width"))) / 2)), "html", null, true);
        echo "px\">
        <img src=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["imageUrl"]) ? $context["imageUrl"] : $this->getContext($context, "imageUrl")), "html", null, true);
        echo "\" width=\"";
        echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : $this->getContext($context, "width")), "html", null, true);
        echo "\" height=\"";
        echo twig_escape_filter($this->env, (isset($context["height"]) ? $context["height"] : $this->getContext($context, "height")), "html", null, true);
        echo "\" data-factor=\"";
        echo twig_escape_filter($this->env, (isset($context["factor"]) ? $context["factor"] : $this->getContext($context, "factor")), "html", null, true);
        echo "\">
    </div>
    <footer class=\"footer\">
        <ul class=\"right\">
            <li><input type=\"button\" class=\"btn cancel\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Cancel"), "html", null, true);
        echo "\"></li>
            <li><input type=\"submit\" class=\"btn submit\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\"></li>
        </ul>
    </footer>
</div>
";
    }

    public function getTemplateName()
    {
        return "_components/tools/cropper_modal";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  39 => 7,  26 => 3,  22 => 2,  19 => 1,);
    }
}
