<?php

/* content/entries/_edit */
class __TwigTemplate_5034ec338314bf7fdef9b0bfe2e05230 extends Twig_Template
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
        $context["centered"] = true;
        // line 3
        \Blocks\blx()->templates->includeCssResource("css/entry.css");
        // line 4
        \Blocks\blx()->templates->includeJsResource("lib/jquery-ui-1.8.23.custom.min.js");
        // line 5
        $context["forms"] = $this->env->loadTemplate("_includes/forms");
        // line 8
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
            // line 9
            $context["section"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "sections"), "handle", array(0 => (isset($context["sectionHandle"]) ? $context["sectionHandle"] : $this->getContext($context, "sectionHandle"))), "method"), "first");
            // line 10
            if ((!(isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")))) {
                throw new \Blocks\HttpException(404);
            }
            // line 12
            $context["permissionSuffix"] = ("InSection" . $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"));
        } else {
            // line 14
            $context["permissionSuffix"] = "";
        }
        // line 18
        \Blocks\blx()->user->requirePermission(("editEntries" . (isset($context["permissionSuffix"]) ? $context["permissionSuffix"] : $this->getContext($context, "permissionSuffix"))));
        // line 21
        if (((!array_key_exists("entry", $context)) && array_key_exists("entryId", $context))) {
            // line 22
            if (array_key_exists("draftId", $context)) {
                // line 23
                $context["entry"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryRevisions"), "getDraftById", array(0 => (isset($context["draftId"]) ? $context["draftId"] : $this->getContext($context, "draftId"))), "method");
            } elseif (array_key_exists("versionId", $context)) {
                // line 25
                $context["entry"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryRevisions"), "getVersionById", array(0 => (isset($context["versionId"]) ? $context["versionId"] : $this->getContext($context, "versionId"))), "method");
            } else {
                // line 27
                $context["entry"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entries"), "id", array(0 => (isset($context["entryId"]) ? $context["entryId"] : $this->getContext($context, "entryId"))), "method"), "status", array(0 => "*"), "method"), "first");
            }
            // line 30
            if ((!(isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")))) {
                throw new \Blocks\HttpException(404);
            }
        }
        // line 34
        $context["isNewEntry"] = ((!array_key_exists("entry", $context)) || (!$this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "id")));
        // line 37
        if ((isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry"))) {
            // line 38
            \Blocks\blx()->user->requirePermission(("createEntries" . (isset($context["permissionSuffix"]) ? $context["permissionSuffix"] : $this->getContext($context, "permissionSuffix"))));
        } elseif (($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "authorId") != $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id"))) {
            // line 40
            \Blocks\blx()->user->requirePermission(("editPeerEntries" . (isset($context["permissionSuffix"]) ? $context["permissionSuffix"] : $this->getContext($context, "permissionSuffix"))));
        }
        // line 44
        if (((!(isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry"))) && ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "classHandle") == "EntryDraft"))) {
            // line 45
            if (($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "creatorId") != $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id"))) {
                // line 46
                \Blocks\blx()->user->requirePermission(("editPeerEntryDrafts" . (isset($context["permissionSuffix"]) ? $context["permissionSuffix"] : $this->getContext($context, "permissionSuffix"))));
            }
            // line 49
            $context["revisionLabel"] = \Blocks\Blocks::t("Draft {id}", array("id" => (isset($context["draftId"]) ? $context["draftId"] : $this->getContext($context, "draftId"))));
        } elseif (((!(isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry"))) && ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "classHandle") == "EntryVersion"))) {
            // line 51
            $context["revisionLabel"] = \Blocks\Blocks::t("Version {id}", array("id" => (isset($context["versionId"]) ? $context["versionId"] : $this->getContext($context, "versionId"))));
        } else {
            // line 53
            $context["revisionLabel"] = \Blocks\Blocks::t("Current");
        }
        // line 57
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
            // line 58
            $context["blocks"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryBlocks"), "getBlocksBySectionId", array(0 => $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id")), "method");
        } else {
            // line 60
            $context["blocks"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entryBlocks"), "getAllBlocks");
        }
        // line 64
        if ((isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry"))) {
            // line 65
            $context["title"] = \Blocks\Blocks::t("Create a new {section} entry", array("section" => (($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "name")) : (\Blocks\Blocks::t("Blog")))));
        } else {
            // line 67
            $context["title"] = \Blocks\Blocks::t("Editing “{title}”", array("title" => \Blocks\Blocks::t($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "title"))));
            // line 68
            if ((array_key_exists("entry", $context) && ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "classHandle") != "Entry"))) {
                // line 69
                $context["title"] = ((((isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")) . " <span class=\"version\"><span class=\"hidden\">(</span>") . (isset($context["revisionLabel"]) ? $context["revisionLabel"] : $this->getContext($context, "revisionLabel"))) . "<span class=\"hidden\">)</span></span>");
            }
        }
        // line 74
        $context["hasSettingsErrors"] = (array_key_exists("entry", $context) && ((($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "getErrors", array(0 => "slug"), "method") || $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "getErrors", array(0 => "postDate"), "method")) || $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "getErrors", array(0 => "expiryDate"), "method")) || $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "getErrors", array(0 => "tags"), "method")));
        // line 77
        ob_start();
        // line 78
        echo "\t<h1>";
        echo (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"));
        echo "</h1>

\t<ul class=\"left\">
\t\t<li><a href=\"";
        // line 81
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("content"), "html", null, true);
        echo "\" class=\"backbtn\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Entries"), "html", null, true);
        echo "</a></li>
\t</ul>

\t";
        // line 84
        if (((!(isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry"))) && $this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method"))) {
            // line 85
            echo "\t\t<ul class=\"right\">
\t\t\t<li>
\t\t\t\t";
            // line 87
            $this->env->loadTemplate("content/entries/_revisions")->display($context);
            // line 88
            echo "\t\t\t</li>
\t\t</ul>
\t";
        }
        $context["header"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 94
        ob_start();
        // line 95
        echo "\t<li><a class=\"edit icon active\" data-target=\"entry-content\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Content"), "html", null, true);
        echo "</a></li>
\t<li><a class=\"settings icon";
        // line 96
        if ((isset($context["hasSettingsErrors"]) ? $context["hasSettingsErrors"] : $this->getContext($context, "hasSettingsErrors"))) {
            echo " error";
        }
        echo "\" data-target=\"entry-settings\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("Settings"), "html", null, true);
        echo "</a></li>
";
        $context["tabs"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 100
        ob_start();
        // line 101
        echo "\t<form method=\"post\" action=\"\" accept-charset=\"UTF-8\">
\t\t";
        // line 102
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
            // line 103
            echo "\t\t\t<input type=\"hidden\" name=\"sectionId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "id"), "html", null, true);
            echo "\">
\t\t";
        }
        // line 105
        echo "
\t\t";
        // line 106
        if ((!(isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry")))) {
            // line 107
            echo "\t\t\t<input type=\"hidden\" name=\"entryId\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "id"), "html", null, true);
            echo "\">
\t\t";
        }
        // line 109
        echo "
\t\t<div id=\"entry-content\">
\t\t\t";
        // line 111
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t((($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) ? ($this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "titleLabel")) : ("Title"))), "id" => "title", "name" => "title", "value" => ((array_key_exists("entry", $context)) ? ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "title")) : (null)), "errors" => ((array_key_exists("entry", $context)) ? ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "getErrors", array(0 => "title"), "method")) : (null)), "autofocus" => true, "required" => true));
        // line 119
        echo "

\t\t\t";
        // line 121
        $this->env->loadTemplate("_includes/blockfields")->display(array("blocks" => (isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks")), "entity" => ((array_key_exists("entry", $context)) ? ((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry"))) : (null))));
        // line 125
        echo "\t\t</div>

\t\t<div id=\"entry-settings\" class=\"hidden\">
\t\t\t";
        // line 128
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Slug"), "id" => "slug", "name" => "slug", "value" => ((array_key_exists("entry", $context)) ? ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "slug")) : (null)), "errors" => ((array_key_exists("entry", $context)) ? ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "getErrors", array(0 => "slug"), "method")) : (null)), "required" => true));
        // line 135
        echo "

\t\t\t";
        // line 137
        if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "Users"), "method")) {
            // line 138
            echo "\t\t\t\t";
            echo $context["forms"]->getselectField(array("label" => \Blocks\Blocks::t("Author"), "id" => "author", "name" => "author", "options" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "users"), "indexBy", array(0 => "id"), "method"), "find"), "value" => ((array_key_exists("entry", $context)) ? ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "authorId")) : ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id")))));
            // line 144
            echo "
\t\t\t";
        }
        // line 146
        echo "
\t\t\t";
        // line 147
        echo $context["forms"]->getdateField(array("label" => \Blocks\Blocks::t("Post Date"), "instructions" => \Blocks\Blocks::t("When should the entry go live? (Set automatically if left blank)"), "id" => "postDate", "name" => "postDate", "value" => (((array_key_exists("entry", $context) && $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "postDate"))) ? ($this->getAttribute($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "postDate"), "w3cDate")) : (null)), "errors" => ((array_key_exists("entry", $context)) ? ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "getErrors", array(0 => "postDate"), "method")) : (null))));
        // line 154
        echo "

\t\t\t";
        // line 156
        echo $context["forms"]->getdateField(array("label" => \Blocks\Blocks::t("Expiration Date"), "instructions" => \Blocks\Blocks::t("When should the entry expire?"), "id" => "expiryDate", "name" => "expiryDate", "value" => (((array_key_exists("entry", $context) && $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "expiryDate"))) ? ($this->getAttribute($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "expiryDate"), "w3cDate")) : (null)), "errors" => ((array_key_exists("entry", $context)) ? ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "getErrors", array(0 => "expiryDate"), "method")) : (null))));
        // line 163
        echo "

\t\t\t";
        // line 165
        echo $context["forms"]->gettextField(array("label" => \Blocks\Blocks::t("Tags"), "instructions" => \Blocks\Blocks::t("List multiple tags separated by commas."), "id" => "tags", "name" => "tags", "value" => ((array_key_exists("entry", $context)) ? (twig_join_filter($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "tags"), ", ")) : (null)), "errors" => ((array_key_exists("entry", $context)) ? ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "getErrors", array(0 => "tags"), "method")) : (null))));
        // line 172
        echo "

\t\t\t";
        // line 174
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "can", array(0 => ("publishEntries" . (isset($context["permissionSuffix"]) ? $context["permissionSuffix"] : $this->getContext($context, "permissionSuffix")))), "method")) {
            // line 175
            echo "\t\t\t\t";
            ob_start();
            // line 176
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Status:"), "html", null, true);
            echo " <i>";
            echo twig_escape_filter($this->env, (((isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry"))) ? (\Blocks\Blocks::t("Never saved")) : (\Blocks\Blocks::t(ucfirst($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "status"))))), "html", null, true);
            echo "</i>";
            $context["statusLabel"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 178
            echo "\t\t\t\t";
            ob_start();
            // line 179
            echo "\t\t\t\t\t";
            echo $context["forms"]->getcheckboxField(array("label" => "Entry is enabled", "name" => "enabled", "checked" => ((array_key_exists("entry", $context)) ? ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "enabled")) : (true))));
            // line 183
            echo "
\t\t\t\t";
            $context["statusInput"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 185
            echo "\t\t\t\t";
            echo $context["forms"]->getfield(array("label" => (isset($context["statusLabel"]) ? $context["statusLabel"] : $this->getContext($context, "statusLabel")), "instructions" => \Blocks\Blocks::t("An entry is only “live” if it is enabled, has a Post Date in the past, and an Expiration Date in the future.")), (isset($context["statusInput"]) ? $context["statusInput"] : $this->getContext($context, "statusInput")));
            // line 188
            echo "
\t\t\t";
        }
        // line 190
        echo "\t\t</div>

\t\t<hr>

\t\t<div class=\"buttons\">
\t\t\t";
        // line 195
        if (((!(isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry"))) && ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "classHandle") == "EntryDraft"))) {
            // line 196
            echo "
\t\t\t\t<input type=\"hidden\" name=\"action\" value=\"entryRevisions/saveDraft\">
\t\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"";
            // line 198
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "cpEditUrl"), "html", null, true);
            echo "/drafts/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "draftId"), "html", null, true);
            echo "\">
\t\t\t\t<input type=\"hidden\" name=\"draftId\" value=\"";
            // line 199
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "draftId"), "html", null, true);
            echo "\">
\t\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
            // line 200
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save Draft"), "html", null, true);
            echo "\">

\t\t\t\t";
            // line 202
            if (($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "can", array(0 => ("publishEntries" . (isset($context["permissionSuffix"]) ? $context["permissionSuffix"] : $this->getContext($context, "permissionSuffix")))), "method") && (($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "creatorId") == $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id")) || $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "can", array(0 => ("publishPeerEntryDrafts" . (isset($context["permissionSuffix"]) ? $context["permissionSuffix"] : $this->getContext($context, "permissionSuffix")))), "method")))) {
                // line 203
                echo "\t\t\t\t\t<input type=\"button\" class=\"btn formsubmit\" value=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Publish Draft"), "html", null, true);
                echo "\" data-action=\"entryRevisions/publishDraft\" data-redirect=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "cpEditUrl"), "html", null, true);
                echo "\">
\t\t\t\t";
            }
            // line 205
            echo "
\t\t\t";
        } elseif (((!(isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry"))) && ($this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "classHandle") == "EntryVersion"))) {
            // line 207
            echo "

\t\t\t";
        } else {
            // line 210
            echo "
\t\t\t\t";
            // line 211
            if ((((isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry")) || (!$this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "enabled"))) || $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "can", array(0 => ("publishEntries" . (isset($context["permissionSuffix"]) ? $context["permissionSuffix"] : $this->getContext($context, "permissionSuffix")))), "method"))) {
                // line 212
                echo "\t\t\t\t\t<input type=\"hidden\" name=\"action\" value=\"entries/saveEntry\">
\t\t\t\t\t";
                // line 213
                if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
                    // line 214
                    echo "\t\t\t\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"content/";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "handle"), "html", null, true);
                    echo "/{entryId}\">
\t\t\t\t\t";
                } else {
                    // line 216
                    echo "\t\t\t\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"content/blog/{entryId}\">
\t\t\t\t\t";
                }
                // line 218
                echo "\t\t\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save"), "html", null, true);
                echo "\">

\t\t\t\t\t";
                // line 220
                if (((!(isset($context["isNewEntry"]) ? $context["isNewEntry"] : $this->getContext($context, "isNewEntry"))) && $this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method"))) {
                    // line 221
                    echo "\t\t\t\t\t\t<input type=\"button\" class=\"btn formsubmit\" value=\"";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save as Draft"), "html", null, true);
                    echo "\" value=\"entryRevisions/createDraft\" data-action=\"entryRevisions/saveDraft\" data-redirect=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "cpEditUrl"), "html", null, true);
                    echo "/drafts/{draftId}\">
\t\t\t\t\t";
                }
                // line 223
                echo "\t\t\t\t";
            } else {
                // line 224
                echo "\t\t\t\t\t";
                if ($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "hasPackage", array(0 => "PublishPro"), "method")) {
                    // line 225
                    echo "\t\t\t\t\t\t<input type=\"hidden\" name=\"action\" value=\"entryRevisions/createDraft\">
\t\t\t\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"";
                    // line 226
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "cpEditUrl"), "html", null, true);
                    echo "/drafts/{draftId}\">
\t\t\t\t\t\t<input type=\"submit\" class=\"btn submit\" value=\"";
                    // line 227
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Save as Draft"), "html", null, true);
                    echo "\">
\t\t\t\t\t";
                }
                // line 229
                echo "\t\t\t\t";
            }
            // line 230
            echo "\t\t\t";
        }
        // line 231
        echo "\t\t</div>
\t</form>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 236
        if (((!array_key_exists("entry", $context)) || (!$this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "slug")))) {
            // line 237
            \Blocks\blx()->templates->includeJs("new Blocks.ui.SlugGenerator('#title', '#slug');");
        }
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "content/entries/_edit";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  381 => 237,  379 => 236,  374 => 231,  371 => 230,  368 => 229,  363 => 227,  359 => 226,  356 => 225,  353 => 224,  350 => 223,  342 => 221,  340 => 220,  334 => 218,  330 => 216,  324 => 214,  322 => 213,  319 => 212,  317 => 211,  314 => 210,  309 => 207,  305 => 205,  297 => 203,  295 => 202,  290 => 200,  286 => 199,  280 => 198,  276 => 196,  274 => 195,  267 => 190,  263 => 188,  260 => 185,  256 => 183,  253 => 179,  250 => 178,  244 => 176,  241 => 175,  239 => 174,  235 => 172,  233 => 165,  229 => 163,  227 => 156,  223 => 154,  221 => 147,  218 => 146,  214 => 144,  211 => 138,  209 => 137,  205 => 135,  203 => 128,  198 => 125,  196 => 121,  192 => 119,  190 => 111,  186 => 109,  180 => 107,  178 => 106,  175 => 105,  169 => 103,  167 => 102,  164 => 101,  162 => 100,  153 => 96,  148 => 95,  146 => 94,  140 => 88,  138 => 87,  134 => 85,  132 => 84,  124 => 81,  117 => 78,  115 => 77,  113 => 74,  109 => 69,  107 => 68,  105 => 67,  102 => 65,  100 => 64,  97 => 60,  94 => 58,  92 => 57,  89 => 53,  86 => 51,  83 => 49,  80 => 46,  78 => 45,  76 => 44,  73 => 40,  70 => 38,  68 => 37,  66 => 34,  61 => 30,  58 => 27,  55 => 25,  52 => 23,  50 => 22,  48 => 21,  46 => 18,  43 => 14,  40 => 12,  36 => 10,  34 => 9,  32 => 8,  30 => 5,  28 => 4,  26 => 3,  24 => 2,);
    }
}
