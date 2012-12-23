<?php

/* content/entries/_revisions */
class __TwigTemplate_dfb49d78a3db3eef04c47a9390ecd46f extends Twig_Template
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
        $context["drafts"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryRevisions"), "getEditableDraftsByEntryId", array(0 => $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "id")), "method");
        // line 2
        $context["versions"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryRevisions"), "getVersionsByEntryId", array(0 => $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "id")), "method");
        // line 3
        echo "
<div class=\"btn menubtn\" data-icon=\"v\">";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["revisionLabel"]) ? $context["revisionLabel"] : $this->getContext($context, "revisionLabel")), "html", null, true);
        echo "</div>

<div class=\"menu menulist\" data-align=\"right\">
\t<ul>
\t\t<li><a";
        // line 8
        if (($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "classHandle") == "Entry")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "cpEditUrl"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Current"), "html", null, true);
        echo "</a></li>
\t</ul>

\t<h2>";
        // line 11
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Drafts"), "html", null, true);
        echo "</h2>
\t";
        // line 12
        if ((!(isset($context["drafts"]) ? $context["drafts"] : $this->getContext($context, "drafts")))) {
            // line 13
            echo "\t\t<span class=\"light\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("No drafts exist right now."), "html", null, true);
            echo "</span>
\t";
        } else {
            // line 15
            echo "\t\t<ul>
\t\t\t";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["drafts"]) ? $context["drafts"] : $this->getContext($context, "drafts")));
            foreach ($context['_seq'] as $context["_key"] => $context["draft"]) {
                // line 17
                echo "\t\t\t\t<li><a";
                if ((($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "classHandle") == "EntryDraft") && ($this->getAttribute((isset($context["draft"]) ? $context["draft"] : $this->getContext($context, "draft")), "draftId") == (isset($context["draftId"]) ? $context["draftId"] : $this->getContext($context, "draftId"))))) {
                    echo " class=\"active\"";
                }
                echo " href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "cpEditUrl"), "html", null, true);
                echo "/drafts/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["draft"]) ? $context["draft"] : $this->getContext($context, "draft")), "draftId"), "html", null, true);
                echo "\">
\t\t\t\t\t";
                // line 18
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Draft {id}", array("id" => $this->getAttribute((isset($context["draft"]) ? $context["draft"] : $this->getContext($context, "draft")), "draftId"))), "html", null, true);
                echo "
\t\t\t\t\t";
                // line 19
                if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Users"), "method")) {
                    // line 20
                    echo "\t\t\t\t\t\t<span class=\"light\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["draft"]) ? $context["draft"] : $this->getContext($context, "draft")), "creator"), "html", null, true);
                    echo "</span>
\t\t\t\t\t";
                }
                // line 22
                echo "\t\t\t\t</a></li>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['draft'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 24
            echo "\t\t</ul>
\t";
        }
        // line 26
        echo "
\t<h2>";
        // line 27
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Versions"), "html", null, true);
        echo "</h2>

\t";
        // line 29
        if ((!(isset($context["versions"]) ? $context["versions"] : $this->getContext($context, "versions")))) {
            // line 30
            echo "\t\t<span class=\"light\">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("No versions exist yet."), "html", null, true);
            echo "</span>
\t";
        } else {
            // line 32
            echo "\t\t<ul>
\t\t\t";
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["versions"]) ? $context["versions"] : $this->getContext($context, "versions")));
            foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
                // line 34
                echo "\t\t\t\t<li><a";
                if ((($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "classHandle") == "EntryVersion") && ($this->getAttribute((isset($context["version"]) ? $context["version"] : $this->getContext($context, "version")), "versionId") == (isset($context["versionId"]) ? $context["versionId"] : $this->getContext($context, "versionId"))))) {
                    echo " class=\"active\"";
                }
                echo " href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "cpEditUrl"), "html", null, true);
                echo "/versions/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["version"]) ? $context["version"] : $this->getContext($context, "version")), "versionId"), "html", null, true);
                echo "\">
\t\t\t\t\t";
                // line 35
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Version {id}", array("id" => $this->getAttribute((isset($context["version"]) ? $context["version"] : $this->getContext($context, "version")), "versionId"))), "html", null, true);
                echo "
\t\t\t\t\t";
                // line 36
                if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Users"), "method")) {
                    // line 37
                    echo "\t\t\t\t\t\t<span class=\"light\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["version"]) ? $context["version"] : $this->getContext($context, "version")), "creator"), "html", null, true);
                    echo "</span>
\t\t\t\t\t";
                }
                // line 39
                echo "\t\t\t\t</a></li>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['version'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 41
            echo "\t\t</ul>
\t";
        }
        // line 43
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "content/entries/_revisions";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 43,  151 => 41,  144 => 39,  138 => 37,  136 => 36,  132 => 35,  121 => 34,  117 => 33,  114 => 32,  108 => 30,  106 => 29,  101 => 27,  98 => 26,  94 => 24,  87 => 22,  81 => 20,  79 => 19,  75 => 18,  64 => 17,  60 => 16,  57 => 15,  51 => 13,  49 => 12,  45 => 11,  33 => 8,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
