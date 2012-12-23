<?php

/* settings/email */
class __TwigTemplate_29945ea082fac99e9f965bba4d4027a5 extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Rebrand"), "method")) ? ("settings/email/_layout") : ("_layouts/cp")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 3
        $context["title"] = \Blocks\Blocks::t("Email");
        // line 4
        $context["centered"] = true;
        // line 5
        \Blocks\blx()->templates->includeJsResource("js/email_settings.js");
        // line 6
        \Blocks\blx()->templates->includeTranslations(
        	"Email sent successfully! Check your inbox.",
        	"An unknown error occurred."
        );
        // line 12
        if ((!array_key_exists("settings", $context))) {
            // line 13
            $context["settings"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "systemSettings"), "email");
            // line 14
            $context["freshSettings"] = true;
        } else {
            // line 16
            $context["freshSettings"] = false;
        }
        // line 20
        if ((!$this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Rebrand"), "method"))) {
            // line 21
            ob_start();
            // line 22
            echo "\t\t<h1>";
            echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
            echo "</h1>

\t\t<ul class=\"left\">
\t\t\t<li><a href=\"";
            // line 25
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings"), "html", null, true);
            echo "\" class=\"backbtn\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
            echo "</a></li>
\t\t</ul>
\t";
            $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        }
        // line 31
        ob_start();
        // line 32
        echo "\t<form id=\"settings-form\" method=\"post\" action=\"\" class=\"centered\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"systemSettings/saveEmailSettings\">
\t\t<input type=\"hidden\" name=\"redirect\" value=\"settings\">

\t\t";
        // line 36
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("System Email Address"), "instructions" => \Blocks\Blocks::t("The email address Blocks will use when sending email."), "id" => "emailAddress", "name" => "emailAddress", "value" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "emailAddress", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "emailAddress")) : (null)), "autofocus" => true, "required" => true, "errors" => (((isset($context["freshSettings"]) ? $context["freshSettings"] : $this->getContext($context, "freshSettings"))) ? (null) : ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "emailAddress"), "method")))));
        // line 45
        echo "

\t\t";
        // line 47
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Sender Name"), "instructions" => \Blocks\Blocks::t("The “From” name Blocks will use when sending email."), "id" => "senderName", "name" => "senderName", "value" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "senderName", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "senderName")) : (null)), "required" => true, "errors" => (((isset($context["freshSettings"]) ? $context["freshSettings"] : $this->getContext($context, "freshSettings"))) ? (null) : ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "senderName"), "method")))));
        // line 55
        echo "

\t\t";
        // line 57
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Rebrand"), "method")) {
            // line 58
            echo "\t\t\t";
            echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("HTML Email Template"), "instructions" => \Blocks\Blocks::t("The template Blocks will use for users who prefer HTML email"), "id" => "template", "name" => "template", "value" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "template", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "template")) : (null)), "errors" => (((isset($context["freshSettings"]) ? $context["freshSettings"] : $this->getContext($context, "freshSettings"))) ? (null) : ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "template"), "method")))));
            // line 65
            echo "
\t\t";
        }
        // line 67
        echo "
\t\t<hr>

\t\t";
        // line 70
        echo $context["forms"]->getselectField(array("label" => \Blocks\Blocks::t("Protocol"), "instructions" => \Blocks\Blocks::t("The protocol Blocks will use to send email."), "id" => "protocol", "name" => "protocol", "options" => array("php" => \Blocks\Blocks::t("PHP Mail"), "sendmail" => \Blocks\Blocks::t("Sendmail"), "smtp" => \Blocks\Blocks::t("SMTP"), "pop" => \Blocks\Blocks::t("POP"), "gmail" => \Blocks\Blocks::t("Gmail")), "value" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "protocol", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "protocol")) : (null))));
        // line 77
        echo "

\t\t<div id=\"hidden-fields\" class=\"hidden\">
\t\t\t";
        // line 80
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Username"), "id" => "username", "name" => "username", "value" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "username", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "username")) : (null))));
        // line 85
        echo "

\t\t\t";
        // line 87
        echo $context["forms"]->getpasswordField(array("label" => \Blocks\Blocks::t("Password"), "id" => "password", "name" => "password", "value" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "password", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "password")) : (null)), "errors" => ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "protocol") != "Smtp")) ? ((((isset($context["freshSettings"]) ? $context["freshSettings"] : $this->getContext($context, "freshSettings"))) ? (null) : ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "password"), "method")))) : (null))));
        // line 93
        echo "

\t\t\t";
        // line 95
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Port"), "id" => "port", "name" => "port", "value" => ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "port", array(), "any", true, true) && $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "port"))) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "port")) : (25)), "size" => 4, "errors" => (((isset($context["freshSettings"]) ? $context["freshSettings"] : $this->getContext($context, "freshSettings"))) ? (null) : ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "port"), "method")))));
        // line 102
        echo "

\t\t\t";
        // line 104
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Host Name"), "id" => "host", "name" => "host", "value" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "host", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "host")) : (null)), "errors" => (((isset($context["freshSettings"]) ? $context["freshSettings"] : $this->getContext($context, "freshSettings"))) ? (null) : ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "host"), "method")))));
        // line 110
        echo "

\t\t\t";
        // line 112
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Timeout"), "id" => "timeout", "name" => "timeout", "value" => ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "timeout", array(), "any", true, true) && $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "timeout"))) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "timeout")) : (30)), "size" => 2, "errors" => (((isset($context["freshSettings"]) ? $context["freshSettings"] : $this->getContext($context, "freshSettings"))) ? (null) : ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "timeout"), "method")))));
        // line 119
        echo "

\t\t\t";
        // line 121
        echo $context["forms"]->getcheckboxField(array("label" => \Blocks\Blocks::t("Use SMTP Keep Alive"), "id" => "smtpKeepAlive", "name" => "smtpKeepAlive", "checked" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "smtpKeepAlive", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "smtpKeepAlive")) : (false))));
        // line 126
        echo "

\t\t\t";
        // line 128
        echo $context["forms"]->getcheckboxField(array("label" => \Blocks\Blocks::t("Use SMTP authentication"), "id" => "smtpAuth", "name" => "smtpAuth", "checked" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "smtpAuth", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "smtpAuth")) : (false)), "toggle" => "smtpAuthCredentials-field"));
        // line 134
        echo "

\t\t\t<div id=\"smtpAuthCredentials-field\" class=\"nested-fields";
        // line 136
        if (((!$this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "smtpAuth", array(), "any", true, true)) || (!$this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "smtpAuth")))) {
            echo " hidden";
        }
        echo "\">
\t\t\t\t";
        // line 137
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Username"), "id" => "smtp-username", "name" => "smtpUsername", "value" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "username", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "username")) : (null)), "errors" => ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "protocol") == "Smtp")) ? ((((isset($context["freshSettings"]) ? $context["freshSettings"] : $this->getContext($context, "freshSettings"))) ? (null) : ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "username"), "method")))) : (null))));
        // line 143
        echo "

\t\t\t\t";
        // line 145
        echo $context["forms"]->getpasswordField(array("label" => \Blocks\Blocks::t("Password"), "id" => "smtpPassword", "name" => "smtpPassword", "value" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "password", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "password")) : (null)), "errors" => ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "protocol") == "Smtp")) ? ((((isset($context["freshSettings"]) ? $context["freshSettings"] : $this->getContext($context, "freshSettings"))) ? (null) : ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "getErrors", array(0 => "password"), "method")))) : (null))));
        // line 151
        echo "
\t\t\t</div>

\t\t\t";
        // line 154
        echo $context["forms"]->getselectField(array("label" => "SMTP Secure Transport Type", "id" => "smtpSecureTransportType", "name" => "smtpSecureTransportType", "options" => array("none" => \Blocks\Blocks::t("None"), "ssl" => \Blocks\Blocks::t("SSL"), "tls" => \Blocks\Blocks::t("TLS")), "default" => "none", "value" => (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "smtpSecureTransportType", array(), "any", true, true)) ? ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "smtpSecureTransportType")) : (null))));
        // line 161
        echo "
\t\t</div>

\t\t<hr>

\t\t<div class=\"buttons\">
\t\t\t<input class=\"btn submit\" type=\"submit\" value=\"";
        // line 167
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">
\t\t\t<div id=\"test\" class=\"btn\">";
        // line 168
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Test"), "html", null, true);
        echo "</div>
\t\t\t<div id=\"test-spinner\" class=\"spinner hidden\"></div>
\t\t</div>
\t</form>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/email";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 168,  169 => 167,  161 => 161,  159 => 154,  154 => 151,  152 => 145,  148 => 143,  146 => 137,  140 => 136,  136 => 134,  134 => 128,  130 => 126,  128 => 121,  124 => 119,  122 => 112,  118 => 110,  116 => 104,  112 => 102,  110 => 95,  106 => 93,  104 => 87,  100 => 85,  98 => 80,  93 => 77,  91 => 70,  86 => 67,  82 => 65,  79 => 58,  77 => 57,  73 => 55,  71 => 47,  67 => 45,  65 => 36,  59 => 32,  57 => 31,  48 => 25,  41 => 22,  39 => 21,  37 => 20,  34 => 16,  31 => 14,  29 => 13,  27 => 12,  22 => 6,  20 => 5,  18 => 4,  16 => 3,  14 => 2,);
    }
}
