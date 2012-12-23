<?php

/* users/_edit/_userphoto */
class __TwigTemplate_8453621ab157f351b42ea97e6a8fd7b3 extends Twig_Template
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
        echo "<div class=\"user-photo\" data-user=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo "\">
    <div class=\"current-photo\" style=\"background-image: url(";
        // line 2
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "photo")) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "photoUrl")) : (\Blocks\UrlHelper::getResourceUrl("images/user.gif"))), "html", null, true);
        echo ");\"></div>
    <div class=\"user-photo-controls\">
        ";
        // line 4
        if ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "photo")) {
            // line 5
            echo "            <div class=\"btn upload-photo\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Change photo"), "html", null, true);
            echo "</div>
            <div class=\"btn delete-photo\">";
            // line 6
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Delete photo"), "html", null, true);
            echo "</div>
        ";
        } else {
            // line 8
            echo "            <div class=\"btn upload-photo\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Upload a photo"), "html", null, true);
            echo "</div>
        ";
        }
        // line 10
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "users/_edit/_userphoto";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 8,  31 => 5,  29 => 4,  19 => 1,  115 => 64,  112 => 63,  110 => 59,  106 => 57,  104 => 51,  100 => 49,  98 => 42,  93 => 40,  85 => 34,  83 => 32,  80 => 31,  77 => 30,  74 => 29,  72 => 28,  69 => 27,  66 => 26,  63 => 25,  60 => 24,  57 => 23,  54 => 22,  52 => 21,  49 => 20,  47 => 10,  42 => 15,  39 => 13,  36 => 6,  34 => 10,  32 => 9,  28 => 4,  26 => 3,  24 => 2,);
    }
}
