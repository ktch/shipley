<?php

/* _includes/forms */
class __TwigTemplate_a30040d7a4ab57916f96a8261fa65471 extends Twig_Template
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
        // line 10
        echo "

";
        // line 13
        echo "

";
        // line 22
        echo "

";
        // line 39
        echo "

";
        // line 44
        echo "

";
        // line 57
        echo "

";
        // line 68
        echo "

";
        // line 87
        echo "

";
        // line 102
        echo "

";
        // line 120
        echo "

";
        // line 137
        echo "

";
        // line 164
        echo "

";
        // line 179
        echo "

";
        // line 196
        echo "

";
        // line 206
        echo "

";
        // line 219
        echo "

";
        // line 222
        echo "

";
        // line 249
        echo "

";
        // line 254
        echo "

";
        // line 259
        echo "

";
        // line 264
        echo "

";
        // line 269
        echo "

";
        // line 274
        echo "

";
        // line 279
        echo "

";
        // line 287
        echo "

";
        // line 292
        echo "

";
        // line 297
        echo "

";
    }

    // line 1
    public function geterrorList($_errors = null)
    {
        $context = $this->env->mergeGlobals(array(
            "errors" => $_errors,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "\t";
            if ((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) {
                // line 3
                echo "\t\t<ul class=\"errors\">
\t\t\t";
                // line 4
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 5
                    echo "\t\t\t\t<li>";
                    echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                    echo "</li>
\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 7
                echo "\t\t</ul>
\t";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 15
    public function gettextClass($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            echo twig_escape_filter($this->env, twig_join_filter(array_filter(array(0 => "text", 1 => (($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "class")) ? ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "class")) : (null)), 2 => (($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "hint")) ? ("nicetext") : (null)), 3 => ((($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "type") == "password")) ? ("password") : (null)), 4 => ((($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "size", array(), "any", true, true) && $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "size"))) ? (null) : ("fullwidth")))), " "), "html", null, true);
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 24
    public function gettext($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 25
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "class" => null, "type" => "text", "size" => null, "maxlength" => null, "name" => null, "value" => null, "autofocus" => false, "required" => false, "disabled" => false, "hint" => null, "errors" => null), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 26
            echo "\t";
            $context["class"] = $this->getAttribute($this, "textClass", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method");
            // line 27
            echo "\t";
            if (($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "type") == "password")) {
                echo "<div class=\"passwordwrapper\">";
            }
            // line 28
            echo "<input class=\"";
            echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "html", null, true);
            echo "\" type=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "type"), "html", null, true);
            echo "\"";
            // line 29
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) {
                echo " id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
                echo "\"";
            }
            // line 30
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "size")) {
                echo " size=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "size"), "html", null, true);
                echo "\"";
            }
            // line 31
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name")) {
                echo " name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name"), "html", null, true);
                echo "\"";
            }
            // line 32
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "value")) {
                echo " value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "value"), "html", null, true);
                echo "\"";
            }
            // line 33
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "maxlength")) {
                echo " maxlength=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "maxlength"), "html", null, true);
                echo "\"";
            }
            // line 34
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "autofocus")) {
                echo " autofocus";
            }
            // line 35
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "disabled")) {
                echo " disabled ";
            }
            // line 36
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "hint")) {
                echo " data-hint=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "hint"), "html", null, true);
                echo "\"";
            }
            echo ">";
            // line 37
            if (($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "type") == "password")) {
                echo "</div>";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 41
    public function getpassword($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 42
            echo "\t";
            echo $this->getAttribute($this, "text", array(0 => twig_array_merge((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), array("type" => "password"))), "method");
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 46
    public function getdate($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 47
            echo "\t<div class=\"datewrapper\">";
            echo $this->getAttribute($this, "text", array(0 => twig_array_merge((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), array("size" => 10))), "method");
            echo "</div>
\t";
            // line 48
            ob_start();
            // line 49
            echo "\t\t\$('#";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
            echo "').datepicker({
\t\t\tdateFormat: \$.datepicker.W3C,
\t\t\tprevText: '";
            // line 51
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, \Blocks\Blocks::t("Prev"), "js"), "html", null, true);
            echo "',
\t\t\tnextText: '";
            // line 52
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, \Blocks\Blocks::t("Next"), "js"), "html", null, true);
            echo "'
\t\t});
\t";
            $context["js"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 55
            echo "\t";
            \Blocks\blx()->templates->includeJs((isset($context["js"]) ? $context["js"] : $this->getContext($context, "js")));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 59
    public function gettextarea($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 60
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "class" => null, "type" => "text", "rows" => 2, "cols" => 50, "name" => null, "value" => null, "autofocus" => false, "required" => false, "disabled" => false, "hint" => null, "errors" => null), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 61
            echo "\t";
            $context["class"] = $this->getAttribute($this, "textClass", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method");
            // line 62
            echo "\t<textarea class=\"";
            echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "html", null, true);
            echo "\" rows=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "rows"), "html", null, true);
            echo "\" cols=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "cols"), "html", null, true);
            echo "\" name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name"), "html", null, true);
            echo "\"";
            // line 63
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) {
                echo " id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
                echo "\"";
            }
            // line 64
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "autofocus")) {
                echo " autofocus";
            }
            // line 65
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "disabled")) {
                echo " disabled";
            }
            // line 66
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "hint")) {
                echo " data-hint=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "hint"), "html", null, true);
                echo "\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "value"), "html", null, true);
            echo "</textarea>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 70
    public function getselect($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 71
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "class" => null, "name" => null, "value" => null, "toggle" => false, "targetPrefix" => null, "autofocus" => false, "required" => false, "disabled" => false), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 72
            echo "\t";
            $context["class"] = twig_join_filter(array_filter(array(0 => "select", 1 => $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "class"))), " ");
            // line 73
            echo "\t<div class=\"";
            echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "html", null, true);
            echo "\">
\t\t<select";
            // line 75
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) {
                echo " id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
                echo "\"";
            }
            // line 76
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "toggle")) {
                echo " class=\"fieldtoggle\"";
            }
            // line 77
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name")) {
                echo " name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name"), "html", null, true);
                echo "\"";
            }
            // line 78
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "autofocus")) {
                echo " autofocus";
            }
            // line 79
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "disabled")) {
                echo " disabled";
            }
            // line 80
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "targetPrefix")) {
                echo " data-target-prefix=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "targetPrefix"), "html", null, true);
                echo "\"";
            }
            echo ">
\t\t\t";
            // line 81
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "options"));
            foreach ($context['_seq'] as $context["value"] => $context["label"]) {
                // line 82
                echo "\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
                echo "\"";
                if (((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")) == $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "value"))) {
                    echo " selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), "html", null, true);
                echo "</option>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['value'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 84
            echo "\t\t</select>
\t</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 89
    public function getmultiselect($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 90
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "name" => null, "size" => null, "options" => array(), "values" => array(), "autofocus" => false, "required" => false, "disabled" => false), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 91
            echo "\t<select multiple";
            // line 92
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) {
                echo " id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
                echo "\"";
            }
            // line 93
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name")) {
                echo " name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name"), "html", null, true);
                echo "[]\"";
            }
            // line 94
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "autofocus")) {
                echo " autofocus";
            }
            // line 95
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "disabled")) {
                echo " disabled";
            }
            // line 96
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "size")) {
                echo " size=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "size"), "html", null, true);
                echo "\"";
            }
            echo ">
\t\t";
            // line 97
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "options"));
            foreach ($context['_seq'] as $context["value"] => $context["label"]) {
                // line 98
                echo "\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
                echo "\"";
                if (twig_in_filter((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "values"))) {
                    echo " selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), "html", null, true);
                echo "</option>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['value'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 100
            echo "\t</select>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 104
    public function getcheckbox($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 105
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "class" => null, "name" => null, "value" => "1", "checked" => false, "toggle" => null, "reverseToggle" => false, "autofocus" => false, "disabled" => false, "label" => null), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 106
            echo "\t";
            $context["class"] = twig_join_filter(array_filter(array(0 => $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "class"), 1 => (($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "toggle")) ? ("fieldtoggle") : (null)))), " ");
            // line 107
            echo "\t<label>
\t\t<input type=\"checkbox\" value=\"";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "value"), "html", null, true);
            echo "\"";
            // line 109
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) {
                echo " id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
                echo "\"";
            }
            // line 110
            if ((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class"))) {
                echo " class=\"";
                echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "html", null, true);
                echo "\"";
            }
            // line 111
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name")) {
                echo " name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name"), "html", null, true);
                echo "\"";
            }
            // line 112
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "checked")) {
                echo " checked";
            }
            // line 113
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "autofocus")) {
                echo " autofocus";
            }
            // line 114
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "disabled")) {
                echo " disabled";
            }
            // line 115
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "toggle")) {
                echo " data-target=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "toggle"), "html", null, true);
                echo "\"";
            }
            // line 116
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "reverseToggle")) {
                echo " data-reverse-toggle=\"y\"";
            }
            echo ">
\t\t";
            // line 117
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "label");
            echo "
\t</label>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 122
    public function getcheckboxGroup($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 123
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "name" => null, "options" => array(), "values" => array(), "autofocus" => false), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 124
            echo "\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "options"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["value"] => $context["label"]) {
                // line 125
                echo "\t\t<div>
\t\t\t";
                // line 126
                echo $this->getAttribute($this, "checkbox", array(0 => array("label" => (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), "id" => (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) ? ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) : (null)), "name" => ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name") . "[]"), "value" => (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "checked" => twig_in_filter((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "values")), "autofocus" => ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "autofocus") && $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")))), "method");
                // line 133
                echo "
\t\t</div>
\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['value'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 139
    public function getcheckboxSelect($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 140
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "allLabel" => \Blocks\Blocks::t("All"), "name" => null, "options" => array(), "values" => array(), "autofocus" => false, "class" => ""), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 141
            echo "\t<div class=\"checkbox-select ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "class"), "html", null, true);
            echo "\">
\t\t<div>
\t\t\t";
            // line 143
            echo $this->getAttribute($this, "checkbox", array(0 => array("id" => $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "class" => "all", "label" => (("<b>" . $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "allLabel")) . "</b>"), "checked" => twig_test_empty($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "values")), "autofocus" => $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "autofocus"))), "method");
            // line 149
            echo "
\t\t</div>
\t\t";
            // line 151
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "options"));
            foreach ($context['_seq'] as $context["value"] => $context["label"]) {
                // line 152
                echo "\t\t\t<div>
\t\t\t\t";
                // line 153
                echo $this->getAttribute($this, "checkbox", array(0 => array("label" => (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), "name" => ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name") . "[]"), "value" => (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "checked" => (twig_in_filter((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "values")) || twig_test_empty($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "values"))), "disabled" => twig_test_empty($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "values")))), "method");
                // line 159
                echo "
\t\t\t</div>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['value'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 162
            echo "\t</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 166
    public function getradio($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 167
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "class" => null, "name" => null, "value" => "1", "checked" => false, "autofocus" => false, "disabled" => false, "label" => null), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 168
            echo "\t<label>
\t\t<input type=\"radio\" value=\"";
            // line 169
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "value"), "html", null, true);
            echo "\"";
            // line 170
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) {
                echo " id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
                echo "\"";
            }
            // line 171
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "class")) {
                echo " class=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "class"), "html", null, true);
                echo "\"";
            }
            // line 172
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name")) {
                echo " name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name"), "html", null, true);
                echo "\"";
            }
            // line 173
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "checked")) {
                echo " checked";
            }
            // line 174
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "autofocus")) {
                echo " autofocus";
            }
            // line 175
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "disabled")) {
                echo " disabled";
            }
            echo ">
\t\t";
            // line 176
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "label");
            echo "
\t</label>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 181
    public function getradioGroup($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 182
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "name" => null, "options" => array(), "value" => null, "autofocus" => false), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 183
            echo "\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "options"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["value"] => $context["label"]) {
                // line 184
                echo "\t\t<div>
\t\t\t";
                // line 185
                echo $this->getAttribute($this, "radio", array(0 => array("label" => (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), "id" => (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) ? ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) : (null)), "name" => $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name"), "value" => (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "checked" => ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")) == $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "value")), "autofocus" => ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "autofocus") && $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")))), "method");
                // line 192
                echo "
\t\t</div>
\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['value'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 198
    public function getfile($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 199
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "name" => null, "autofocus" => false, "required" => false, "disabled" => false), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 200
            echo "\t<input type=\"file\"";
            // line 201
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) {
                echo " id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
                echo "\"";
            }
            // line 202
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name")) {
                echo " name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name"), "html", null, true);
                echo "\"";
            }
            // line 203
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "autofocus")) {
                echo " autofocus";
            }
            // line 204
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "disabled")) {
                echo " disabled";
            }
            echo ">
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 208
    public function getlightswitch($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 209
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "name" => null, "on" => false, "onLabel" => \Blocks\Blocks::t("Yes"), "offLabel" => \Blocks\Blocks::t("No"), "toggle" => null), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 210
            echo "\t<div class=\"lightswitch";
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "on")) {
                echo " on";
            }
            echo "\"";
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "toggle")) {
                echo " data-target=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "toggle"), "html", null, true);
                echo "\"";
            }
            echo " tabindex=\"0\">
\t\t<div class=\"container\">
\t\t\t<div class=\"label on\">";
            // line 212
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "onLabel"), "html", null, true);
            echo "</div>
\t\t\t<div class=\"handle\"></div>
\t\t\t<div class=\"label off\">";
            // line 214
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "offLabel"), "html", null, true);
            echo "</div>
\t\t</div>
\t\t<input type=\"hidden\" name=\"";
            // line 216
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "name"), "html", null, true);
            echo "\" value=\"";
            echo (($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "on")) ? ("on") : (""));
            echo "\">
\t</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 224
    public function getfield($_config = null, $_input = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
            "input" => $_input,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 225
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null, "label" => null, "instructions" => null, "required" => false, "translatable" => false, "errors" => null), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 226
            echo "\t<div class=\"field\"";
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) {
                echo " id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
                echo "-field\"";
            }
            echo ">
\t\t";
            // line 227
            if (($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "label") || $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "instructions"))) {
                // line 228
                echo "\t\t\t<div class=\"heading\">
\t\t\t\t";
                // line 229
                if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "label")) {
                    // line 230
                    echo "\t\t\t\t\t<label";
                    if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "required")) {
                        echo " class=\"required\"";
                    }
                    if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) {
                        echo " for=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
                        echo "\"";
                    }
                    echo ">
\t\t\t\t\t\t";
                    // line 231
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "label");
                    echo "
\t\t\t\t\t\t";
                    // line 232
                    if ((($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Language"), "method") && $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "translatable")) && ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "language") != $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "app"), "language")))) {
                        // line 233
                        echo "\t\t\t\t\t\t\t";
                        $context["localeName"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "i18n"), "getLocaleName", array(0 => $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "app"), "language")), "method");
                        // line 234
                        echo "\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, \Blocks\Blocks::t("(in {language})", array("language" => (isset($context["localeName"]) ? $context["localeName"] : $this->getContext($context, "localeName")))), "html", null, true);
                        echo "
\t\t\t\t\t\t";
                    }
                    // line 236
                    echo "\t\t\t\t\t</label>
\t\t\t\t";
                }
                // line 238
                echo "\t\t\t\t";
                if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "instructions")) {
                    // line 239
                    echo "\t\t\t\t\t<p>";
                    echo $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "instructions");
                    echo "</p>
\t\t\t\t";
                }
                // line 241
                echo "\t\t\t</div>
\t\t";
            }
            // line 243
            echo "\t\t<div class=\"input";
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "errors")) {
                echo " errors";
            }
            echo "\">
\t\t\t";
            // line 244
            echo (isset($context["input"]) ? $context["input"] : $this->getContext($context, "input"));
            echo "
\t\t</div>
\t\t";
            // line 246
            echo $this->getAttribute($this, "errorList", array(0 => $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "errors")), "method");
            echo "
\t</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 251
    public function gettextField($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 252
            echo "\t";
            echo $this->getAttribute($this, "field", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), 1 => $this->getAttribute($this, "text", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method")), "method");
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 256
    public function getpasswordField($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 257
            echo "\t";
            echo $this->getAttribute($this, "field", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), 1 => $this->getAttribute($this, "password", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method")), "method");
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 261
    public function getdateField($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 262
            echo "\t";
            echo $this->getAttribute($this, "field", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), 1 => $this->getAttribute($this, "date", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method")), "method");
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 266
    public function gettextareaField($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 267
            echo "\t";
            echo $this->getAttribute($this, "field", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), 1 => $this->getAttribute($this, "textarea", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method")), "method");
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 271
    public function getselectField($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 272
            echo "\t";
            echo $this->getAttribute($this, "field", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), 1 => $this->getAttribute($this, "select", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method")), "method");
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 276
    public function getmultiselectField($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 277
            echo "\t";
            echo $this->getAttribute($this, "field", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), 1 => $this->getAttribute($this, "multiselect", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method")), "method");
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 281
    public function getcheckboxField($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 282
            echo "\t";
            $context["config"] = twig_array_merge(array("id" => null), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            // line 283
            echo "\t<div class=\"field checkbox\"";
            if ($this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id")) {
                echo " id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "id"), "html", null, true);
                echo "-field\"";
            }
            echo ">
\t\t";
            // line 284
            echo $this->getAttribute($this, "checkbox", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method");
            echo "
\t</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 289
    public function getcheckboxSelectField($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 290
            echo "\t";
            echo $this->getAttribute($this, "field", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), 1 => $this->getAttribute($this, "checkboxSelect", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method")), "method");
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 294
    public function getfileField($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 295
            echo "\t";
            echo $this->getAttribute($this, "field", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), 1 => $this->getAttribute($this, "file", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method")), "method");
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 299
    public function getlightswitchField($_config = null)
    {
        $context = $this->env->mergeGlobals(array(
            "config" => $_config,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 300
            echo "\t";
            echo $this->getAttribute($this, "field", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), 1 => $this->getAttribute($this, "lightswitch", array(0 => (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "method")), "method");
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "_includes/forms";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1345 => 300,  1334 => 299,  1320 => 295,  1309 => 294,  1295 => 290,  1284 => 289,  1270 => 284,  1261 => 283,  1258 => 282,  1247 => 281,  1233 => 277,  1222 => 276,  1208 => 272,  1197 => 271,  1183 => 267,  1172 => 266,  1158 => 262,  1147 => 261,  1133 => 257,  1122 => 256,  1108 => 252,  1097 => 251,  1083 => 246,  1078 => 244,  1071 => 243,  1067 => 241,  1061 => 239,  1058 => 238,  1054 => 236,  1048 => 234,  1045 => 233,  1043 => 232,  1039 => 231,  1027 => 230,  1025 => 229,  1022 => 228,  1020 => 227,  1011 => 226,  1008 => 225,  996 => 224,  980 => 216,  975 => 214,  970 => 212,  956 => 210,  953 => 209,  942 => 208,  927 => 204,  923 => 203,  917 => 202,  911 => 201,  909 => 200,  906 => 199,  895 => 198,  870 => 192,  868 => 185,  865 => 184,  847 => 183,  844 => 182,  833 => 181,  819 => 176,  813 => 175,  809 => 174,  805 => 173,  799 => 172,  793 => 171,  787 => 170,  784 => 169,  781 => 168,  778 => 167,  767 => 166,  755 => 162,  747 => 159,  745 => 153,  742 => 152,  738 => 151,  734 => 149,  732 => 143,  726 => 141,  723 => 140,  712 => 139,  687 => 133,  685 => 126,  682 => 125,  664 => 124,  661 => 123,  650 => 122,  636 => 117,  630 => 116,  624 => 115,  620 => 114,  616 => 113,  612 => 112,  606 => 111,  600 => 110,  594 => 109,  591 => 108,  588 => 107,  585 => 106,  582 => 105,  571 => 104,  559 => 100,  544 => 98,  540 => 97,  532 => 96,  528 => 95,  524 => 94,  518 => 93,  512 => 92,  510 => 91,  507 => 90,  496 => 89,  483 => 84,  468 => 82,  464 => 81,  456 => 80,  452 => 79,  448 => 78,  442 => 77,  438 => 76,  432 => 75,  427 => 73,  424 => 72,  421 => 71,  410 => 70,  391 => 66,  387 => 65,  383 => 64,  377 => 63,  367 => 62,  364 => 61,  361 => 60,  350 => 59,  338 => 55,  332 => 52,  328 => 51,  322 => 49,  320 => 48,  315 => 47,  304 => 46,  290 => 42,  279 => 41,  266 => 37,  259 => 36,  255 => 35,  251 => 34,  245 => 33,  239 => 32,  233 => 31,  227 => 30,  221 => 29,  215 => 28,  210 => 27,  207 => 26,  204 => 25,  193 => 24,  172 => 15,  159 => 7,  150 => 5,  146 => 4,  143 => 3,  140 => 2,  129 => 1,  123 => 297,  119 => 292,  115 => 287,  111 => 279,  107 => 274,  103 => 269,  99 => 264,  95 => 259,  91 => 254,  87 => 249,  83 => 222,  79 => 219,  75 => 206,  67 => 179,  63 => 164,  59 => 137,  51 => 102,  47 => 87,  39 => 57,  31 => 39,  57 => 20,  55 => 120,  36 => 9,  32 => 8,  34 => 4,  42 => 12,  33 => 7,  22 => 2,  139 => 68,  132 => 64,  128 => 63,  124 => 62,  120 => 61,  116 => 60,  112 => 59,  108 => 58,  104 => 57,  100 => 56,  96 => 55,  82 => 44,  71 => 196,  64 => 32,  56 => 31,  49 => 26,  29 => 6,  27 => 22,  25 => 4,  23 => 13,  21 => 2,  19 => 10,  46 => 13,  43 => 68,  40 => 10,  37 => 12,  35 => 44,  30 => 6,  28 => 3,  26 => 5,  24 => 2,);
    }
}
