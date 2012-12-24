<?php

/* _layouts/cp */
class __TwigTemplate_d7859f77296fbeae00e3cd371f3ae1bb extends Twig_Template
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
        \Blocks\blx()->templates->includeCssResource("css/cp.css", true);
        // line 4
        ob_start();
        // line 5
        echo "\t";
        if (($this->getAttribute($this->getContext($context, "user"), "admin") && $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "config"), "devMode"))) {
            // line 6
            echo "\t\t<div id=\"devmode\" title=\"";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Blocks is running in Dev Mode."), "html", null, true);
            echo "\"></div>
\t";
        }
        // line 8
        echo "
\t<div id=\"sidebar\">
\t\t<div id=\"header\">
\t\t\t<h2 id=\"sitename\">";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, "siteName"), "html", null, true);
        echo "</h2>
\t\t\t<a id=\"account\" data-icon=\"☺\" class=\"menubtn\" title=\"";
        // line 12
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("My Account"), "html", null, true);
        echo "\"></a>
\t\t\t<div id=\"account-menu\" class=\"menu\">
\t\t\t\t";
        // line 14
        if ($this->getAttribute($this->getContext($context, "blx"), "hasPackage", array(0 => "Users"), "method")) {
            // line 15
            echo "\t\t\t\t\t<div class=\"userinfo\">
\t\t\t\t\t\t<img src=\"";
            // line 16
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "user"), "photo")) ? ($this->getAttribute($this->getContext($context, "user"), "photoUrl")) : (\Blocks\UrlHelper::getResourceUrl("images/user.gif"))), "html", null, true);
            echo "\" width=\"100\" height=\"100\">
\t\t\t\t\t\t";
            // line 17
            if ($this->getAttribute($this->getContext($context, "user"), "fullName")) {
                echo "<div class=\"fullname\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "fullName"), "html", null, true);
                echo "</div>";
            }
            // line 18
            echo "\t\t\t\t\t\t<div class=\"username\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "username"), "html", null, true);
            echo "</div>
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 21
        echo "\t\t\t\t<ul>
\t\t\t\t\t<li><a href=\"";
        // line 22
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("myaccount"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("My Account"), "html", null, true);
        echo "</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getContext($context, "logoutUrl"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Sign out"), "html", null, true);
        echo "</a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>

\t\t<nav class=\"nav\">
\t\t\t<ul>
\t\t\t\t";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "cp"), "nav"));
        foreach ($context['_seq'] as $context["handle"] => $context["item"]) {
            // line 31
            echo "\t\t\t\t\t<li>
\t\t\t\t\t\t<a id=\"nav-";
            // line 32
            echo twig_escape_filter($this->env, $this->getContext($context, "handle"), "html", null, true);
            echo "\" class=\"";
            if (($this->getAttribute($this->getContext($context, "item", true), "hasIcon", array(), "any", true, true) && $this->getAttribute($this->getContext($context, "item"), "hasIcon"))) {
                echo "hasicon";
            }
            echo " ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "request"), "segment", array(0 => 1), "method") == $this->getContext($context, "handle"))) {
                echo "sel";
            }
            echo "\" href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl($this->getContext($context, "handle")), "html", null, true);
            echo "\">";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "name"), "html", null, true);
            // line 34
            if (($this->getAttribute($this->getContext($context, "item", true), "badge", array(), "any", true, true) && $this->getAttribute($this->getContext($context, "item"), "badge"))) {
                // line 35
                echo "<span class=\"badge\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "badge"), "html", null, true);
                echo "</span>";
            }
            // line 37
            echo "</a>
\t\t\t\t\t</li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['handle'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 40
        echo "\t\t\t</ul>
\t\t</nav>

\t\t<div id=\"version\">
\t\t\tBlocks ";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "app"), "version"), "html", null, true);
        echo " build ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "app"), "build"), "html", null, true);
        echo "
\t\t</div>
\t</div>

\t<div id=\"notifications-wrapper\">
\t\t<div id=\"notifications\">
\t\t\t";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "session"), "flashes"));
        foreach ($context['_seq'] as $context["type"] => $context["message"]) {
            // line 51
            echo "\t\t\t\t<div class=\"notification ";
            echo twig_escape_filter($this->env, $this->getContext($context, "type"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "message"), "html", null, true);
            echo "</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 53
        echo "\t\t</div>
\t</div>

\t<div id=\"main\" class=\"main\">
\t\t";
        // line 57
        if ((array_key_exists("header", $context) && $this->getContext($context, "header"))) {
            // line 58
            echo "\t\t\t<header class=\"header\">
\t\t\t\t";
            // line 59
            echo twig_escape_filter($this->env, $this->getContext($context, "header"), "html", null, true);
            echo "
\t\t\t</header>
\t\t";
        }
        // line 62
        echo "
\t\t<div id=\"content\"";
        // line 63
        if ((array_key_exists("centered", $context) && $this->getContext($context, "centered"))) {
            echo " class=\"centered\"";
        }
        echo ">
\t\t\t";
        // line 64
        if ((array_key_exists("tabs", $context) && $this->getContext($context, "tabs"))) {
            // line 65
            echo "\t\t\t\t<nav id=\"tabs\">
\t\t\t\t\t<ul>
\t\t\t\t\t\t";
            // line 67
            echo twig_escape_filter($this->env, $this->getContext($context, "tabs"), "html", null, true);
            echo "
\t\t\t\t\t</ul>
\t\t\t\t</nav>
\t\t\t";
        }
        // line 71
        echo "
\t\t\t";
        // line 72
        echo twig_escape_filter($this->env, $this->getContext($context, "content"), "html", null, true);
        echo "
\t\t</div>
\t</div>
";
        $context["body"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "_layouts/cp";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 72,  202 => 71,  195 => 67,  191 => 65,  189 => 64,  183 => 63,  180 => 62,  174 => 59,  171 => 58,  169 => 57,  163 => 53,  152 => 51,  148 => 50,  137 => 44,  131 => 40,  123 => 37,  118 => 35,  116 => 34,  114 => 33,  101 => 32,  98 => 31,  94 => 30,  76 => 22,  73 => 21,  66 => 18,  60 => 17,  56 => 16,  53 => 15,  42 => 11,  37 => 8,  31 => 6,  88 => 28,  82 => 23,  75 => 23,  70 => 21,  61 => 20,  58 => 19,  55 => 18,  51 => 14,  48 => 16,  46 => 12,  38 => 10,  32 => 8,  30 => 7,  28 => 5,  26 => 4,  24 => 2,);
    }
}
