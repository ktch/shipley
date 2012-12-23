<?php

/* users/_edit/account */
class __TwigTemplate_4e5fa67061d9d391616f24f122cb8b26 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Users"), "method")) ? ("users/_edit/layout") : ("_layouts/cp")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["centered"] = true;
        // line 3
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 6
        if (((!array_key_exists("account", $context)) && ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "segment", array(0 => 1), "method") == "myaccount"))) {
            // line 7
            $context["account"] = (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user"));
        }
        // line 11
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Users"), "method")) {
            // line 12
            if (((!array_key_exists("account", $context)) && array_key_exists("userId", $context))) {
                // line 13
                $context["account"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "users"), "status", array(0 => "*"), "method"), "id", array(0 => (isset($context["userId"]) ? $context["userId"] : $this->getContext($context, "userId"))), "method"), "first");
                // line 14
                if ((!(isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")))) {
                    throw new \Blocks\HttpException(404);
                }
            }
            // line 17
            $context["pageTitle"] = \Blocks\Blocks::t("Account Settings");
        } else {
            // line 19
            ob_start();
            // line 20
            echo "\t\t<h1>";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("My Account"), "html", null, true);
            echo "</h1>
\t";
            $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        }
        // line 25
        $context["isNewAccount"] = ((!array_key_exists("account", $context)) || (!$this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id")));
        // line 28
        ob_start();
        // line 29
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"accounts/saveUser\">
\t\t";
        // line 31
        if ((isset($context["isNewAccount"]) ? $context["isNewAccount"] : $this->getContext($context, "isNewAccount"))) {
            // line 32
            echo "\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"users/{userId}\">
\t\t";
        } else {
            // line 34
            echo "\t\t\t<input type=\"hidden\" name=\"userId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
            echo "\">
\t\t";
        }
        // line 36
        echo "
\t\t";
        // line 37
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Username"), "id" => "username", "name" => "username", "value" => ((array_key_exists("account", $context)) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username")) : (null)), "autofocus" => true, "required" => true, "errors" => ((array_key_exists("account", $context)) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "getErrors", array(0 => "username"), "method")) : (null))));
        // line 45
        echo "

\t\t";
        // line 47
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Email"), "id" => "email", "name" => "email", "value" => ((array_key_exists("account", $context)) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "email")) : (null)), "required" => true, "errors" => ((array_key_exists("account", $context)) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "getErrors", array(0 => "email"), "method")) : (null))));
        // line 54
        echo "

\t\t";
        // line 56
        if (((isset($context["isNewAccount"]) ? $context["isNewAccount"] : $this->getContext($context, "isNewAccount")) && $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "admin"))) {
            // line 57
            echo "\t\t\t";
            echo $context["forms"]->getcheckboxField(array("label" => \Blocks\Blocks::t("Require verification"), "name" => "verificationRequired", "checked" => ((array_key_exists("account", $context)) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "verificationRequired")) : (true))));
            // line 61
            echo "
\t\t";
        }
        // line 63
        echo "
\t\t";
        // line 64
        if (((array_key_exists("account", $context) && $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "isCurrent")) || $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "admin"))) {
            // line 65
            echo "\t\t\t";
            echo $context["forms"]->getpasswordField(array("label" => \Blocks\Blocks::t("Password"), "instructions" => (((isset($context["isNewAccount"]) ? $context["isNewAccount"] : $this->getContext($context, "isNewAccount"))) ? (null) : (\Blocks\Blocks::t("Leave blank to keep password unchanged."))), "id" => "newPassword", "name" => "newPassword", "errors" => ((array_key_exists("account", $context)) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "getErrors", array(0 => "newPassword"), "method")) : (null))));
            // line 71
            echo "
\t\t";
        }
        // line 73
        echo "
\t\t";
        // line 74
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "admin")) {
            // line 75
            echo "\t\t\t";
            echo $context["forms"]->getcheckboxField(array("label" => \Blocks\Blocks::t("Require a password reset on next login"), "name" => "passwordResetRequired", "checked" => ((array_key_exists("account", $context)) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "passwordResetRequired")) : (true))));
            // line 79
            echo "
\t\t";
        }
        // line 81
        echo "
\t\t";
        // line 82
        echo $context["forms"]->getselectField(array("label" => \Blocks\Blocks::t("Email Format"), "id" => "emailFormat", "name" => "emailFormat", "options" => array("text" => \Blocks\Blocks::t("Plain Text"), "html" => \Blocks\Blocks::t("HTML")), "value" => ((array_key_exists("account", $context)) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "emailFormat")) : ("text"))));
        // line 88
        echo "

\t\t";
        // line 90
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Language"), "method")) {
            // line 91
            echo "\t\t\t";
            ob_start();
            // line 92
            echo "\t\t\t\t<div class=\"select\">
\t\t\t\t\t<select id=\"language\" name=\"language\">
\t\t\t\t\t\t";
            // line 94
            $context["userLanguage"] = ((array_key_exists("account", $context)) ? ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "language")) : ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "app"), "language")));
            // line 95
            echo "\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "i18n"), "getTranslatedLanguages"));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 96
                echo "\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, (isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")), "html", null, true);
                echo "\" ";
                if (((isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")) == (isset($context["userLanguage"]) ? $context["userLanguage"] : $this->getContext($context, "userLanguage")))) {
                    echo "selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "i18n"), "getLocaleName", array(0 => (isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")), 1 => (isset($context["language"]) ? $context["language"] : $this->getContext($context, "language"))), "method"), "html", null, true);
                echo "</option>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 98
            echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t";
            $context["languageInput"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 101
            echo "\t\t\t";
            echo $context["forms"]->getfield(array("label" => \Blocks\Blocks::t("Language"), "id" => "language"), (isset($context["languageInput"]) ? $context["languageInput"] : $this->getContext($context, "languageInput")));
            echo "
\t\t";
        }
        // line 103
        echo "
\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
        // line 104
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">

\t</form>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "users/_edit/account";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 104,  165 => 103,  159 => 101,  154 => 98,  139 => 96,  134 => 95,  132 => 94,  128 => 92,  125 => 91,  123 => 90,  119 => 88,  117 => 82,  114 => 81,  110 => 79,  107 => 75,  105 => 74,  102 => 73,  98 => 71,  95 => 65,  93 => 64,  90 => 63,  86 => 61,  83 => 57,  81 => 56,  77 => 54,  75 => 47,  71 => 45,  69 => 37,  66 => 36,  60 => 34,  56 => 32,  54 => 31,  50 => 29,  48 => 28,  46 => 25,  39 => 20,  37 => 19,  34 => 17,  29 => 14,  27 => 13,  25 => 12,  23 => 11,  20 => 7,  18 => 6,  16 => 3,  14 => 2,);
    }
}
