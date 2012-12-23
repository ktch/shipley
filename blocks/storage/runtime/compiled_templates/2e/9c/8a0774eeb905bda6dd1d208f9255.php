<?php

/* users */
class __TwigTemplate_2e9c8a0774eeb905bda6dd1d208f9255 extends Twig_Template
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
        // line 1
        \Blocks\blx()->user->requirePermission("editUsers");
        // line 4
        $context["title"] = \Blocks\Blocks::t("Users");
        // line 6
        $context["statuses"] = array("active" => "on", "pending" => "", "locked" => "pending", "suspended" => "off");
        // line 7
        $context["showStatus"] = true;
        // line 10
        if ((!array_key_exists("filter", $context))) {
            // line 11
            $context["filter"] = null;
            // line 12
            $context["params"] = array("status" => "*");
        } elseif (twig_in_filter((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")), twig_get_array_keys_filter((isset($context["statuses"]) ? $context["statuses"] : $this->getContext($context, "statuses"))))) {
            // line 14
            $context["params"] = array("status" => (isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")));
            // line 15
            $context["showStatus"] = false;
        } elseif (((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")) == "admins")) {
            // line 17
            $context["params"] = array("admin" => true);
        } elseif ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "userGroups"), "getGroupByHandle", array(0 => (isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter"))), "method")) {
            // line 19
            $context["params"] = array("group" => (isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")), "status" => "*");
        } else {
            // line 21
            throw new \Blocks\HttpException(404);
        }
        // line 25
        ob_start();
        // line 26
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 30
        ob_start();
        // line 31
        echo "\t<nav class=\"nav\">
\t\t";
        // line 32
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "can", array(0 => "registerUsers"), "method")) {
            // line 33
            echo "\t\t\t<div class=\"buttons\">
\t\t\t\t<a class=\"btn submit add icon\" href=\"";
            // line 34
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("users/new"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("New User"), "html", null, true);
            echo "</a>
\t\t\t</div>
\t\t";
        }
        // line 37
        echo "
\t\t<ul>
\t\t\t<li><a href=\"";
        // line 39
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("users"), "html", null, true);
        echo "\" ";
        if ((!(isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")))) {
            echo "class=\"sel\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("All Users"), "html", null, true);
        echo "</a></li>

\t\t\t";
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "userGroups"), "getAllGroups"));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 42
            echo "\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("users/" . $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "handle"))), "html", null, true);
            echo "\" ";
            if (((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")) == $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "handle"))) {
                echo "class=\"sel\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "name")), "html", null, true);
            echo "</a></li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 44
        echo "
\t\t\t";
        // line 45
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["statuses"]) ? $context["statuses"] : $this->getContext($context, "statuses")));
        foreach ($context['_seq'] as $context["status"] => $context["class"]) {
            // line 46
            echo "\t\t\t\t";
            $context["total"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "users"), "status", array(0 => (isset($context["status"]) ? $context["status"] : $this->getContext($context, "status"))), "method"), "total");
            // line 47
            echo "\t\t\t\t";
            if ((isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"))) {
                // line 48
                echo "\t\t\t\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("users/" . (isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")))), "html", null, true);
                echo "\" ";
                if (((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")) == (isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")))) {
                    echo "class=\"sel\"";
                }
                echo "><div class=\"status ";
                echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "html", null, true);
                echo "\"></div> ";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t(ucfirst((isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")))), "html", null, true);
                echo "</a></li>
\t\t\t\t";
            }
            // line 50
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['status'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 51
        echo "
\t\t\t<li><a href=\"";
        // line 52
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("users/admins"), "html", null, true);
        echo "\" ";
        if (((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")) == "admins")) {
            echo "class=\"sel\"";
        }
        echo " data-icon=\"☻\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Admins"), "html", null, true);
        echo "</a></li>
\t\t</ul>
\t</nav>

\t<div>
\t\t<div class=\"toolbar\">
\t\t\t<div class=\"search\"><input type=\"text\" class=\"text nicetext fullwidth\" data-hint=\"";
        // line 58
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Search users"), "html", null, true);
        echo "\"></div>
\t\t</div>

\t\t";
        // line 61
        list($context['paginate'], $context["accounts"]) = \Blocks\TemplateHelper::paginateCriteria($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "users", array(0 => (isset($context["params"]) ? $context["params"] : $this->getContext($context, "params"))), "method"), "limit", array(0 => 50), "method"));
        // line 62
        echo "
\t\t\t";
        // line 63
        $this->env->loadTemplate("_includes/paginatelinks")->display(array_merge($context, array("type" => \Blocks\Blocks::t("users"))));
        // line 64
        echo "
\t\t\t";
        // line 65
        $context["totalCols"] = (3 + (((isset($context["showStatus"]) ? $context["showStatus"] : $this->getContext($context, "showStatus"))) ? (1) : (0)));
        // line 66
        echo "\t\t\t";
        $context["colWidth"] = round((100 / (isset($context["totalCols"]) ? $context["totalCols"] : $this->getContext($context, "totalCols"))));
        // line 67
        echo "\t\t\t<table class=\"data\">
\t\t\t\t<thead>
\t\t\t\t\t<th scope=\"col\" width=\"";
        // line 69
        echo twig_escape_filter($this->env, (isset($context["colWidth"]) ? $context["colWidth"] : $this->getContext($context, "colWidth")), "html", null, true);
        echo "%\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Username"), "html", null, true);
        echo "</th>
\t\t\t\t\t<th scope=\"col\" width=\"";
        // line 70
        echo twig_escape_filter($this->env, (isset($context["colWidth"]) ? $context["colWidth"] : $this->getContext($context, "colWidth")), "html", null, true);
        echo "%\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Full Name"), "html", null, true);
        echo "</th>
\t\t\t\t\t<th scope=\"col\" width=\"";
        // line 71
        echo twig_escape_filter($this->env, (isset($context["colWidth"]) ? $context["colWidth"] : $this->getContext($context, "colWidth")), "html", null, true);
        echo "%\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Email"), "html", null, true);
        echo "</th>
\t\t\t\t\t";
        // line 72
        if ((isset($context["showStatus"]) ? $context["showStatus"] : $this->getContext($context, "showStatus"))) {
            echo "<th scope=\"col\" width=\"";
            echo twig_escape_filter($this->env, (isset($context["colWidth"]) ? $context["colWidth"] : $this->getContext($context, "colWidth")), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Status"), "html", null, true);
            echo "</th>";
        }
        // line 73
        echo "\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 75
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["accounts"]) ? $context["accounts"] : $this->getContext($context, "accounts")));
        foreach ($context['_seq'] as $context["_key"] => $context["account"]) {
            // line 76
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t";
            // line 77
            $context["accountUrl"] = \Blocks\UrlHelper::getUrl((($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "isCurrent")) ? ("myaccount") : (("users/" . $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id")))));
            // line 78
            echo "\t\t\t\t\t\t\t<th scope=\"row\"><a href=\"";
            echo twig_escape_filter($this->env, (isset($context["accountUrl"]) ? $context["accountUrl"] : $this->getContext($context, "accountUrl")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "username"), "html", null, true);
            echo "</a></th>
\t\t\t\t\t\t\t<td>";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "fullName"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>";
            // line 80
            if ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "email")) {
                echo "<a href=\"mailto:";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "email"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "email"), "html", null, true);
                echo "</a>";
            }
            echo "</td>
\t\t\t\t\t\t\t";
            // line 81
            if ((isset($context["showStatus"]) ? $context["showStatus"] : $this->getContext($context, "showStatus"))) {
                echo "<td><div class=\"status ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["statuses"]) ? $context["statuses"] : $this->getContext($context, "statuses")), $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "status"), array(), "array"), "html", null, true);
                echo "\"></div> ";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t(ucfirst($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "status"))), "html", null, true);
                echo "</td>";
            }
            // line 82
            echo "\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['account'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 84
        echo "\t\t\t\t</tbody>
\t\t\t</table>

\t\t";
        unset($context['paginate'], $context["accounts"]);
        // line 88
        echo "\t</div>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "users";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 88,  264 => 84,  257 => 82,  249 => 81,  239 => 80,  235 => 79,  228 => 78,  226 => 77,  223 => 76,  219 => 75,  215 => 73,  207 => 72,  201 => 71,  195 => 70,  189 => 69,  185 => 67,  182 => 66,  180 => 65,  177 => 64,  175 => 63,  172 => 62,  170 => 61,  164 => 58,  149 => 52,  146 => 51,  140 => 50,  126 => 48,  123 => 47,  120 => 46,  116 => 45,  113 => 44,  98 => 42,  94 => 41,  83 => 39,  79 => 37,  71 => 34,  68 => 33,  66 => 32,  63 => 31,  61 => 30,  55 => 26,  53 => 25,  50 => 21,  47 => 19,  44 => 17,  41 => 15,  39 => 14,  36 => 12,  34 => 11,  32 => 10,  30 => 7,  28 => 6,  26 => 4,  24 => 1,);
    }
}
