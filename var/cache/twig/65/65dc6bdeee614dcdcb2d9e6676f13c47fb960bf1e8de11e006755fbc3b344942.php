<?php

/* layout.html.twig */
class __TwigTemplate_d6220ec17e41222b82cfc64a876356789ea0fa9d053f53d3282fcf51fc48a85c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>

        ";
        // line 5
        $this->displayBlock('head', $context, $blocks);
        // line 29
        echo "        
    </head>
    
    <body>
   ";
        // line 33
        $this->displayBlock('header', $context, $blocks);
        // line 36
        echo "        
        
   ";
        // line 38
        $this->displayBlock('content', $context, $blocks);
        // line 39
        echo " 
    
   ";
        // line 41
        $this->displayBlock('footer', $context, $blocks);
        // line 44
        echo "
</html>

";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "            <meta charset=\"utf-8\">
            <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            
            <title>";
        // line 10
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

            ";
        // line 13
        echo "             ";
        // line 14
        echo "            ";
        // line 15
        echo "            ";
        // line 16
        echo "
            <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/foundation-6.4.2-complete/css/foundation.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/foundation-6.4.2-complete/css/app.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/normalize.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/script.js"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
            <script src=\"https://use.fontawesome.com/releases/v5.0.0/js/all.js\"></script>




            <script src='https://www.google.com/recaptcha/api.js'></script>
        ";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
        echo "Tequila";
    }

    // line 33
    public function block_header($context, array $blocks = array())
    {
        // line 34
        echo "       ";
        $this->loadTemplate("headerHome.html.twig", "layout.html.twig", 34)->display($context);
        // line 35
        echo "   ";
    }

    // line 38
    public function block_content($context, array $blocks = array())
    {
    }

    // line 41
    public function block_footer($context, array $blocks = array())
    {
        // line 42
        echo "       ";
        $this->loadTemplate("footer.html.twig", "layout.html.twig", 42)->display($context);
        echo "      
   ";
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  134 => 42,  131 => 41,  126 => 38,  122 => 35,  119 => 34,  116 => 33,  110 => 10,  98 => 21,  94 => 20,  90 => 19,  86 => 18,  82 => 17,  79 => 16,  77 => 15,  75 => 14,  73 => 13,  68 => 10,  62 => 6,  59 => 5,  52 => 44,  50 => 41,  46 => 39,  44 => 38,  40 => 36,  38 => 33,  32 => 29,  30 => 5,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>

        {% block head %}
            <meta charset=\"utf-8\">
            <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            
            <title>{% block title %}Tequila{% endblock %}</title>

            {#<link href=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js\"/>#}
             {#<link href=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js\"/>#}
            {#<link href=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js\"/>#}
            {#<link href=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js\"/>#}

            <link href=\"{{ asset('lib/foundation-6.4.2-complete/css/foundation.css') }}\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"{{ asset('lib/foundation-6.4.2-complete/css/app.css') }}\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"{{ asset('lib/normalize.css') }}\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"{{ asset('css/style.css') }}\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"{{ asset('js/script.js') }}\" rel=\"stylesheet\" type=\"text/css\" />
            <script src=\"https://use.fontawesome.com/releases/v5.0.0/js/all.js\"></script>




            <script src='https://www.google.com/recaptcha/api.js'></script>
        {% endblock %}
        
    </head>
    
    <body>
   {% block header %}
       {% include 'headerHome.html.twig' %}
   {% endblock %}
        
        
   {% block content %}{% endblock %}
 
    
   {% block footer %}
       {% include 'footer.html.twig' %}      
   {% endblock %}

</html>

", "layout.html.twig", "C:\\xampp\\htdocs\\Tequila_project\\templates\\layout.html.twig");
    }
}
