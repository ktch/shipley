<?php

/*  */
class __TwigTemplate_33afe9cf7b08eaa76016f0d5c9f9180c extends Twig_Template
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
        echo "<!DOCTYPE html>
<!--[if lt IE 7 ]><html class=\"ie ie6\" lang=\"en\"> <![endif]-->
<!--[if IE 7 ]><html class=\"ie ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 8 ]><html class=\"ie ie8\" lang=\"en\"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang=\"en\"> <!--<![endif]-->
<head>

\t<!-- Basic Page Needs
  ================================================== -->
\t<meta charset=\"utf-8\">
\t<title>A Shipley Street Story</title>
\t<meta name=\"description\" content=\"\">
\t<meta name=\"author\" content=\"\">

\t<!-- Mobile Specific Metas
  ================================================== -->
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">

\t<!-- CSS
  ================================================== -->
  \t<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
  \t<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
\t<link rel=\"stylesheet\" href=\"stylesheets/base.css\">
\t<link rel=\"stylesheet\" href=\"stylesheets/skeleton.css\">
\t<link rel=\"stylesheet\" href=\"stylesheets/flexslider.css\">
\t<link rel=\"stylesheet\" href=\"stylesheets/prettyPhoto.css\">
\t<link rel=\"stylesheet\" href=\"stylesheets/layout.css\">
\t

\t<!--[if lt IE 9]>
\t\t<script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
\t<![endif]-->

\t<!-- Favicons
\t================================================== -->
\t<link rel=\"shortcut icon\" href=\"images/favicon.ico\">
\t<link rel=\"apple-touch-icon\" href=\"images/apple-touch-icon.png\">
\t<link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"images/apple-touch-icon-72x72.png\">
\t<link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"images/apple-touch-icon-114x114.png\">

</head>
<body>

\t<!-- Primary Page Layout
\t================================================== -->
\t
\t
\t<div id=\"intro\">
\t
\t\t<div class=\"bg1\"></div>
\t\t
\t\t<div class=\"title\">
\t\t\t<div class=\"intro-line\"></div>
\t\t\t<h1 class=\"small\">A Shipley Street Story</h1>
\t\t\t<div class=\"intro-line\"></div>
\t\t\t<p>The legacy of Chris White</p>
\t\t\t
\t\t</div> <!-- end title -->
\t</div> <!-- end intro -->
\t
\t
\t<nav>
\t\t<ul>
\t\t\t<li><a href=\"#intro\">Top</a></li>
\t\t\t<li><a href=\"#work\">The Story</a></li>
\t\t\t<li><a href=\"#services\">The Plan</a></li>
\t\t\t<li><a href=\"#about\">The Team</a></li>
\t\t\t<li><a href=\"#contact\">Get Involved</a></li>
\t\t</ul>
\t\t
\t\t<select name=\"dropdpown\" size=\"1\" onChange=\"scrollTo(this.value)\">
\t\t\t<option value=\"\" selected=\"selected\">Menu</option>
\t\t\t<option value=\"#intro\">Top</option>
\t\t\t<option value=\"#work\">The Story</option>
\t\t\t<option value=\"#services\">The Plan</option> 
\t\t\t<option value=\"#about\">The Team</option> 
\t\t\t<option value=\"#contact\">Get Involved</option> 
\t\t</select>
\t</nav>
\t
\t
\t<div id=\"work\">
\t\t<div class=\"container\">
\t\t
\t\t\t<div class=\"sixteen columns\">
\t\t\t\t<h2><span class=\"lines\">The Story</span></h2>
\t\t\t</div> <!-- end sixteen columns -->
\t\t\t
\t\t\t<div class=\"eight columns\">
                ";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "storyLeft"), "html", null, true);
        echo "
\t\t\t</div> 
\t\t\t
\t\t\t<div class=\"eight columns\">
                ";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "storyRight"), "html", null, true);
        echo "
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"clear\"></div>
\t\t\t
\t\t\t
\t\t\t
\t\t</div> <!-- end container -->
\t</div> <!-- work -->
\t
\t
\t<div id=\"separator1\">
\t\t<div class=\"bg2\"></div>
        <p class=\"separator\">";
        // line 107
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "gap1"), "html", null, true);
        echo "</p>
\t</div>
\t
\t
\t<div id=\"services\">
\t\t<div class=\"container\">
\t\t
\t\t\t<div class=\"sixteen columns\">
\t\t\t\t<h2 class=\"white\"><span class=\"lines\">The Plan</span></h2>
\t\t\t</div> <!-- end sixteen columns -->
\t\t\t
\t\t\t<div class=\"clear\"></div>
\t\t\t
\t\t\t<div class=\"eight columns\">
                ";
        // line 121
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "planLeft"), "html", null, true);
        echo "
\t\t\t</div> 
\t\t\t
\t\t\t<div class=\"eight columns\">
                ";
        // line 125
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "planRight"), "html", null, true);
        echo "
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"clear\"></div>
\t\t\t
\t\t\t<div class=\"serv-list\">
\t\t\t\t<div class=\"one-third column\">
                    <h4>";
        // line 132
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "step1Heading"), "html", null, true);
        echo "</h4>
\t\t\t\t\t<img src=\"\" alt=\"\" />
                    <p class=\"white\">";
        // line 134
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "step1"), "html", null, true);
        echo "</p>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"one-third column\">
                    <h4>";
        // line 138
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "step2Heading"), "html", null, true);
        echo "</h4>
\t\t\t\t\t<img src=\"\" alt=\"\" />
                    <p class=\"white\">";
        // line 140
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "step2"), "html", null, true);
        echo "</p>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"one-third column\">
                    <h4>";
        // line 144
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "step3Heading"), "html", null, true);
        echo "</h4>
\t\t\t\t\t<img src=\"\" alt=\"\" />
                    <p class=\"white\">";
        // line 146
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "step3"), "html", null, true);
        echo "</p>
\t\t\t\t</div>
\t\t\t</div> <!-- end serv-list -->
\t\t\t
\t\t\t<div class=\"clear\"></div>
\t\t\t
\t\t</div> <!-- end container -->
\t</div> <!-- end services -->
\t
\t
\t<div id=\"separator2\">
\t\t<div class=\"bg3\"></div>
        <p class=\"separator\">";
        // line 158
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["globals"]) ? $context["globals"] : $this->getContext($context, "globals")), "gap2"), "html", null, true);
        echo "</p>
\t</div>
\t
\t
\t<div id=\"about\">
\t\t<div class=\"container\">
\t\t
\t\t\t<div class=\"sixteen columns\">
\t\t\t\t<h2><span class=\"lines\">The Team</span></h2>
\t\t\t</div> <!-- end sixteen columns -->
\t\t
\t\t\t
\t\t\t<div class=\"team\">
\t\t\t
                ";
        // line 172
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["blx"]) ? $context["blx"] : $this->getContext($context, "blx")), "entries"), "section", array(0 => "team"), "method"), "find", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 173
            echo "\t\t\t\t<div class=\"one-third column\">
                    <img src=\"http://s3.amazonaws.com/shipley/";
            // line 174
            echo twig_escape_filter($this->env, _twig_default_filter(twig_join_filter($this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "image")), "images/about-pic.png"), "html", null, true);
            echo "\" alt=\"\" />
                    <p class=\"t-name\">";
            // line 175
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "title"), "html", null, true);
            echo "</p>
                    <p class=\"t-type\">";
            // line 176
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "job"), "html", null, true);
            echo "</p>
\t\t\t\t\t<!-- <ul>
\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"images/icn-twitter.png\" alt=\"\" /></a></li>
\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"images/icn-facebook.png\" alt=\"\" /></a></li>
\t\t\t\t\t\t\t\t\t\t</ul> -->
                    <p>";
            // line 181
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : $this->getContext($context, "member")), "description"), "html", null, true);
            echo "</p>
\t\t\t\t</div> <!-- end one-third column -->
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 184
        echo "\t\t\t\t
\t\t\t\t
\t\t\t</div> <!-- end team -->
\t\t\t
\t\t\t<div class=\"clear\"></div>
\t\t\t
\t\t\t
\t\t</div> <!-- end container -->
\t</div> <!-- end about -->
\t
\t
\t<div id=\"separator3\">
\t\t<div class=\"bg4\"></div>
\t\t<p class=\"separator\">Living spiritually, bridging divides, giving voice to the voiceless</p>
\t</div>
\t
\t
\t<div id=\"contact\">
\t\t<div class=\"container\">
\t\t
\t\t\t<div class=\"sixteen columns\">
\t\t\t\t<h2 class=\"white\"><span class=\"lines\">Get Involved</span></h2>
\t\t\t</div> <!-- end sixteen columns -->
\t\t\t
\t\t\t<div class=\"sixteen columns\">
\t\t\t\t<p class=\"white\">We need help to get this story out there. Let us know if you'd like to partner with us to help make this film happen.</p>
\t\t\t</div> 
\t\t\t
\t\t\t<div class=\"clear\"></div>
\t\t\t
\t\t\t<div class=\"eight columns\">
\t\t\t\t<div class=\"contact-form\">
\t\t\t\t\t
\t\t\t\t\t<div class=\"done\">
\t\t\t\t\t\t<b>Thank you!</b> We have received your message. 
\t\t\t\t\t</div>
\t\t\t\t
\t\t\t\t\t<form method=\"post\" action=\"process.php\">
\t\t\t\t\t\t<p>name</p>
\t\t\t\t\t\t<input type=\"text\" name=\"name\" class=\"text\" />
\t\t\t\t\t\t
\t\t\t\t\t\t<p>email</p>
\t\t\t\t\t\t<input type=\"text\" name=\"email\" class=\"text\" id=\"email\" />

\t\t\t\t\t\t<p>message</p>
\t\t\t\t\t\t<textarea name=\"comment\" class=\"text\"></textarea>

\t\t\t\t\t\t<input type=\"submit\" id=\"submit\" value=\"send\" class=\"submit-button\" />
\t\t\t\t\t</form>
\t\t\t\t\t\t
\t\t\t\t</div> <!-- end contact-form -->
\t\t\t</div> <!-- end eight columns -->
\t\t\t
\t\t\t<div class=\"eight columns\">
\t\t\t\t
\t\t\t\t<div class=\"contact-info\">
\t\t\t\t\t
\t\t\t\t\t<h5>Contact Info</h5>
\t\t\t\t
\t\t\t\t\t<p class=\"white\"><img src=\"images/icn-phone.png\" alt=\"\" /> (302) 397-8472</p>
\t\t\t\t\t<p class=\"white\"><img src=\"images/icn-email.png\" alt=\"\" /> thecreativevisionfactory@gmail.com</p>
\t\t\t\t\t<p class=\"white\"><img src=\"images/icn-address.png\" alt=\"\" /> 617 N Shipley Street <br />
\t\t\t\t\t\tWilmington, DE</p>
\t\t\t\t</div> <!-- end contact-info -->
\t\t\t\t
\t\t\t\t<!-- <div class=\"social\">
\t\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"images/icn-twitter2.png\" alt=\"\" /></a></li>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\"><img src=\"images/icn-facebook2.png\" alt=\"\" /></a></li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</div> <!-- end social --> -->
\t\t\t\t
\t\t\t</div> <!-- end eight columns -->
\t\t\t
\t\t\t<div class=\"clear\"></div>
\t\t\t
\t\t\t<div class=\"sixteen columns\">
\t\t\t\t<div class=\"copyright\">
\t\t\t\t\t<p>&copy; the Kitchen 2012 All Rights Reserved</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t
\t\t</div> <!-- end container -->
\t\t
\t</div> <!-- end contact -->
\t

\t


\t<!-- JS
\t================================================== -->
\t<script src=\"http://code.jquery.com/jquery-1.7.2.min.js\"></script>
\t<script src=\"javascripts/jquery.sticky.js\" type=\"text/javascript\"></script>
\t<script src=\"javascripts/nbw-parallax.js\" type=\"text/javascript\"></script>
\t<script src=\"javascripts/jquery.inview.js\" type=\"text/javascript\"></script>
\t<script src=\"javascripts/smooth-scroll.js\" type=\"text/javascript\"></script>
\t<script src=\"javascripts/jquery.flexslider.js\" type=\"text/javascript\"></script>
\t<script src=\"javascripts/jquery.prettyPhoto.js\" type=\"text/javascript\"></script>
\t<script src=\"contact-form.js\"></script>
\t
\t<!-- Sticky nav -->
\t<script>
\t\t\$(document).ready(function(){
\t\t\t\$(\"nav\").sticky({topSpacing:0});
\t\t});
\t</script>
\t
\t
\t<!-- dropdown menu -->
\t<script type=\"text/javascript\">
    \tfunction scrollTo(target){
        \tvar targetPosition = \$(target).offset().top;
        \t\$('html,body').animate({ scrollTop: targetPosition}, 'slow');
        }
    </script>
\t
\t
\t
\t<!-- slider -->
\t<script>
\t\t\$(window).load(function() {
\t\t\t\$('.flexslider').flexslider({
\t\t\t\tanimation: \"slide\",
\t\t\t\tslideshow: true,
\t\t\t\tslideshowSpeed: 3500,
\t\t\t\tanimationSpeed: 1000
\t\t\t});
\t\t});
\t</script>
\t
\t<!-- pretty photo 
\t<script>
\t\t\$(document).ready(function(){
\t\t\t\$(\"a[class^='prettyPhoto']\").prettyPhoto({
\t\t\t\tsocial_tools: false,
\t\t\t\ttheme: 'light_square'
\t\t\t});
\t\t});
\t</script>
\t-->
\t
\t<script type=\"text/javascript\" charset=\"utf-8\">
\t\t\$(document).ready(function(){
\t\t\t\$(\"a[rel^='prettyPhoto']\").prettyPhoto({
\t\t\t\tsocial_tools: false,
\t\t\t\ttheme: 'light_square'
\t\t\t});
\t\t});
\t</script>


<!-- End Document
================================================== -->
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 184,  251 => 181,  243 => 176,  239 => 175,  235 => 174,  232 => 173,  228 => 172,  211 => 158,  196 => 146,  191 => 144,  184 => 140,  179 => 138,  172 => 134,  167 => 132,  157 => 125,  150 => 121,  133 => 107,  117 => 94,  110 => 90,  19 => 1,);
    }
}
