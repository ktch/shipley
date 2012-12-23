<?php

/* _components/widgets/QuickPost/settings */
class __TwigTemplate_f3d82552e79a9862be73f8ca4b78a92a extends Twig_Template
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
        // line 1
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 2
        echo "

";
        // line 23
        echo "

";
        // line 25
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
            // line 26
            echo "
\t";
            // line 27
            $context["sections"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "sections"), "indexBy", array(0 => "id"), "method"), "find");
            // line 28
            echo "
\t";
            // line 29
            echo $context["forms"]->getselectField(array("label" => \Blocks\Blocks::t("Section"), "instructions" => \Blocks\Blocks::t("Which section do you want to publish entries to?"), "id" => "section", "name" => "section", "options" => (isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")), "value" => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "section"), "toggle" => true, "targetPrefix" => "section"));
            // line 38
            echo "

\t";
            // line 40
            ob_start();
            // line 41
            echo "\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
                // line 42
                echo "\t\t\t";
                $context["show"] = (((!$this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "section")) && $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) || ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "section") == $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")));
                // line 43
                echo "\t\t\t<div id=\"section";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"), "html", null, true);
                echo "\"";
                if ((!(isset($context["show"]) ? $context["show"] : $this->getContext($context, "show")))) {
                    echo " class=\"hidden\"";
                }
                echo ">
\t\t\t\t";
                // line 44
                $context["blocks"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryBlocks"), "getBlocksBySectionId", array(0 => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")), "method");
                // line 45
                echo "\t\t\t\t";
                echo $this->getAttribute($this, "blockList", array(0 => (isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks")), 1 => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "blocks"), 2 => (("blocks[section" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")) . "]")), "method");
                echo "
\t\t\t</div>
\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 48
            echo "\t";
            $context["blocksInput"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 49
            echo "
";
        } else {
            // line 51
            echo "
\t";
            // line 52
            ob_start();
            // line 53
            echo "\t\t";
            $context["blocks"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryBlocks"), "getAllBlocks");
            // line 54
            echo "\t\t";
            echo $this->getAttribute($this, "blockList", array(0 => (isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks")), 1 => $this->getAttribute((isset($context["settings"]) ? $context["settings"] : $this->getContext($context, "settings")), "blocks")), "method");
            echo "
\t";
            $context["blocksInput"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 56
            echo "
";
        }
        // line 58
        echo "

";
        // line 60
        echo $context["forms"]->getfield(array("label" => \Blocks\Blocks::t("Entry Blocks"), "instructions" => \Blocks\Blocks::t("Which entry blocks should be visible in the widget?")), (isset($context["blocksInput"]) ? $context["blocksInput"] : $this->getContext($context, "blocksInput")));
        // line 63
        echo "
";
    }

    // line 4
    public function getblockList($_blocks = null, $_selected = null, $_namePrefix = null)
    {
        $context = $this->env->mergeGlobals(array(
            "blocks" => $_blocks,
            "selected" => $_selected,
            "namePrefix" => $_namePrefix,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 5
            echo "\t";
            $context["__internal_a4197ee6d644dfe460e633ed313686364e5d301f"] = $this->env->loadTemplate("_includes/forms");
            // line 6
            echo "
\t";
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks")));
            foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
                // line 8
                echo "\t\t";
                ob_start();
                // line 9
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "name")), "html", null, true);
                // line 10
                if ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "required")) {
                    echo " <span class=\"required\"></span>";
                }
                $context["label"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 12
                echo "\t\t<div>
\t\t\t";
                // line 13
                echo $context["__internal_a4197ee6d644dfe460e633ed313686364e5d301f"]->getcheckbox(array("label" => (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), "name" => ((isset($context["namePrefix"]) ? $context["namePrefix"] : $this->getContext($context, "namePrefix")) . "[]"), "value" => $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id"), "checked" => ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "required") || twig_in_filter($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id"), (isset($context["selected"]) ? $context["selected"] : $this->getContext($context, "selected")))), "disabled" => $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "required")));
                // line 19
                echo "
\t\t</div>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "_components/widgets/QuickPost/settings";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 19,  169 => 13,  166 => 12,  159 => 9,  156 => 8,  152 => 7,  149 => 6,  133 => 4,  128 => 63,  126 => 60,  122 => 58,  107 => 52,  104 => 51,  100 => 49,  97 => 48,  79 => 45,  77 => 44,  68 => 43,  65 => 42,  45 => 40,  36 => 28,  31 => 26,  29 => 25,  34 => 27,  27 => 11,  25 => 23,  21 => 2,  19 => 1,  161 => 10,  157 => 78,  151 => 77,  146 => 5,  144 => 73,  142 => 72,  132 => 70,  130 => 69,  127 => 68,  124 => 67,  121 => 66,  118 => 56,  115 => 64,  112 => 54,  109 => 53,  105 => 61,  101 => 59,  99 => 49,  96 => 48,  94 => 47,  91 => 46,  85 => 45,  80 => 42,  78 => 41,  70 => 36,  64 => 34,  62 => 33,  59 => 29,  56 => 27,  54 => 26,  52 => 23,  49 => 19,  47 => 41,  44 => 15,  41 => 38,  39 => 29,  37 => 11,  32 => 14,  30 => 6,  28 => 5,  26 => 3,  24 => 2,);
    }
}
