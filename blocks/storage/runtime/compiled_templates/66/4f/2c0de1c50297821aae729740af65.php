<?php

/* _special/install/site */
class __TwigTemplate_664f2c0de1c50297821aae729740af65 extends Twig_Template
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

<div id=\"site\" class=\"modal\">
\t<h1>";
        // line 5
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Setup your site"), "html", null, true);
        echo "</h1>

\t<form id=\"siteform\" accept-charset=\"UTF-8\">
\t\t";
        // line 8
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Site Name"), "id" => "siteName", "value" => (isset($context["siteName"]) ? $context["siteName"] : $this->getContext($context, "siteName")), "maxlength" => 255));
        echo "
\t\t";
        // line 9
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Site URL"), "id" => "siteUrl", "value" => (isset($context["siteUrl"]) ? $context["siteUrl"] : $this->getContext($context, "siteUrl")), "maxlength" => 255));
        echo "

\t\t";
        // line 11
        ob_start();
        // line 12
        echo "\t\t\t<div class=\"select\">
\t\t\t\t<select id=\"language\">
\t\t\t\t\t";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "i18n"), "getTranslatedLanguages"));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 15
            echo "\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")), "html", null, true);
            echo "\" ";
            if (((isset($context["language"]) ? $context["language"] : $this->getContext($context, "language")) == $this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "language"))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "i18n"), "getLocaleName", array(0 => (isset($context["language"]) ? $context["language"] : $this->getContext($context, "language"))), "method"), "html", null, true);
            echo "</option>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 17
        echo "\t\t\t\t</select>
\t\t\t</div>
\t\t";
        $context["languageInput"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 20
        echo "\t\t";
        echo $context["forms"]->getfield(array("label" => \Blocks\Blocks::t("Language"), "id" => "language"), (isset($context["languageInput"]) ? $context["languageInput"] : $this->getContext($context, "languageInput")));
        echo "

\t\t<div class=\"buttons\">
\t\t\t<div id=\"sitesubmit\" class=\"btn big submit\">";
        // line 23
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Finish up"), "html", null, true);
        echo "
\t\t\t\t<input type=\"submit\" tabindex=\"-1\">
\t\t\t</div>
\t\t</div>
\t</form>

\t";
        // line 29
        $this->env->loadTemplate("_special/install/dots")->display(array_merge($context, array("dot" => 3)));
        // line 30
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "_special/install/site";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 30,  78 => 23,  66 => 17,  41 => 11,  1345 => 300,  1334 => 299,  1320 => 295,  1309 => 294,  1295 => 290,  1284 => 289,  1270 => 284,  1261 => 283,  1258 => 282,  1247 => 281,  1233 => 277,  1222 => 276,  1208 => 272,  1197 => 271,  1183 => 267,  1172 => 266,  1158 => 262,  1147 => 261,  1133 => 257,  1122 => 256,  1108 => 252,  1097 => 251,  1083 => 246,  1078 => 244,  1071 => 243,  1067 => 241,  1061 => 239,  1058 => 238,  1054 => 236,  1048 => 234,  1045 => 233,  1043 => 232,  1039 => 231,  1027 => 230,  1025 => 229,  1022 => 228,  1020 => 227,  1011 => 226,  1008 => 225,  996 => 224,  980 => 216,  975 => 214,  970 => 212,  956 => 210,  953 => 209,  942 => 208,  927 => 204,  923 => 203,  917 => 202,  911 => 201,  909 => 200,  906 => 199,  895 => 198,  870 => 192,  868 => 185,  865 => 184,  847 => 183,  844 => 182,  833 => 181,  819 => 176,  813 => 175,  809 => 174,  805 => 173,  799 => 172,  793 => 171,  787 => 170,  784 => 169,  781 => 168,  778 => 167,  767 => 166,  755 => 162,  747 => 159,  745 => 153,  742 => 152,  738 => 151,  734 => 149,  732 => 143,  726 => 141,  723 => 140,  712 => 139,  687 => 133,  685 => 126,  682 => 125,  664 => 124,  661 => 123,  650 => 122,  636 => 117,  630 => 116,  624 => 115,  620 => 114,  616 => 113,  612 => 112,  606 => 111,  600 => 110,  594 => 109,  591 => 108,  588 => 107,  585 => 106,  582 => 105,  571 => 104,  559 => 100,  544 => 98,  540 => 97,  532 => 96,  528 => 95,  524 => 94,  518 => 93,  512 => 92,  510 => 91,  507 => 90,  496 => 89,  483 => 84,  468 => 82,  464 => 81,  456 => 80,  452 => 79,  448 => 78,  442 => 77,  438 => 76,  432 => 75,  427 => 73,  424 => 72,  421 => 71,  410 => 70,  391 => 66,  387 => 65,  383 => 64,  377 => 63,  367 => 62,  364 => 61,  361 => 60,  350 => 59,  338 => 55,  332 => 52,  328 => 51,  322 => 49,  320 => 48,  315 => 47,  304 => 46,  290 => 42,  279 => 41,  266 => 37,  259 => 36,  255 => 35,  251 => 34,  245 => 33,  239 => 32,  233 => 31,  227 => 30,  221 => 29,  215 => 28,  210 => 27,  207 => 26,  204 => 25,  193 => 24,  172 => 15,  159 => 7,  150 => 5,  146 => 4,  143 => 3,  140 => 2,  129 => 1,  123 => 297,  119 => 292,  115 => 287,  111 => 279,  107 => 274,  103 => 269,  99 => 264,  95 => 259,  91 => 254,  87 => 29,  83 => 222,  79 => 219,  75 => 206,  67 => 179,  63 => 164,  59 => 137,  51 => 15,  47 => 14,  39 => 57,  31 => 39,  57 => 20,  55 => 120,  36 => 9,  32 => 8,  34 => 4,  42 => 12,  33 => 7,  22 => 2,  139 => 68,  132 => 64,  128 => 63,  124 => 62,  120 => 61,  116 => 60,  112 => 59,  108 => 58,  104 => 57,  100 => 56,  96 => 55,  82 => 44,  71 => 20,  64 => 32,  56 => 31,  49 => 26,  29 => 6,  27 => 22,  25 => 4,  23 => 13,  21 => 2,  19 => 1,  46 => 13,  43 => 12,  40 => 10,  37 => 12,  35 => 44,  30 => 6,  28 => 3,  26 => 5,  24 => 2,);
    }
}
