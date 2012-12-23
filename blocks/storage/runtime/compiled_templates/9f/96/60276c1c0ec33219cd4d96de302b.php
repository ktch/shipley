<?php

/* users/_edit/admin */
class __TwigTemplate_9f9660276c1c0ec33219cd4d96de302b extends Twig_Template
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
        // line 1
        \Blocks\blx()->user->requirePermission("administrateUsers");
        // line 4
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 5
        $context["pageTitle"] = \Blocks\Blocks::t("Administration");
        // line 8
        if ((!array_key_exists("account", $context))) {
            // line 9
            if (($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "segment", array(0 => 1), "method") == "myaccount")) {
                // line 10
                $context["account"] = (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user"));
            } elseif ((isset($context["userId"]) ? $context["userId"] : $this->getContext($context, "userId"))) {
                // line 12
                $context["account"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "users"), "status", array(0 => "*"), "method"), "id", array(0 => (isset($context["userId"]) ? $context["userId"] : $this->getContext($context, "userId"))), "method"), "first");
            }
            // line 14
            if ((!(isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 18
        ob_start();
        // line 19
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"users/saveUserGroups\">
\t\t<input type=\"hidden\" name=\"userId\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo "\">

\t\t<h2>";
        // line 23
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("User Groups"), "html", null, true);
        echo "</h2>

\t\t";
        // line 25
        $context["allGroups"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "userGroups"), "getAllGroups");
        // line 26
        echo "\t\t";
        $context["userGroups"] = $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "getGroups", array(0 => "id"), "method");
        // line 27
        echo "
\t\t";
        // line 28
        if ((isset($context["allGroups"]) ? $context["allGroups"] : $this->getContext($context, "allGroups"))) {
            // line 29
            echo "\t\t\t<ul>
\t\t\t\t";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["allGroups"]) ? $context["allGroups"] : $this->getContext($context, "allGroups")));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 31
                echo "\t\t\t\t\t<li>
\t\t\t\t\t\t";
                // line 32
                echo $context["forms"]->getcheckbox(array("label" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "name"), "name" => "groups[]", "value" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id"), "checked" => twig_in_filter($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id"), twig_get_array_keys_filter((isset($context["userGroups"]) ? $context["userGroups"] : $this->getContext($context, "userGroups"))))));
                // line 37
                echo "
\t\t\t\t\t</li>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 40
            echo "\t\t\t</ul>
\t\t";
        } else {
            // line 42
            echo "\t\t\t<p>";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("No user groups exist yet."), "html", null, true);
            echo "</p>
\t\t";
        }
        // line 44
        echo "
\t\t<div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn small submit\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">
\t\t</div>
\t</form>

\t<hr>

\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"action\" value=\"users/saveUserPermissions\">
\t\t<input type=\"hidden\" name=\"userId\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo "\">

\t\t<h2>";
        // line 56
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Permissions"), "html", null, true);
        echo "</h2>

\t\t<div class=\"field\">
\t\t\t";
        // line 59
        echo $context["forms"]->getcheckbox(array("label" => (("<strong>" . \Blocks\Blocks::t("Admin")) . "</strong>"), "name" => "admin", "checked" => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "admin"), "toggle" => "permissions", "reverseToggle" => true));
        // line 65
        echo "
\t\t</div>

\t\t<div id=\"permissions\" class=\"field";
        // line 68
        if ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "admin")) {
            echo " hidden";
        }
        echo "\">
\t\t\t";
        // line 69
        $this->env->loadTemplate("_includes/permissions")->display(array("userOrGroup" => (($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "admin")) ? (null) : ((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")))), "groupPermissions" => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "userPermissions"), "getGroupPermissionsByUserId", array(0 => $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id")), "method")));
        // line 73
        echo "\t\t</div>

\t\t<div class=\"buttons\">
\t\t\t<input type=\"submit\" class=\"btn small submit\" value=\"";
        // line 76
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
        echo "\">
\t\t</div>
\t</form>

\t<hr>

\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t<input type=\"hidden\" name=\"userId\" value=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "id"), "html", null, true);
        echo "\">

\t\t<h2>User Info</h2>

\t\t<table class=\"data\">
\t\t\t<tbody>
\t\t\t\t<tr>
\t\t\t\t\t<th class=\"nowrap\">";
        // line 90
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Account Status"), "html", null, true);
        echo "</th>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
        // line 92
        if (($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "status") == "pending")) {
            // line 93
            echo "\t\t\t\t\t\t\t<div class=\"status\"></div> ";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Unverified"), "html", null, true);
            echo " 
\t\t\t\t\t\t\t<input type=\"button\" class=\"btn small formsubmit\" value=\"";
            // line 94
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Resend Email"), "html", null, true);
            echo "\" data-action=\"users/sendVerificationEmail\">
\t\t\t\t\t\t\t<input type=\"button\" class=\"btn small formsubmit\" value=\"";
            // line 95
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Activate"), "html", null, true);
            echo "\" data-action=\"users/activateUser\">
\t\t\t\t\t\t";
        } elseif (($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "status") == "locked")) {
            // line 97
            echo "\t\t\t\t\t\t\t<div class=\"status pending\"></div> ";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Locked"), "html", null, true);
            echo " 
\t\t\t\t\t\t\t<input type=\"button\" class=\"btn small formsubmit\" value=\"";
            // line 98
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Unlock"), "html", null, true);
            echo "\" data-action=\"users/unlockUser\">
\t\t\t\t\t\t";
        } elseif (($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "status") == "suspended")) {
            // line 100
            echo "\t\t\t\t\t\t\t<div class=\"status off\"></div> ";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Suspended"), "html", null, true);
            echo " 
\t\t\t\t\t\t\t<input type=\"submit\" class=\"btn small formsubmit\" value=\"";
            // line 101
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Unsuspend"), "html", null, true);
            echo "\" data-action=\"users/unsuspendUser\">
\t\t\t\t\t\t";
        } else {
            // line 103
            echo "\t\t\t\t\t\t\t<div class=\"status on\"></div> ";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Active"), "html", null, true);
            echo "
\t\t\t\t\t\t";
        }
        // line 105
        echo "\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t";
        // line 107
        if ((($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "status") == "locked") && $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "config"), "cooldownDuration"))) {
            // line 108
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"nowrap\">";
            // line 109
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Cooldown Time Remaining"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t<td>";
            // line 110
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "remainingCooldownTime"), "humanDuration"), "html", null, true);
            echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        // line 113
        echo "\t\t\t\t<tr>
\t\t\t\t\t<th class=\"nowrap\">";
        // line 114
        echo "Registration Date";
        echo "</th>
\t\t\t\t\t<td>";
        // line 115
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "dateCreated"), "nice"), "html", null, true);
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t";
        // line 117
        if (($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "status") != "pending")) {
            // line 118
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"nowrap\">";
            // line 119
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Last Login Date"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t<td>";
            // line 120
            if ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "lastLoginDate")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "lastLoginDate"), "nice"), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Never"), "html", null, true);
            }
            echo "</td>
\t\t\t\t\t</tr>

\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"nowrap\">";
            // line 124
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Last Invalid Login Date"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t<td>";
            // line 125
            if ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "lastInvalidLoginDate")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "lastInvalidLoginDate"), "nice"), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Never"), "html", null, true);
            }
            echo "</td>
\t\t\t\t\t</tr>

\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"nowrap\">";
            // line 129
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Last Password Change Date"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t<td>";
            // line 130
            if ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "lastPasswordChangeDate")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "lastPasswordChangeDate"), "nice"), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Never"), "html", null, true);
            }
            echo "</td>
\t\t\t\t\t</tr>

\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"nowrap\">";
            // line 134
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Invalid Login Count"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t<td>";
            // line 135
            if ($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "invalidLoginCount")) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "invalidLoginCount"), "html", null, true);
            } else {
                echo "0";
            }
            echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        // line 138
        echo "\t\t\t</tbody>
\t\t</table>

\t\t";
        // line 141
        if ((!$this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "isCurrent"))) {
            // line 142
            echo "\t\t\t<hr>

\t\t\t";
            // line 144
            if (($this->getAttribute((isset($context["account"]) ? $context["account"] : $this->getContext($context, "account")), "status") != "suspended")) {
                // line 145
                echo "\t\t\t\t<input type=\"button\" class=\"btn small formsubmit\" value=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Suspend"), "html", null, true);
                echo "\" data-action=\"users/suspendUser\">
\t\t\t";
            }
            // line 147
            echo "
\t\t\t<input class=\"btn small\" type=\"submit\" name=\"delete\" value=\"";
            // line 148
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Archive"), "html", null, true);
            echo "\" data-action=\"users/archiveUser\">
\t\t";
        }
        // line 150
        echo "\t</form>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "users/_edit/admin";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  336 => 150,  331 => 148,  328 => 147,  322 => 145,  320 => 144,  316 => 142,  314 => 141,  309 => 138,  299 => 135,  295 => 134,  284 => 130,  280 => 129,  269 => 125,  265 => 124,  254 => 120,  250 => 119,  247 => 118,  245 => 117,  240 => 115,  236 => 114,  233 => 113,  227 => 110,  223 => 109,  220 => 108,  218 => 107,  214 => 105,  208 => 103,  203 => 101,  198 => 100,  193 => 98,  188 => 97,  183 => 95,  179 => 94,  174 => 93,  172 => 92,  167 => 90,  157 => 83,  147 => 76,  142 => 73,  140 => 69,  134 => 68,  129 => 65,  127 => 59,  121 => 56,  116 => 54,  105 => 46,  101 => 44,  95 => 42,  91 => 40,  83 => 37,  81 => 32,  78 => 31,  74 => 30,  71 => 29,  69 => 28,  66 => 27,  63 => 26,  61 => 25,  56 => 23,  51 => 21,  47 => 19,  45 => 18,  40 => 14,  37 => 12,  34 => 10,  32 => 9,  30 => 8,  28 => 5,  26 => 4,  24 => 1,);
    }
}
