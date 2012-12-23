<?php

/* settings/assets/operations */
class __TwigTemplate_553085c7006fb1868d98e44d9f46f6e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("settings/assets/_layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "settings/assets/_layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 3
        $context["page"] = "operations";
        // line 4
        $context["title"] = \Blocks\Blocks::t("Asset operations");
        // line 5
        $context["sources"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getAllSources");
        // line 7
        \Blocks\blx()->templates->includeTranslations(
        	"The following items were found in the database that do not have a physical match.",
        	"Folders",
        	"Files",
        	"Cancel",
        	"Delete"
        );
        // line 15
        ob_start();
        // line 16
        echo "\t<p id=\"nosources\" ";
        if (twig_length_filter($this->env, (isset($context["sources"]) ? $context["sources"] : $this->getContext($context, "sources")))) {
            echo "style=\"display: none\"";
        }
        echo ">
\t\t";
        // line 17
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("No sources exist yet."), "html", null, true);
        echo "
\t</p>

\t";
        // line 20
        if (twig_length_filter($this->env, (isset($context["sources"]) ? $context["sources"] : $this->getContext($context, "sources")))) {
            // line 21
            echo "
        ";
            // line 22
            if (array_key_exists("sizeHandle", $context)) {
                // line 23
                echo "            ";
                $context["sizeValue"] = (isset($context["sizeHandle"]) ? $context["sizeHandle"] : $this->getContext($context, "sizeHandle"));
                // line 24
                echo "        ";
            } else {
                // line 25
                echo "            ";
                $context["sizeValue"] = 0;
                // line 26
                echo "        ";
            }
            // line 27
            echo "
        ";
            // line 28
            echo $context["forms"]->getcheckboxSelectField(array("label" => \Blocks\Blocks::t("Sources"), "instructions" => \Blocks\Blocks::t("Which asset sources do you want to perform operations on?"), "id" => "sourceId", "name" => "sourceId", "options" => (isset($context["sources"]) ? $context["sources"] : $this->getContext($context, "sources")), "values" => "", "class" => "assets-sources"));
            // line 36
            echo "

        ";
            // line 38
            ob_start();
            // line 39
            echo "            <ul>
                <li>
                    ";
            // line 41
            echo $context["forms"]->getcheckbox(array("label" => \Blocks\Blocks::t("Update indexes"), "id" => "do-index", "name" => "do-index", "class" => "assets-index"));
            // line 46
            echo "
                </li>

                ";
            // line 49
            $context["sizes"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getAllAssetSizes", array(), "method");
            // line 50
            echo "                ";
            if (twig_length_filter($this->env, (isset($context["sizes"]) ? $context["sizes"] : $this->getContext($context, "sizes")))) {
                // line 51
                echo "                    ";
                $context["sizesChecked"] = (!twig_test_empty($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "getQuery", array(0 => "size"), "method")));
                // line 52
                echo "                    <li>
                        ";
                // line 53
                echo $context["forms"]->getcheckbox(array("label" => \Blocks\Blocks::t("Update sizes"), "id" => "do-sizes", "name" => "do-sizes", "class" => "assets-sizes", "checked" => (isset($context["sizesChecked"]) ? $context["sizesChecked"] : $this->getContext($context, "sizesChecked")), "toggle" => "sizes"));
                // line 60
                echo "
                        <ul id=\"sizes\" class=\"indent";
                // line 61
                if ((!(isset($context["sizesChecked"]) ? $context["sizesChecked"] : $this->getContext($context, "sizesChecked")))) {
                    echo " hidden";
                }
                echo " checkbox-select\">
                            <li>
                                ";
                // line 63
                echo $context["forms"]->getcheckbox(array("class" => "all", "label" => (("<b>" . \Blocks\Blocks::t("All")) . "</b>"), "checked" => (!(isset($context["sizesChecked"]) ? $context["sizesChecked"] : $this->getContext($context, "sizesChecked")))));
                // line 67
                echo "
                            </li>
                            ";
                // line 69
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["sizes"]) ? $context["sizes"] : $this->getContext($context, "sizes")));
                foreach ($context['_seq'] as $context["_key"] => $context["size"]) {
                    // line 70
                    echo "                                <li>
                                    ";
                    // line 71
                    echo $context["forms"]->getcheckbox(array("label" => $this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "name"), "name" => ((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")) . "[]"), "value" => $this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "handle"), "checked" => ((!(isset($context["sizesChecked"]) ? $context["sizesChecked"] : $this->getContext($context, "sizesChecked"))) || ((isset($context["sizesChecked"]) ? $context["sizesChecked"] : $this->getContext($context, "sizesChecked")) && ($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "request"), "getQuery", array(0 => "size"), "method") == $this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "handle")))), "disabled" => (!(isset($context["sizesChecked"]) ? $context["sizesChecked"] : $this->getContext($context, "sizesChecked")))));
                    // line 77
                    echo "
                                </li>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['size'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 80
                echo "                        </ul>
                    </li>
                ";
            }
            // line 83
            echo "            </ul>
        ";
            $context["operationsField"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 85
            echo "
        ";
            // line 86
            echo $context["forms"]->getfield(array("label" => \Blocks\Blocks::t("Operations"), "instructions" => "Which operations do you want to perform on the selected sources?"), (isset($context["operationsField"]) ? $context["operationsField"] : $this->getContext($context, "operationsField")));
            // line 89
            echo "

        <div class=\"operation-progress\"></div>

        <div class=\"buttons\">
            <div class=\"btn submit\" id=\"start-operations\">";
            // line 94
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Start"), "html", null, true);
            echo "</a>
        </div>

        ";
            // line 97
            \Blocks\blx()->templates->includeJsResource("js/Assets/AssetOperations.js");
            // line 98
            echo "        ";
            \Blocks\blx()->templates->includeJsResource("js/QueueManager.js");
            // line 99
            echo "
    ";
        }
        // line 101
        echo "
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/assets/operations";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 101,  174 => 99,  171 => 98,  169 => 97,  163 => 94,  156 => 89,  154 => 86,  151 => 85,  147 => 83,  142 => 80,  134 => 77,  132 => 71,  129 => 70,  125 => 69,  121 => 67,  119 => 63,  112 => 61,  109 => 60,  107 => 53,  104 => 52,  101 => 51,  98 => 50,  96 => 49,  91 => 46,  89 => 41,  85 => 39,  83 => 38,  79 => 36,  77 => 28,  74 => 27,  71 => 26,  68 => 25,  65 => 24,  62 => 23,  60 => 22,  57 => 21,  55 => 20,  49 => 17,  42 => 16,  40 => 15,  32 => 7,  30 => 5,  28 => 4,  26 => 3,  24 => 2,);
    }
}
