<?php

/* content/entries/_revisions */
class __TwigTemplate_8adeb3a3a7947ee675b20980237a3b52 extends Twig_Template
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
        $context["drafts"] = $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "entryRevisions"), "getEditableDraftsByEntryId", array(0 => $this->getAttribute($this->getContext($context, "entry"), "id")), "method");
        // line 2
        $context["versions"] = $this->getAttribute($this->getAttribute($this->getContext($context, "blx"), "entryRevisions"), "getVersionsByEntryId", array(0 => $this->getAttribute($this->getContext($context, "entry"), "id")), "method");
        // line 3
        echo "
<div class=\"btn menubtn\" data-icon=\"v\">";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, "revisionLabel"), "html", null, true);
        echo "</div>

<div class=\"menu menulist\" data-align=\"right\">
\t<ul>
\t\t<li><a";
        // line 8
        if (($this->getAttribute($this->getContext($context, "entry"), "classHandle") == "Entry")) {
            echo " class=\"active\"";
        }
        echo " href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entry"), "cpEditUrl"), "html", null, true);
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
        if ((!$this->getContext($context, "drafts"))) {
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
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "drafts"));
            foreach ($context['_seq'] as $context["_key"] => $context["draft"]) {
                // line 17
                echo "\t\t\t\t<li><a";
                if ((($this->getAttribute($this->getContext($context, "entry"), "classHandle") == "EntryDraft") && ($this->getAttribute($this->getContext($context, "draft"), "draftId") == $this->getContext($context, "draftId")))) {
                    echo " class=\"active\"";
                }
                echo " href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entry"), "cpEditUrl"), "html", null, true);
                echo "/drafts/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "draft"), "draftId"), "html", null, true);
                echo "\">
\t\t\t\t\t";
                // line 18
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Draft {id}", array("id" => $this->getAttribute($this->getContext($context, "draft"), "draftId"))), "html", null, true);
                echo "
\t\t\t\t\t";
                // line 19
                if ($this->getAttribute($this->getContext($context, "blx"), "hasPackage", array(0 => "Users"), "method")) {
                    // line 20
                    echo "\t\t\t\t\t\t<span class=\"light\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "draft"), "creator"), "html", null, true);
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
        if ((!$this->getContext($context, "versions"))) {
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
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "versions"));
            foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
                // line 34
                echo "\t\t\t\t<li><a";
                if ((($this->getAttribute($this->getContext($context, "entry"), "classHandle") == "EntryVersion") && ($this->getAttribute($this->getContext($context, "version"), "versionId") == $this->getContext($context, "versionId")))) {
                    echo " class=\"active\"";
                }
                echo " href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entry"), "cpEditUrl"), "html", null, true);
                echo "/versions/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "version"), "versionId"), "html", null, true);
                echo "\">
\t\t\t\t\t";
                // line 35
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Version {id}", array("id" => $this->getAttribute($this->getContext($context, "version"), "versionId"))), "html", null, true);
                echo "
\t\t\t\t\t";
                // line 36
                if ($this->getAttribute($this->getContext($context, "blx"), "hasPackage", array(0 => "Users"), "method")) {
                    // line 37
                    echo "\t\t\t\t\t\t<span class=\"light\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "version"), "creator"), "html", null, true);
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
        return array (  155 => 43,  151 => 41,  144 => 39,  136 => 36,  121 => 34,  114 => 32,  108 => 30,  106 => 29,  101 => 27,  98 => 26,  87 => 22,  81 => 20,  79 => 19,  75 => 18,  64 => 17,  60 => 16,  57 => 15,  51 => 13,  49 => 12,  45 => 11,  33 => 8,  23 => 3,  21 => 2,  19 => 1,  381 => 237,  379 => 236,  374 => 231,  371 => 230,  368 => 229,  363 => 227,  359 => 226,  356 => 225,  353 => 224,  350 => 223,  342 => 221,  340 => 220,  334 => 218,  330 => 216,  324 => 214,  322 => 213,  319 => 212,  317 => 211,  314 => 210,  309 => 207,  305 => 205,  297 => 203,  295 => 202,  290 => 200,  286 => 199,  280 => 198,  276 => 196,  274 => 195,  267 => 190,  263 => 188,  260 => 185,  256 => 183,  253 => 179,  250 => 178,  244 => 176,  241 => 175,  239 => 174,  235 => 172,  233 => 165,  229 => 163,  227 => 156,  223 => 154,  221 => 147,  218 => 146,  214 => 144,  211 => 138,  209 => 137,  205 => 135,  203 => 128,  198 => 125,  196 => 121,  192 => 119,  190 => 111,  186 => 109,  180 => 107,  178 => 106,  175 => 105,  169 => 103,  167 => 102,  164 => 101,  162 => 100,  153 => 96,  148 => 95,  146 => 94,  140 => 88,  138 => 37,  134 => 85,  132 => 35,  124 => 81,  117 => 33,  115 => 77,  113 => 74,  109 => 69,  107 => 68,  105 => 67,  102 => 65,  100 => 64,  97 => 60,  94 => 24,  92 => 57,  89 => 53,  86 => 51,  83 => 49,  80 => 46,  78 => 45,  76 => 44,  73 => 40,  70 => 38,  68 => 37,  66 => 34,  61 => 30,  58 => 27,  55 => 25,  52 => 23,  50 => 22,  48 => 21,  46 => 18,  43 => 14,  40 => 12,  36 => 10,  34 => 9,  32 => 8,  30 => 5,  28 => 4,  26 => 4,  24 => 2,);
    }
}
