<?php

/* _includes/permissions */
class __TwigTemplate_5b1b08f26613b0d0bb09e38adc7ae44d extends Twig_Template
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
        // line 30
        echo "
";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "userPermissions"), "getAllPermissions", array(), "method"));
        foreach ($context['_seq'] as $context["category"] => $context["catPermissions"]) {
            // line 32
            echo "\t<h3>";
            echo twig_escape_filter($this->env, (isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "html", null, true);
            echo "</h3>

\t";
            // line 34
            echo $this->getAttribute($this, "permissionList", array(0 => $context, 1 => (isset($context["catPermissions"]) ? $context["catPermissions"] : $this->getContext($context, "catPermissions"))), "method");
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['category'], $context['catPermissions'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    // line 1
    public function getpermissionList($_context = null, $_permissions = null, $_id = null, $_hidden = null)
    {
        $context = $this->env->mergeGlobals(array(
            "context" => $_context,
            "permissions" => $_permissions,
            "id" => $_id,
            "hidden" => $_hidden,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "\t";
            $context["__internal_151c3ae98e0440eed29a44c7d47080559ece40fa"] = $this->env->loadTemplate("_includes/forms");
            // line 3
            echo "\t<ul";
            if ((isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"))) {
                echo " id=\"";
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "\"";
            }
            echo " class=\"indent";
            if ((isset($context["hidden"]) ? $context["hidden"] : $this->getContext($context, "hidden"))) {
                echo " hidden";
            }
            echo "\">
\t\t";
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["permissions"]) ? $context["permissions"] : $this->getContext($context, "permissions")));
            foreach ($context['_seq'] as $context["permissionName"] => $context["props"]) {
                // line 5
                echo "\t\t\t";
                $context["isInGroupPermissions"] = ($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "groupPermissions", array(), "any", true, true) && twig_in_filter(twig_lower_filter($this->env, (isset($context["permissionName"]) ? $context["permissionName"] : $this->getContext($context, "permissionName"))), $this->getAttribute((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")), "groupPermissions")));
                // line 6
                echo "\t\t\t";
                $context["checked"] = (((isset($context["isInGroupPermissions"]) ? $context["isInGroupPermissions"] : $this->getContext($context, "isInGroupPermissions"))) ? (true) : ((((!twig_test_empty($this->getAttribute((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")), "userOrGroup")))) ? ((($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")), "userOrGroup"), "hasErrors")) ? (twig_in_filter((isset($context["permissionName"]) ? $context["permissionName"] : $this->getContext($context, "permissionName")), $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "getPost", array(0 => "permissions", 1 => array()), "method"))) : ($this->getAttribute($this->getAttribute((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")), "userOrGroup"), "can", array(0 => (isset($context["permissionName"]) ? $context["permissionName"] : $this->getContext($context, "permissionName"))), "method")))) : (false))));
                // line 13
                echo "\t\t\t";
                $context["hasNestedPermissions"] = ($this->getAttribute((isset($context["props"]) ? $context["props"] : null), "nested", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["props"]) ? $context["props"] : $this->getContext($context, "props")), "nested"))));
                // line 14
                echo "\t\t\t<li>
\t\t\t\t";
                // line 15
                echo $context["__internal_151c3ae98e0440eed29a44c7d47080559ece40fa"]->getcheckbox(array("label" => $this->getAttribute((isset($context["props"]) ? $context["props"] : $this->getContext($context, "props")), "label"), "name" => "permissions[]", "value" => (isset($context["permissionName"]) ? $context["permissionName"] : $this->getContext($context, "permissionName")), "checked" => (isset($context["checked"]) ? $context["checked"] : $this->getContext($context, "checked")), "disabled" => (isset($context["isInGroupPermissions"]) ? $context["isInGroupPermissions"] : $this->getContext($context, "isInGroupPermissions")), "toggle" => (((isset($context["hasNestedPermissions"]) ? $context["hasNestedPermissions"] : $this->getContext($context, "hasNestedPermissions"))) ? (((isset($context["permissionName"]) ? $context["permissionName"] : $this->getContext($context, "permissionName")) . "-nested")) : (null))));
                // line 22
                echo "
\t\t\t\t";
                // line 23
                if ((isset($context["hasNestedPermissions"]) ? $context["hasNestedPermissions"] : $this->getContext($context, "hasNestedPermissions"))) {
                    // line 24
                    echo "\t\t\t\t\t";
                    echo $this->getAttribute($this, "permissionList", array(0 => (isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")), 1 => $this->getAttribute((isset($context["props"]) ? $context["props"] : $this->getContext($context, "props")), "nested"), 2 => ((isset($context["permissionName"]) ? $context["permissionName"] : $this->getContext($context, "permissionName")) . "-nested"), 3 => (!(isset($context["checked"]) ? $context["checked"] : $this->getContext($context, "checked")))), "method");
                    echo "
\t\t\t\t";
                }
                // line 26
                echo "\t\t\t</li>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['permissionName'], $context['props'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 28
            echo "\t</ul>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "_includes/permissions";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 28,  93 => 23,  90 => 22,  88 => 15,  85 => 14,  82 => 13,  79 => 6,  76 => 5,  72 => 4,  59 => 3,  42 => 1,  22 => 31,  19 => 30,  336 => 150,  331 => 148,  328 => 147,  322 => 145,  320 => 144,  316 => 142,  314 => 141,  309 => 138,  299 => 135,  295 => 134,  284 => 130,  280 => 129,  269 => 125,  265 => 124,  254 => 120,  250 => 119,  247 => 118,  245 => 117,  240 => 115,  236 => 114,  233 => 113,  227 => 110,  223 => 109,  220 => 108,  218 => 107,  214 => 105,  208 => 103,  203 => 101,  198 => 100,  193 => 98,  188 => 97,  183 => 95,  179 => 94,  174 => 93,  172 => 92,  167 => 90,  157 => 83,  147 => 76,  142 => 73,  140 => 69,  134 => 68,  129 => 65,  127 => 59,  121 => 56,  116 => 54,  105 => 46,  101 => 26,  95 => 24,  91 => 40,  83 => 37,  81 => 32,  78 => 31,  74 => 30,  71 => 29,  69 => 28,  66 => 27,  63 => 26,  61 => 25,  56 => 2,  51 => 21,  47 => 19,  45 => 18,  40 => 14,  37 => 12,  34 => 10,  32 => 34,  30 => 8,  28 => 5,  26 => 32,  24 => 1,);
    }
}
