<?php

/* users/_edit/profile */
class __TwigTemplate_63b492620d116e19264150d0be6d78c8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("users/_edit/layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "users/_edit/layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 3
        $context["pageTitle"] = \Blocks\Blocks::t("Profile");
        // line 4
        \Blocks\blx()->templates->includeTranslations(
        	"Are you sure you want to delete this photo?"
        );
        // line 9
        if ((!array_key_exists("account", $context))) {
            // line 10
            if (($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "segment", array(0 => 1), "method") == "myaccount")) {
                // line 11
                $context["account"] = (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user"));
            } elseif ((isset($context["userId"]) ? $context["userId"] : $this->getContext($context, "userId"))) {
                // line 13
                $context["account"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "users"), "status", array(0 => "*"), "method"), "id", array(0 => (isset($context["userId"]) ? $context["userId"] : $this->getContext($context, "userId"))), "method"), "first");
            }
            // line 15
            if ((!(isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 19
        ob_start();
        // line 20
        echo "
\t";
        // line 21
        \Blocks\blx()->templates->includeJsResource("js/global/ui/QQUploader.js");
        // line 22
        echo "\t";
        \Blocks\blx()->templates->includeJsResource("lib/imgareaselect/jquery.imgareaselect.pack.js");
        // line 23
        echo "    ";
        \Blocks\blx()->templates->includeJsResource("js/global/ui/ImageUpload.js");
        // line 24
        echo "    ";
        \Blocks\blx()->templates->includeJsResource("js/profile.js");
        // line 25
        echo "    ";
        \Blocks\blx()->templates->includeCssResource("lib/imgareaselect/imgareaselect-animated.css");
        // line 26
        echo "    ";
        \Blocks\blx()->templates->includeCssResource("css/profile.css");
        // line 27
        echo "
\t";
        // line 28
        ob_start();
        // line 29
        echo "\t\t";
        $this->env->loadTemplate("users/_edit/_userphoto")->display(array("account" => (isset($context["account"]) ? $context["account"] : $this->getContext($context, "account"))));
        // line 30
        echo "\t";
        $context["photoInput"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 31
        echo "
\t";
        // line 32
        echo $context["forms"]->getfield(array("label" => \Blocks\Blocks::t("Photo")), (isset($context["photoInput"]) ? $context["photoInput"] : $this->getContext($context, "photoInput")));
        // line 34
        echo "

\t<hr>

\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"users/saveProfile\">
\t\t<input type=\"hidden\" name=\"userId\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo "\">

\t\t";
        // line 42
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("First Name"), "id" => "firstName", "name" => "firstName", "value" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "firstName"), "autofocus" => true, "errors" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "getErrors", array(0 => "firstName"), "method")));
        // line 49
        echo "

\t\t";
        // line 51
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Last Name"), "id" => "lastName", "name" => "lastName", "value" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "lastName"), "errors" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "getErrors", array(0 => "lastName"), "method")));
        // line 57
        echo "

\t\t";
        // line 59
        $this->env->loadTemplate("_includes/blockfields")->display(array("blocks" => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "userProfileBlocks"), "getAllBlocks"), "entity" => (isset($context["account"]) ? $context["account"] : $this->getContext($context, "account"))));
        // line 63
        echo "
\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">

\t</form>


";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "users/_edit/profile";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 64,  112 => 63,  110 => 59,  106 => 57,  104 => 51,  100 => 49,  98 => 42,  93 => 40,  85 => 34,  83 => 32,  80 => 31,  77 => 30,  74 => 29,  72 => 28,  69 => 27,  66 => 26,  63 => 25,  60 => 24,  57 => 23,  54 => 22,  52 => 21,  49 => 20,  47 => 19,  42 => 15,  39 => 13,  36 => 11,  34 => 10,  32 => 9,  28 => 4,  26 => 3,  24 => 2,);
    }
}
