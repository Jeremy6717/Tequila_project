<?php

/* report.html.twig */
class __TwigTemplate_6cc1e3baacf29c013ef119d9cb7b57c119395918945a6bc8e7f5e02f9293e65a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "report.html.twig", 1);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->loadTemplate("headerReport.html.twig", "report.html.twig", 4)->display($context);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
    <div class=\"intro\">
        <h3>Simple to use. More power than you can imagine.</h3>
        <p>Analyze and Present your Data at the Click of a Button!
            <br> Create and publish reports and graphs, and share them with your team. On the move, these mobile reporting tools will help you quickly turn your data into clear, easy-to-use visualizations.
            <br><br>Start analyzing your data with just one click! </p>
    </div>

    <div class=\"grid-container\">
        <div class=\"grid-x grid-padding-x footer\">

                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"fas fa-chart-line btnFa\"><a href=\"";
        // line 20
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("stock");
        echo "\"></a></i></div>
                    <div><a class=\"button large btnReport\" href=\"";
        // line 21
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("stock");
        echo "\">Stock</a></div>
                </div>
                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"far fa-money-bill-alt btnFa\"><a href=\"";
        // line 24
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("orderlines");
        echo "\"></a></i></div>
                    <div><a class=\"button large btnReport\" href=\"";
        // line 25
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("orderlines");
        echo "\">Sales</a></div>
                </div>
                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"fas fa-list btnFa\"></i></div>
                    <div><a class=\"button large btnReport\" href=\"";
        // line 29
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("category");
        echo "\">Category</a></div>
                </div>
                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"fas fa-shopping-cart btnFa\"></i></div>
                    <div><a class=\"button large btnReport\" href=\"";
        // line 33
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("order");
        echo "\">Orders</a></div>
                </div>
                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"fas fa-cubes btnFa\"></i></div>
                    <div><a class=\"button large btnReport\" href=\"";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("product");
        echo "\">Product</a></div>
                </div>
                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"fas fa-user btnFa\"></i></div>
                    <div><a class=\"button large btnReport\" href=\"";
        // line 41
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("marketing");
        echo "\">Marketing</a></div>
                </div>

        </div>
    </div>

";
    }

    // line 49
    public function block_footer($context, array $blocks = array())
    {
        // line 50
        echo "    ";
        $this->loadTemplate("footer.html.twig", "report.html.twig", 50)->display($context);
    }

    public function getTemplateName()
    {
        return "report.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 50,  108 => 49,  97 => 41,  90 => 37,  83 => 33,  76 => 29,  69 => 25,  65 => 24,  59 => 21,  55 => 20,  41 => 8,  38 => 7,  33 => 4,  30 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %}

{% block header %}
    {% include 'headerReport.html.twig' %}
{% endblock %}

{% block content %}

    <div class=\"intro\">
        <h3>Simple to use. More power than you can imagine.</h3>
        <p>Analyze and Present your Data at the Click of a Button!
            <br> Create and publish reports and graphs, and share them with your team. On the move, these mobile reporting tools will help you quickly turn your data into clear, easy-to-use visualizations.
            <br><br>Start analyzing your data with just one click! </p>
    </div>

    <div class=\"grid-container\">
        <div class=\"grid-x grid-padding-x footer\">

                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"fas fa-chart-line btnFa\"><a href=\"{{ path (\"stock\") }}\"></a></i></div>
                    <div><a class=\"button large btnReport\" href=\"{{ path (\"stock\") }}\">Stock</a></div>
                </div>
                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"far fa-money-bill-alt btnFa\"><a href=\"{{ path (\"orderlines\") }}\"></a></i></div>
                    <div><a class=\"button large btnReport\" href=\"{{ path (\"orderlines\") }}\">Sales</a></div>
                </div>
                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"fas fa-list btnFa\"></i></div>
                    <div><a class=\"button large btnReport\" href=\"{{ path (\"category\") }}\">Category</a></div>
                </div>
                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"fas fa-shopping-cart btnFa\"></i></div>
                    <div><a class=\"button large btnReport\" href=\"{{ path (\"order\") }}\">Orders</a></div>
                </div>
                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"fas fa-cubes btnFa\"></i></div>
                    <div><a class=\"button large btnReport\" href=\"{{ path (\"product\") }}\">Product</a></div>
                </div>
                <div class=\"blockBtn\">
                    <div class=\"large-4 medium-4 small-12 cell\"><i class=\"fas fa-user btnFa\"></i></div>
                    <div><a class=\"button large btnReport\" href=\"{{ path (\"marketing\") }}\">Marketing</a></div>
                </div>

        </div>
    </div>

{% endblock %}

{% block footer %}
    {% include 'footer.html.twig' %}
{% endblock %}
", "report.html.twig", "C:\\xampp\\htdocs\\Tequila_project\\templates\\report.html.twig");
    }
}
