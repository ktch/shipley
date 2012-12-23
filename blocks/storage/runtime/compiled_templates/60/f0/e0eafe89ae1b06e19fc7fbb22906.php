<?php

/* assets */
class __TwigTemplate_60f0e0eafe89ae1b06e19fc7fbb22906 extends Twig_Template
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
        $context["title"] = \Blocks\Blocks::t("Assets");
        // line 3
        \Blocks\blx()->templates->includeCssResource("css/assets.css");
        // line 4
        $context["sources"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getAllSources");
        // line 5
        $context["view"] = "thumbs";
        // line 7
        ob_start();
        // line 8
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
";
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 12
        ob_start();
        // line 13
        echo "\t";
        if ((isset($context["sources"]) ? $context["sources"] : $this->getContext($context, "sources"))) {
            // line 14
            echo "
        ";
            // line 15
            \Blocks\blx()->templates->includeJsResource("js/Assets/AssetFileManager.js");
            // line 16
            echo "        ";
            \Blocks\blx()->templates->includeJsResource("js/global/ui/QQUploader.js");
            // line 17
            echo "        ";
            \Blocks\blx()->templates->includeJsResource("js/Assets/AssetPanel.js");
            // line 18
            echo "
        <div class=\"assets\">
            <nav class=\"nav\">
                <div class=\"buttons\">
                    <div class=\"assets-upload\">
                    </div>
                </div>

                <ul class=\"assets-sources\">
                    ";
            // line 27
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sources"]) ? $context["sources"] : $this->getContext($context, "sources")));
            foreach ($context['_seq'] as $context["_key"] => $context["source"]) {
                // line 28
                echo "                        ";
                $context["folder"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getFolderBySourceId", array(0 => $this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "id")), "method");
                // line 29
                echo "                        ";
                if ((isset($context["folder"]) ? $context["folder"] : $this->getContext($context, "folder"))) {
                    // line 30
                    echo "                            <li><a href=\"javascript:;\" data-source=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "id"), "html", null, true);
                    echo "\" data-folder=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["folder"]) ? $context["folder"] : $this->getContext($context, "folder")), "id"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["source"]) ? $context["source"] : $this->getContext($context, "source")), "name"), "html", null, true);
                    echo "</a></li>
                        ";
                }
                // line 32
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['source'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 33
            echo "                </ul>
            </nav>

            <div class=\"asset-content\">
                <div class=\"toolbar\">
                    <div class=\"btngroup\">
                        <a class=\"btn thumbs\" href=\"javascript:;\"\" title=\"";
            // line 39
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Display files as thumbnails"), "html", null, true);
            echo "\" data-icon=\"⌗\"></a>
                        <a class=\"btn list\" href=\"javascript:;\" title=\"";
            // line 40
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Display files in a list"), "html", null, true);
            echo "\" data-icon=\"•\"></a>
                    </div>

                    <div class=\"search\"><input type=\"text\" class=\"text nicetext fullwidth\" data-hint=\"";
            // line 43
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Search assets"), "html", null, true);
            echo "\"></div>
                </div>
                <div class=\"temp-spinner\">Assets is working..</div>

                <div class=\"folder-container\" data-folder=\"0\">

                </div>

                <div class=\"asset-status\">

                </div>
            </div>
        </div>
\t";
        } else {
            // line 57
            echo "\t\t<p class=\"centeralign\">
\t\t\t";
            // line 58
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("No asset sources exist yet."), "html", null, true);
            echo "
\t\t\t<a class=\"go\" href=\"";
            // line 59
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets/sources/new"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Create the first one"), "html", null, true);
            echo "</a>
\t\t</p>
\t";
        }
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "assets";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 59,  131 => 58,  128 => 57,  111 => 43,  105 => 40,  101 => 39,  93 => 33,  87 => 32,  77 => 30,  74 => 29,  71 => 28,  67 => 27,  56 => 18,  53 => 17,  50 => 16,  48 => 15,  45 => 14,  42 => 13,  40 => 12,  34 => 8,  32 => 7,  30 => 5,  28 => 4,  26 => 3,  24 => 2,);
    }
}
