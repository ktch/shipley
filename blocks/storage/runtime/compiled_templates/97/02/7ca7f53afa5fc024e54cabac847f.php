<?php

/* _layouts/message */
class __TwigTemplate_97027ca7f53afa5fc024e54cabac847f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("_layouts/base");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "_layouts/base";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        ob_start();
        // line 4
        echo "\t<div class=\"message-container\">
\t\t<div id=\"message\" class=\"pane\">
\t\t\t";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : $this->getContext($context, "content")), "html", null, true);
        echo "
\t\t</div>

\t\t<script type=\"text/javascript\">
\t\t\tvar message = document.getElementById('message'),
\t\t\t\tmargin = -Math.round(message.offsetHeight / 2);
\t\t\tmessage.setAttribute('style', 'margin-top: '+margin+'px !important;');
\t\t</script>
\t</div>
";
        $context["body"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "_layouts/message";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 6,  33 => 6,  28 => 5,  26 => 4,  24 => 3,);
    }
}
