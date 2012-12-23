<?php

/* settings/assets/sizes */
class __TwigTemplate_75412e2c03853cd1dff570eaaab650b3 extends Twig_Template
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
        $context["page"] = "sizes";
        // line 3
        $context["title"] = \Blocks\Blocks::t("Asset Sizes");
        // line 4
        $context["sizes"] = $this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "assets"), "getAllAssetSizes");
        // line 7
        ob_start();
        // line 8
        echo "<p id=\"nosizes\"";
        if (twig_length_filter($this->env, (isset($context["sizes"]) ? $context["sizes"] : $this->getContext($context, "sizes")))) {
            echo " class=\"hidden\"";
        }
        echo ">
    ";
        // line 9
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("No Asset sizes exist yet."), "html", null, true);
        echo "
</p>

";
        // line 12
        if (twig_length_filter($this->env, (isset($context["sizes"]) ? $context["sizes"] : $this->getContext($context, "sizes")))) {
            // line 13
            echo "    <table id=\"sizes\" class=\"data\">
        <thead>
        <th scope=\"col\">";
            // line 15
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Name"), "html", null, true);
            echo "</th>
        <th scope=\"col\">";
            // line 16
            echo twig_escape_filter($this->env, \Blocks\Blocks::t("Dimensions"), "html", null, true);
            echo "</th>
        <td class=\"thin\"></td>
        </thead>
        <tbody>
        ";
            // line 20
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["sizes"]) ? $context["sizes"] : $this->getContext($context, "sizes")));
            foreach ($context['_seq'] as $context["_key"] => $context["size"]) {
                // line 21
                echo "            <tr data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "id"), "html", null, true);
                echo "\" data-name=\"";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "name")), "html", null, true);
                echo "\">
                <th scope=\"row\"><a href=\"";
                // line 22
                echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl(("settings/assets/sizes/" . $this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "handle"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, \Blocks\Blocks::t($this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "name")), "html", null, true);
                echo "</a></th>
                <th scope=\"row\">";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "width"), "html", null, true);
                echo " x ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")), "height"), "html", null, true);
                echo "</th>
                <td class=\"thin\"><a class=\"delete icon\" title=\"";
                // line 24
                echo twig_escape_filter($this->env, \Blocks\Blocks::t("Delete"), "html", null, true);
                echo "\"></a></td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['size'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 27
            echo "        </tbody>
    </table>
";
        }
        // line 30
        echo "
<div class=\"buttons\">
    <a class=\"btn add icon\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, \Blocks\UrlHelper::getUrl("settings/assets/sizes/new"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, \Blocks\Blocks::t("New Size"), "html", null, true);
        echo "</a>
</div>
";
        $context["content"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "settings/assets/sizes";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 32,  99 => 30,  94 => 27,  85 => 24,  79 => 23,  73 => 22,  66 => 21,  62 => 20,  55 => 16,  51 => 15,  47 => 13,  45 => 12,  39 => 9,  32 => 8,  30 => 7,  28 => 4,  26 => 3,  24 => 2,);
    }
}
