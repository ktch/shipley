<?php

/* settings/plugins */
class __TwigTemplate_84a060f68c0bfba5128b95d0c4209603 extends Twig_Template
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
        $context["title"] = \Blocks\Blocks::t("Plugins");
        // line 5
        ob_start();
        // line 6
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
        echo "</a></li>
\t</ul>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 13
        $context["plugins"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "plugins"), "getPlugins", array(0 => false), "method");
        // line 16
        ob_start();
        // line 17
        echo "\t";
        if (twig_length_filter($this->env, (isset($context["plugins"]) ? $context["plugins"] : $this->getContext($context, "plugins")))) {
            // line 18
            echo "\t\t<table id=\"plugins\" class=\"data\">
\t\t\t<thead>
\t\t\t\t<th scope=\"col\">";
            // line 20
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Plugin"), "html", null, true);
            echo "</th>
\t\t\t\t<th scope=\"col\">";
            // line 21
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Developer"), "html", null, true);
            echo "</th>
\t\t\t\t<th scope=\"col\">";
            // line 22
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Status"), "html", null, true);
            echo "</th>
\t\t\t\t<td class=\"thin\"></td>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["plugins"]) ? $context["plugins"] : $this->getContext($context, "plugins")));
            foreach ($context['_seq'] as $context["_key"] => $context["plugin"]) {
                // line 27
                echo "\t\t\t\t\t<tr data-name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "name"), "html", null, true);
                echo "\">
\t\t\t\t\t\t<th>
\t\t\t\t\t\t\t";
                // line 29
                if (($this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "isEnabled") && $this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "settingsHtml"))) {
                    // line 30
                    echo "\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("settings/plugins/" . twig_lower_filter($this->env, $this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "classHandle")))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "name"), "html", null, true);
                    echo "</a>
\t\t\t\t\t\t\t";
                } else {
                    // line 32
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "name"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t";
                }
                // line 34
                echo "\t\t\t\t\t\t\t<span class=\"light\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "version"), "html", null, true);
                echo "</span>
\t\t\t\t\t\t</th>
\t\t\t\t\t\t<td><a";
                // line 36
                if ($this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "developerUrl")) {
                    echo " href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "developerUrl"), "html", null, true);
                    echo "\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "developer"), "html", null, true);
                echo "</a></td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<form action=\"\" method=\"post\" accept-charset=\"UTF-8\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"pluginClass\" value=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "classHandle"), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t";
                // line 40
                if ($this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "isEnabled")) {
                    // line 41
                    echo "\t\t\t\t\t\t\t\t\t<span class=\"status on\"></span> ";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Enabled"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"";
                    // line 42
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Disable"), "html", null, true);
                    echo "\" class=\"btn small formsubmit\" data-action=\"plugins/disablePlugin\">
\t\t\t\t\t\t\t\t";
                } elseif ($this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "isInstalled")) {
                    // line 44
                    echo "\t\t\t\t\t\t\t\t\t<span class=\"status off\"></span> ";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Disabled"), "html", null, true);
                    echo " 
\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"";
                    // line 45
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Enable"), "html", null, true);
                    echo "\" class=\"btn small formsubmit\" data-action=\"plugins/enablePlugin\">
\t\t\t\t\t\t\t\t";
                } else {
                    // line 47
                    echo "\t\t\t\t\t\t\t\t\t<span class=\"status\"></span> <span class=\"light\">";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Not installed"), "html", null, true);
                    echo "</span>
\t\t\t\t\t\t\t\t";
                }
                // line 49
                echo "\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"thin rightalign nowrap\">
\t\t\t\t\t\t\t<form action=\"\" method=\"post\" accept-charset=\"UTF-8\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"pluginClass\" value=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "classHandle"), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t";
                // line 54
                if ($this->getAttribute((isset($context["plugin"]) ? $context["plugin"] : $this->getContext($context, "plugin")), "isInstalled")) {
                    // line 55
                    echo "\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Uninstall"), "html", null, true);
                    echo "\" class=\"btn small formsubmit\" data-action=\"plugins/uninstallPlugin\">
\t\t\t\t\t\t\t\t";
                } else {
                    // line 57
                    echo "\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Install"), "html", null, true);
                    echo "\" class=\"btn small formsubmit\" data-action=\"plugins/installPlugin\">
\t\t\t\t\t\t\t\t";
                }
                // line 59
                echo "\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['plugin'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 63
            echo "\t\t\t</tbody>
\t\t</table>
\t";
        } else {
            // line 66
            echo "\t\t<p>";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("There are no available plugins."), "html", null, true);
            echo "
\t";
        }
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/plugins";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 66,  177 => 63,  168 => 59,  162 => 57,  156 => 55,  154 => 54,  150 => 53,  144 => 49,  138 => 47,  133 => 45,  128 => 44,  123 => 42,  118 => 41,  116 => 40,  112 => 39,  100 => 36,  94 => 34,  88 => 32,  80 => 30,  78 => 29,  72 => 27,  68 => 26,  61 => 22,  57 => 21,  53 => 20,  49 => 18,  46 => 17,  44 => 16,  42 => 13,  34 => 8,  28 => 6,  26 => 5,  24 => 2,);
    }
}
