<?php

/* login */
class __TwigTemplate_0483a56c30327a41802a21cdb44dbaa3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("_layouts/base");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "_layouts/base";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 3
        $context["title"] = \Blocks\Blocks::t("Login");
        // line 4
        \Blocks\blx()->templates->includeCssResource("css/login.css");
        // line 5
        \Blocks\blx()->templates->includeJsResource("js/login.js");
        // line 6
        \Blocks\blx()->templates->includeTranslations(
        	"Forget your password?",
        	"Reset Password",
        	"Check your email for instructions to reset your password."
        );
        // line 12
        ob_start();
        // line 13
        echo "    <script type=\"text/javascript\">
\t\tvar cookie = 'BlocksCookieTest='+Math.floor(Math.random() * 1000000);
\t\tdocument.cookie = cookie;
\t\tvar cookiesEnabled = document.cookie.search(cookie) != -1;
\t\tif (cookiesEnabled)
\t\t{
\t\t\tdocument.write(
\t\t\t\t'<form id=\"login-form\" method=\"post\" action=\"\" accept-charset=\"UTF-8\" ";
        // line 20
        if (($this->getAttribute($this->getContext($context, "blx"), "hasPackage", array(0 => "Rebrand"), "method") && $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "rebrand"), "isLogoUploaded"))) {
            // line 21
            $context["logo"] = $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "rebrand"), "logo");
            // line 22
            $context["padding"] = ($this->getAttribute($this->getContext($context, "logo"), "height") + 30);
            // line 23
            echo "\t\t\t\t\t\tstyle=\"background-image: url(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "logo"), "url"), "html", null, true);
            echo "); background-size: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "logo"), "width"), "html", null, true);
            echo "px ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "logo"), "height"), "html", null, true);
            echo "px; padding-top: ";
            echo twig_escape_filter($this->env, $this->getContext($context, "padding"), "html", null, true);
            echo "px; margin-top: -";
            echo twig_escape_filter($this->env, round(((156 + $this->getContext($context, "padding")) / 2)), "html", null, true);
            echo "px\"";
        }
        // line 24
        echo ">' +
\t\t\t\t\t'";
        // line 25
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $context["forms"]->gettextField(array("id" => "loginName", "hint" => \Blocks\Blocks::t("Username or Email"), "value" => $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "session"), "rememberedUsername"))), "js"), "html", null, true);
        echo "' +

\t\t\t\t\t'<div id=\"login-fields\" class=\"nested-fields\">' +
\t\t\t\t\t\t'";
        // line 28
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $context["forms"]->getpasswordField(array("id" => "password", "hint" => \Blocks\Blocks::t("Password"))), "js"), "html", null, true);
        echo "' +
\t\t\t\t\t\t";
        // line 29
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "config"), "rememberedUserSessionDuration")) {
            // line 30
            echo "\t\t\t\t\t\t\t'";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $context["forms"]->getcheckboxField(array("id" => "rememberMe", "label" => \Blocks\Blocks::t("Keep me logged in"))), "js"), "html", null, true);
            echo "' +
\t\t\t\t\t\t";
        }
        // line 32
        echo "\t\t\t\t\t'</div>' +

\t\t\t\t\t'<div class=\"buttons\">' +
\t\t\t\t\t\t'<div id=\"submit\" class=\"btn submit disabled ";
        // line 35
        if ((!$this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "request"), "isSecure"))) {
            echo "in";
        }
        echo "secure icon\">' +
\t\t\t\t\t\t\t'<span class=\"label\">";
        // line 36
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Login"), "html", null, true);
        echo "</span>' +
\t\t\t\t\t\t\t'<input type=\"submit\">' +
\t\t\t\t\t\t'</div>' +
\t\t\t\t\t\t'<div id=\"spinner\" class=\"spinner hidden\"></div>' +
\t\t\t\t\t'</div>' +
\t\t\t\t'</form>'
\t\t\t);

\t\t\tdocument.getElementById(\"";
        // line 44
        echo (($this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "session"), "rememberedUsername")) ? ("password") : ("loginName"));
        echo "\").focus();
\t\t\twindow.returnUrl = '";
        // line 45
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "session"), "returnUrl"), "js"), "html", null, true);
        echo "';
\t\t}
\t\telse
\t\t{
\t\t\tdocument.write(
\t\t\t\t'<div class=\"no-access\">' +
\t\t\t\t\t'<div class=\"pane\">' +
\t\t\t\t\t\t'<div class=\"pane-body\">' +
\t\t\t\t\t\t\t'<div class=\"notice\">' +
\t\t\t\t\t\t\t\t'<div class=\"icon\"></div>' +
\t\t\t\t\t\t\t\t'<p>";
        // line 55
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Cookies must be enabled to access the Blocks CP."), "html", null, true);
        echo "<br>' +
\t\t\t\t\t\t\t\t\t'<a class=\"go\" href=\"\">";
        // line 56
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("See how"), "html", null, true);
        echo "</a>' +
\t\t\t\t\t\t\t\t'</p>' +
\t\t\t\t\t\t\t'</div>' +
\t\t\t\t\t\t'</div>' +
\t\t\t\t\t'</div>' +
\t\t\t\t'</div>'
\t\t\t);
\t\t}
\t</script>
";
        $context["body"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "login";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 56,  128 => 55,  115 => 45,  111 => 44,  100 => 36,  94 => 35,  89 => 32,  83 => 30,  81 => 29,  77 => 28,  71 => 25,  68 => 24,  55 => 23,  53 => 22,  51 => 21,  49 => 20,  40 => 13,  38 => 12,  32 => 6,  30 => 5,  28 => 4,  26 => 3,  24 => 2,);
    }
}
