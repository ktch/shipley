<?php

/* _includes/blockindex */
class __TwigTemplate_133ac446949132bed1a6a5180a0b1bc8 extends Twig_Template
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
        echo "<p id=\"noblocks\"";
        if (twig_length_filter($this->env, (isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks")))) {
            echo " class=\"hidden\"";
        }
        echo ">
\t";
        // line 2
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("No blocks exist yet."), "html", null, true);
        echo "
</p>

";
        // line 5
        if (twig_length_filter($this->env, (isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks")))) {
            // line 6
            echo "\t";
            $context["sortable"] = (twig_length_filter($this->env, (isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks"))) > 1);
            // line 7
            echo "
\t<table id=\"blocks\" class=\"data\">
\t\t<thead>
\t\t\t<th scope=\"col\" width=\"33%\">";
            // line 10
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Name"), "html", null, true);
            echo "</th>
\t\t\t<th scope=\"col\" width=\"33%\">";
            // line 11
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Handle"), "html", null, true);
            echo "</th>
\t\t\t<th scope=\"col\" width=\"33%\">";
            // line 12
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Type"), "html", null, true);
            echo "</th>
\t\t\t";
            // line 13
            if ((isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))) {
                echo "<td class=\"thin\"></td>";
            }
            // line 14
            echo "\t\t\t<td class=\"thin\"></td>
\t\t</thead>
\t\t<tbody>
\t\t\t";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["blocks"]) ? $context["blocks"] : $this->getContext($context, "blocks")));
            foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
                // line 18
                echo "\t\t\t\t<tr data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id"), "html", null, true);
                echo "\" data-name=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "name")), "html", null, true);
                echo "\">
\t\t\t\t\t<th scope=\"row\"><a href=\"";
                // line 19
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(((isset($context["settingsUrlPrefix"]) ? $context["settingsUrlPrefix"] : $this->getContext($context, "settingsUrlPrefix")) . $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "name")), "html", null, true);
                echo "</a>";
                // line 20
                if ($this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "required")) {
                    echo " <span class=\"required\"></span>";
                }
                // line 21
                echo "</th>
\t\t\t\t\t<td><code>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "handle"), "html", null, true);
                echo "</code></td>
\t\t\t\t\t<td>
\t\t\t\t\t\t";
                // line 24
                $context["blockType"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "blockTypes"), "populateBlockType", array(0 => (isset($context["block"]) ? $context["block"] : $this->getContext($context, "block"))), "method");
                // line 25
                echo "\t\t\t\t\t\t";
                if ((isset($context["blockType"]) ? $context["blockType"] : $this->getContext($context, "blockType"))) {
                    // line 26
                    echo "\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["blockType"]) ? $context["blockType"] : $this->getContext($context, "blockType")), "name"), "html", null, true);
                    echo "
\t\t\t\t\t\t";
                } else {
                    // line 28
                    echo "\t\t\t\t\t\t\t<span class=\"error\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : $this->getContext($context, "block")), "type"), "html", null, true);
                    echo "</span>
\t\t\t\t\t\t";
                }
                // line 30
                echo "\t\t\t\t\t</td>
\t\t\t\t\t";
                // line 31
                if ((isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))) {
                    echo "<td class=\"thin\"><a class=\"move icon\" title=\"";
                    echo twig_escape_filter($this->env, \Blocks\Blocks::t("Reorder"), "html", null, true);
                    echo "\"></a></td>";
                }
                // line 32
                echo "\t\t\t\t\t<td class=\"thin\"><a class=\"delete icon\" title=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Delete"), "html", null, true);
                echo "\"></a></td>
\t\t\t\t</tr>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 35
            echo "\t\t</tbody>
\t</table>
";
        }
        // line 38
        echo "
<div class=\"buttons\">
\t<a href=\"";
        // line 40
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(((isset($context["settingsUrlPrefix"]) ? $context["settingsUrlPrefix"] : $this->getContext($context, "settingsUrlPrefix")) . "new")), "html", null, true);
        echo "\" class=\"btn add icon\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("New Block"), "html", null, true);
        echo "</a>
</div>


";
        // line 44
        ob_start();
        // line 45
        echo "\tnew Blocks.ui.AdminTable({
\t\ttableSelector: '#blocks',
\t\tnoObjectsSelector: '#noblocks',
\t\tsortable: true,
\t\treorderAction: '";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["controller"]) ? $context["controller"] : $this->getContext($context, "controller")), "html", null, true);
        echo "/reorderBlocks',
\t\tdeleteAction: '";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["controller"]) ? $context["controller"] : $this->getContext($context, "controller")), "html", null, true);
        echo "/deleteBlock'
\t});
";
        $context["js"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 53
        \Blocks\blx()->templates->includeJs((isset($context["js"]) ? $context["js"] : $this->getContext($context, "js")));
    }

    public function getTemplateName()
    {
        return "_includes/blockindex";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 53,  157 => 50,  153 => 49,  147 => 45,  145 => 44,  136 => 40,  132 => 38,  127 => 35,  117 => 32,  111 => 31,  108 => 30,  102 => 28,  96 => 26,  93 => 25,  91 => 24,  86 => 22,  83 => 21,  79 => 20,  74 => 19,  67 => 18,  63 => 17,  58 => 14,  54 => 13,  50 => 12,  46 => 11,  42 => 10,  34 => 6,  32 => 5,  19 => 1,  47 => 16,  45 => 15,  37 => 7,  30 => 7,  28 => 6,  26 => 2,  24 => 2,);
    }
}
