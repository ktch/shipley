<?php

/* content/entries/index */
class __TwigTemplate_8f04706ce8b6b0b5cdd5233d5c7ff614 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("content/_layout");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "content/_layout";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["tab"] = "entries";
        // line 3
        $context["title"] = \Blocks\Blocks::t("Entries");
        // line 6
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
            // line 7
            $context["sections"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "sections"), "editable", array(0 => true), "method"), "indexBy", array(0 => "id"), "method"), "find");
            // line 8
            $context["sectionHandles"] = array();
            // line 9
            $context["newEntrySections"] = array();
            // line 11
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")));
            foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
                // line 12
                $context["sectionHandles"] = twig_array_merge((isset($context["sectionHandles"]) ? $context["sectionHandles"] : $this->getContext($context, "sectionHandles")), array(0 => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "handle")));
                // line 14
                if ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "can", array(0 => ("createEntriesInSection" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"))), "method")) {
                    // line 15
                    $context["newEntrySections"] = twig_array_merge((isset($context["newEntrySections"]) ? $context["newEntrySections"] : $this->getContext($context, "newEntrySections")), array(0 => (isset($context["section"]) ? $context["section"] : $this->getContext($context, "section"))));
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 19
            $context["showSection"] = true;
        } else {
            // line 21
            $context["showSection"] = false;
        }
        // line 25
        $context["statuses"] = array("live" => "on", "pending" => "pending", "disabled" => "", "expired" => "off");
        // line 26
        $context["showStatus"] = true;
        // line 29
        if ((!array_key_exists("filter", $context))) {
            // line 30
            $context["filter"] = null;
            // line 31
            $context["params"] = array("status" => "*");
        } elseif (twig_in_filter((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")), twig_get_array_keys_filter((isset($context["statuses"]) ? $context["statuses"] : $this->getContext($context, "statuses"))))) {
            // line 33
            $context["params"] = array("status" => (isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")));
            // line 34
            $context["showStatus"] = false;
        } elseif (((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")) == "archived")) {
            // line 36
            $context["params"] = array("archived" => true);
            // line 37
            $context["showStatus"] = false;
        } elseif (($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method") && twig_in_filter((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")), (isset($context["sectionHandles"]) ? $context["sectionHandles"] : $this->getContext($context, "sectionHandles"))))) {
            // line 39
            $context["params"] = array("section" => (isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")), "status" => "*");
            // line 40
            $context["showSection"] = false;
        } else {
            // line 42
            throw new \Blocks\HttpException(404);
        }
        // line 46
        if ((isset($context["showSection"]) ? $context["showSection"] : $this->getContext($context, "showSection"))) {
            // line 47
            $context["params"] = twig_array_merge((isset($context["params"]) ? $context["params"] : $this->getContext($context, "params")), array("sectionId" => twig_get_array_keys_filter((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")))));
        }
        // line 51
        ob_start();
        // line 52
        echo "\t";
        if (((!$this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) || twig_length_filter($this->env, (isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections"))))) {
            // line 53
            echo "\t\t<nav class=\"nav\">
\t\t\t";
            // line 54
            if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
                // line 55
                echo "\t\t\t\t";
                if (twig_length_filter($this->env, (isset($context["newEntrySections"]) ? $context["newEntrySections"] : $this->getContext($context, "newEntrySections")))) {
                    // line 56
                    echo "\t\t\t\t\t<div class=\"buttons\">
\t\t\t\t\t\t";
                    // line 57
                    if ((twig_length_filter($this->env, (isset($context["newEntrySections"]) ? $context["newEntrySections"] : $this->getContext($context, "newEntrySections"))) > 1)) {
                        // line 58
                        echo "\t\t\t\t\t\t\t<div class=\"btn submit menubtn add icon\">";
                        echo twig_escape_filter($this->env, \Blocks\Blocks::t("New Entry"), "html", null, true);
                        echo "</div>
\t\t\t\t\t\t\t<div class=\"menu\">
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t";
                        // line 61
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["newEntrySections"]) ? $context["newEntrySections"] : $this->getContext($context, "newEntrySections")));
                        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
                            // line 62
                            echo "\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl((("content/" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "handle")) . "/new")), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "name")), "html", null, true);
                            echo "</a></li>
\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 64
                        echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    } else {
                        // line 67
                        echo "\t\t\t\t\t\t\t<a class=\"btn submit add icon\" href=\"";
                        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl((("content/" . $this->getAttribute($this->getAttribute((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")), $this->getAttribute(twig_get_array_keys_filter((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections"))), 0, array(), "array"), array(), "array"), "handle")) . "/new")), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, \Blocks\Blocks::t("New Entry"), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t";
                    }
                    // line 69
                    echo "\t\t\t\t\t</div>
\t\t\t\t";
                }
                // line 71
                echo "\t\t\t";
            } else {
                // line 72
                echo "\t\t\t\t";
                if ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "can", array(0 => "createEntries"), "method")) {
                    // line 73
                    echo "\t\t\t\t\t<div class=\"buttons\">
\t\t\t\t\t\t<a class=\"btn submit add icon\" href=\"";
                    // line 74
                    echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("content/blog/new"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("New Entry"), "html", null, true);
                    echo "</a>
\t\t\t\t\t</div>
\t\t\t\t";
                }
                // line 77
                echo "\t\t\t";
            }
            // line 78
            echo "
\t\t\t<ul>
\t\t\t\t<li><a href=\"";
            // line 80
            echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("content"), "html", null, true);
            echo "\" ";
            if ((!(isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")))) {
                echo "class=\"sel\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("All Entries"), "html", null, true);
            echo "</a></li>

\t\t\t\t";
            // line 82
            if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
                // line 83
                echo "\t\t\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")));
                foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
                    // line 84
                    echo "\t\t\t\t\t\t<li><a href=\"";
                    echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("content/" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "handle"))), "html", null, true);
                    echo "\" ";
                    if (((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")) == $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "handle"))) {
                        echo "class=\"sel\"";
                    }
                    echo ">";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "name")), "html", null, true);
                    echo "</a></li>
\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 86
                echo "\t\t\t\t";
            }
            // line 87
            echo "
\t\t\t\t";
            // line 88
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["statuses"]) ? $context["statuses"] : $this->getContext($context, "statuses")));
            foreach ($context['_seq'] as $context["status"] => $context["class"]) {
                // line 89
                echo "\t\t\t\t\t";
                if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entries"), "status", array(0 => (isset($context["status"]) ? $context["status"] : $this->getContext($context, "status"))), "method"), "editable", array(0 => true), "method"), "total")) {
                    // line 90
                    echo "\t\t\t\t\t\t<li><a href=\"";
                    echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("content/" . (isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")))), "html", null, true);
                    echo "\" ";
                    if (((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")) == (isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")))) {
                        echo "class=\"sel\"";
                    }
                    echo "><div class=\"status ";
                    echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "html", null, true);
                    echo "\"></div> ";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t(ucfirst((isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")))), "html", null, true);
                    echo "</a></li>
\t\t\t\t\t";
                }
                // line 92
                echo "\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['status'], $context['class'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 93
            echo "
\t\t\t\t";
            // line 94
            $context["archivedParams"] = array("archived" => true);
            // line 95
            echo "\t\t\t\t";
            if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
                // line 96
                echo "\t\t\t\t\t";
                $context["archivedParams"] = twig_array_merge((isset($context["archivedParams"]) ? $context["archivedParams"] : $this->getContext($context, "archivedParams")), array("section" => (isset($context["sectionHandles"]) ? $context["sectionHandles"] : $this->getContext($context, "sectionHandles"))));
                // line 97
                echo "\t\t\t\t";
            }
            // line 98
            echo "\t\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entries"), "archived", array(0 => true), "method"), "editable", array(0 => true), "method"), "total")) {
                // line 99
                echo "\t\t\t\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("content/archive"), "html", null, true);
                echo "\" ";
                if (((isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter")) == "archive")) {
                    echo "class=\"sel\"";
                }
                echo " data-icon=\"d\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Archived"), "html", null, true);
                echo "</a></li>
\t\t\t\t";
            }
            // line 101
            echo "\t\t\t</ul>
\t\t</nav>

\t\t<div>
\t\t\t<div class=\"toolbar\">
\t\t\t\t<div class=\"search\"><input type=\"text\" class=\"text nicetext fullwidth\" data-hint=\"";
            // line 106
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Search entries"), "html", null, true);
            echo "\"></div>
\t\t\t</div>

\t\t\t";
            // line 109
            list($context['paginate'], $context["entries"]) = \Blocks\TemplateHelper::paginateCriteria($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entries", array(0 => (isset($context["params"]) ? $context["params"] : $this->getContext($context, "params"))), "method"), "editable", array(0 => true), "method"), "limit", array(0 => 50), "method"));
            // line 110
            echo "
\t\t\t\t<p id=\"noentries\"";
            // line 111
            if (twig_length_filter($this->env, (isset($context["entries"]) ? $context["entries"] : $this->getContext($context, "entries")))) {
                echo " class=\"hidden\"";
            }
            echo ">
\t\t\t\t\t";
            // line 112
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("No entries exist yet."), "html", null, true);
            echo "
\t\t\t\t</p>

\t\t\t\t";
            // line 115
            if (twig_length_filter($this->env, (isset($context["entries"]) ? $context["entries"] : $this->getContext($context, "entries")))) {
                // line 116
                echo "
\t\t\t\t\t";
                // line 117
                $this->env->loadTemplate("_includes/paginatelinks")->display(array_merge($context, array("type" => \Blocks\Blocks::t("entries"))));
                // line 118
                echo "
\t\t\t\t\t";
                // line 119
                $context["totalCols"] = ((2 + (((isset($context["showStatus"]) ? $context["showStatus"] : $this->getContext($context, "showStatus"))) ? (1) : (0))) + (((isset($context["showSection"]) ? $context["showSection"] : $this->getContext($context, "showSection"))) ? (1) : (0)));
                // line 120
                echo "\t\t\t\t\t";
                $context["colWidth"] = round((100 / (isset($context["totalCols"]) ? $context["totalCols"] : $this->getContext($context, "totalCols"))));
                // line 121
                echo "\t\t\t\t\t<table id=\"entries\" class=\"data\">
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t<th scope=\"col\" width=\"";
                // line 123
                echo twig_escape_filter($this->env, (isset($context["colWidth"]) ? $context["colWidth"] : $this->getContext($context, "colWidth")), "html", null, true);
                echo "%\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Title"), "html", null, true);
                echo "</th>
\t\t\t\t\t\t\t<th scope=\"col\" width=\"";
                // line 124
                echo twig_escape_filter($this->env, (isset($context["colWidth"]) ? $context["colWidth"] : $this->getContext($context, "colWidth")), "html", null, true);
                echo "%\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Slug"), "html", null, true);
                echo "</th>
\t\t\t\t\t\t\t";
                // line 125
                if ((isset($context["showSection"]) ? $context["showSection"] : $this->getContext($context, "showSection"))) {
                    echo "<th scope=\"col\" width=\"";
                    echo twig_escape_filter($this->env, (isset($context["colWidth"]) ? $context["colWidth"] : $this->getContext($context, "colWidth")), "html", null, true);
                    echo "%\">";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Section"), "html", null, true);
                    echo "</th>";
                }
                // line 126
                echo "\t\t\t\t\t\t\t";
                if ((isset($context["showStatus"]) ? $context["showStatus"] : $this->getContext($context, "showStatus"))) {
                    echo "<th scope=\"col\" width=\"";
                    echo twig_escape_filter($this->env, (isset($context["colWidth"]) ? $context["colWidth"] : $this->getContext($context, "colWidth")), "html", null, true);
                    echo "%\">";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Status"), "html", null, true);
                    echo "</th>";
                }
                // line 127
                echo "\t\t\t\t\t\t\t<td class=\"thin\"></td>
\t\t\t\t\t\t</thead>
\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t";
                // line 130
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["entries"]) ? $context["entries"] : $this->getContext($context, "entries")));
                foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                    // line 131
                    echo "\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
                        // line 132
                        echo "\t\t\t\t\t\t\t\t\t";
                        $context["entrySection"] = $this->getAttribute((isset($context["sections"]) ? $context["sections"] : $this->getContext($context, "sections")), $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "sectionId"), array(), "array");
                        // line 133
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 134
                    echo "\t\t\t\t\t\t\t\t<tr data-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "id"), "html", null, true);
                    echo "\" data-name=\"";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "title")), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t<th scope=\"row\"><a href=\"";
                    // line 135
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "cpEditUrl"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "title"), "html", null, true);
                    echo "</a></th>
\t\t\t\t\t\t\t\t\t<td><a href=\"";
                    // line 136
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "url"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "slug"), "html", null, true);
                    echo "</a></td>
\t\t\t\t\t\t\t\t\t";
                    // line 137
                    if ((isset($context["showSection"]) ? $context["showSection"] : $this->getContext($context, "showSection"))) {
                        echo "<td>";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entrySection"]) ? $context["entrySection"] : $this->getContext($context, "entrySection")), "name"), "html", null, true);
                        echo "</th>";
                    }
                    // line 138
                    echo "\t\t\t\t\t\t\t\t\t";
                    if ((isset($context["showStatus"]) ? $context["showStatus"] : $this->getContext($context, "showStatus"))) {
                        echo "<td><div class=\"status ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["statuses"]) ? $context["statuses"] : $this->getContext($context, "statuses")), $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "status"), array(), "array"), "html", null, true);
                        echo "\"></div> ";
                        echo twig_escape_filter($this->env, \Blocks\Blocks::t(ucfirst($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "status"))), "html", null, true);
                        echo "</td>";
                    }
                    // line 139
                    echo "\t\t\t\t\t\t\t\t\t<td class=\"thin\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 140
                    if ((($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "authorId") == $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id")) || $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "can", array(0 => ("deletePeerEntries" . (($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) ? (("InSection" . $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "sectionId"))) : ("")))), "method"))) {
                        // line 141
                        echo "\t\t\t\t\t\t\t\t\t\t\t<a class=\"delete icon\" title=\"";
                        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Delete"), "html", null, true);
                        echo "\"></a>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 143
                    echo "\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 146
                echo "\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t";
            }
            // line 149
            echo "
\t\t\t";
            unset($context['paginate'], $context["entries"]);
            // line 151
            echo "\t\t</div>
\t";
        } else {
            // line 153
            echo "\t\t<p class=\"centeralign\">
\t\t\t";
            // line 154
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("No sections exist yet."), "html", null, true);
            echo "
\t\t\t";
            // line 155
            if ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "admin")) {
                // line 156
                echo "\t\t\t\t<a class=\"go\" href=\"";
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/sections/new"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Create the first one"), "html", null, true);
                echo "</a>
\t\t\t";
            }
            // line 158
            echo "\t\t</p>
\t";
        }
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 163
        $context["js"] = ('' === $tmp = "\tnew Blocks.ui.AdminTable({
\t\ttableSelector: '#entries',
\t\tnoObjectsSelector: '#noentries',
\t\tdeleteAction: 'entries/deleteEntry'
\t});
") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 170
        \Blocks\blx()->templates->includeJs((isset($context["js"]) ? $context["js"] : $this->getContext($context, "js")));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "content/entries/index";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  458 => 170,  451 => 163,  446 => 158,  438 => 156,  436 => 155,  432 => 154,  429 => 153,  425 => 151,  421 => 149,  416 => 146,  408 => 143,  402 => 141,  400 => 140,  397 => 139,  388 => 138,  382 => 137,  376 => 136,  370 => 135,  363 => 134,  360 => 133,  357 => 132,  354 => 131,  350 => 130,  345 => 127,  336 => 126,  328 => 125,  322 => 124,  316 => 123,  312 => 121,  309 => 120,  307 => 119,  304 => 118,  302 => 117,  299 => 116,  297 => 115,  291 => 112,  285 => 111,  282 => 110,  280 => 109,  274 => 106,  267 => 101,  255 => 99,  252 => 98,  249 => 97,  246 => 96,  243 => 95,  241 => 94,  238 => 93,  232 => 92,  218 => 90,  215 => 89,  211 => 88,  208 => 87,  205 => 86,  190 => 84,  185 => 83,  183 => 82,  172 => 80,  168 => 78,  165 => 77,  157 => 74,  154 => 73,  151 => 72,  148 => 71,  144 => 69,  136 => 67,  131 => 64,  120 => 62,  116 => 61,  109 => 58,  107 => 57,  104 => 56,  101 => 55,  99 => 54,  96 => 53,  93 => 52,  91 => 51,  88 => 47,  86 => 46,  83 => 42,  80 => 40,  78 => 39,  75 => 37,  73 => 36,  70 => 34,  68 => 33,  65 => 31,  63 => 30,  61 => 29,  59 => 26,  57 => 25,  54 => 21,  51 => 19,  44 => 15,  42 => 14,  40 => 12,  36 => 11,  34 => 9,  32 => 8,  30 => 7,  28 => 6,  26 => 3,  24 => 2,);
    }
}
