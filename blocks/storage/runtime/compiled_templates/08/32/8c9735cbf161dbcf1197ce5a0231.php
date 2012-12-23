<?php

/* users/_edit/layout */
class __TwigTemplate_08328c9735cbf161dbcf1197ce5a0231 extends Twig_Template
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
        \Blocks\blx()->templates->includeCssResource("css/account.css");
        // line 6
        if ((array_key_exists("account", $context) && $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"))) {
            // line 7
            if ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "isCurrent")) {
                // line 8
                $context["heading"] = \Blocks\Blocks::t("My Account");
                // line 9
                $context["baseUrl"] = "myaccount";
            } else {
                // line 11
                \Blocks\blx()->user->requirePermission("editUsers");
                // line 13
                $context["name"] = (($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "fullName")) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "fullName")) : ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username")));
                // line 14
                $context["lastChar"] = twig_slice($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), (twig_length_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "fullName")) - 1));
                // line 15
                $context["heading"] = ((((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")) . (((twig_lower_filter($this->env, (isset($context["lastChar"]) ? $context["lastChar"] : $this->getContext($context, "lastChar"))) == "s")) ? ("’") : ("’s"))) . " ") . \Blocks\Blocks::t("Account"));
                // line 16
                $context["baseUrl"] = ("users/" . $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"));
            }
            // line 18
            $context["title"] = (((isset($context["heading"]) ? $context["heading"] : $this->getContext($context, "heading")) . " - ") . (isset($context["pageTitle"]) ? $context["pageTitle"] : $this->getContext($context, "pageTitle")));
        } else {
            // line 20
            \Blocks\blx()->user->requirePermission("registerUsers");
            // line 22
            $context["heading"] = \Blocks\Blocks::t("Register a new user");
            // line 23
            $context["title"] = (isset($context["heading"]) ? $context["heading"] : $this->getContext($context, "heading"));
        }
        // line 27
        ob_start();
        // line 28
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["heading"]) ? $context["heading"] : $this->getContext($context, "heading")), "html", null, true);
        echo "</h1>
\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 30
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("users"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Users"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 35
        if ((array_key_exists("account", $context) && $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"))) {
            // line 36
            ob_start();
            // line 37
            echo "\t\t<li><a class=\"settings icon";
            if (!twig_in_filter($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "lastSegment"), array(0 => "profile", 1 => "info", 2 => "admin"))) {
                echo " active";
            }
            echo "\" href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl((isset($context["baseUrl"]) ? $context["baseUrl"] : $this->getContext($context, "baseUrl"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Account"), "html", null, true);
            echo "</a></li>
\t\t<li><a href=\"";
            // line 38
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(((isset($context["baseUrl"]) ? $context["baseUrl"] : $this->getContext($context, "baseUrl")) . "/profile")), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "lastSegment") == "profile")) {
                echo "class=\"active\"";
            }
            echo " data-icon=\"p\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Profile"), "html", null, true);
            echo "</a></li>

\t\t";
            // line 40
            if ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "can", array(0 => "administrateUsers"), "method")) {
                // line 41
                echo "\t\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(((isset($context["baseUrl"]) ? $context["baseUrl"] : $this->getContext($context, "baseUrl")) . "/admin")), "html", null, true);
                echo "\" ";
                if (($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "lastSegment") == "admin")) {
                    echo "class=\"active\"";
                }
                echo " data-icon=\"☻\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Admin"), "html", null, true);
                echo "</a></li>
\t\t";
            }
            // line 43
            echo "\t";
            $context["tabs"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        }
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "users/_edit/layout";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 40,  89 => 38,  78 => 37,  76 => 36,  74 => 35,  58 => 27,  55 => 23,  53 => 22,  51 => 20,  45 => 16,  43 => 15,  41 => 14,  32 => 8,  30 => 7,  28 => 6,  26 => 3,  24 => 2,  168 => 104,  165 => 103,  159 => 101,  154 => 98,  139 => 96,  134 => 95,  132 => 94,  128 => 92,  125 => 91,  123 => 90,  119 => 88,  117 => 82,  114 => 43,  110 => 79,  107 => 75,  105 => 74,  102 => 41,  98 => 71,  95 => 65,  93 => 64,  90 => 63,  86 => 61,  83 => 57,  81 => 56,  77 => 54,  75 => 47,  71 => 45,  69 => 37,  66 => 30,  60 => 28,  56 => 32,  54 => 31,  50 => 29,  48 => 18,  46 => 25,  39 => 13,  37 => 11,  34 => 9,  29 => 14,  27 => 13,  25 => 12,  23 => 11,  20 => 7,  18 => 6,  16 => 3,  14 => 2,);
    }
}
