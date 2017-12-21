<?php

/* team.html.twig */
class __TwigTemplate_251477719c5e1b23fb2f690150758861e47693df852c3bb077fdf2382b3ac36b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "team.html.twig", 1);
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
        $this->loadTemplate("headerReport.html.twig", "team.html.twig", 4)->display($context);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    <div class=\"grid-container\">
        <div id=\"teamContent\">
            <h1>The team</h1>
            <div id=\"teamMemberPicture\">
                <div class=\"grid-x grid-padding-x\">
                    <div class=\"large-3 medium-3 small-8 cell\">
                        <article id=\"picture\">
                            <img src=\"../img/tamarra.jpg\" alt=\"Tamara Esclante\">
                            <p>Tamara <a href=\"https://www.linkedin.com/in/tamara-escalante-b677b31/\"><i class=\"fab fa-linkedin\"></i></a></p>
                        </article>
                    </div>
                    <div class=\"large-3 medium-3 small-8 cell\">
                        <article id=\"picture\">
                            <div class=\"pictureMemberTeam\"><img src=\"../img/jeremy.jpg\" alt=\"Jeremy Deumer\"></div>
                            <p>Jeremy <a href=\"https://www.linkedin.com/in/jeremy-deumer-20672098/\"><i class=\"fab fa-linkedin\"></i></a></p>
                        </article>
                    </div>
                    <div class=\"large-3 medium-3 small-8 cell\">
                        <article id=\"picture\">
                            <div class=\"pictureMemberTeam\"><img src=\"../img/catherine.jpg\" alt=\"Catherine Tritz\"></div>
                            <p>Catherine <a href=\"https://www.linkedin.com/in/catherine-tritz-35465232/\"><i class=\"fab fa-linkedin\"></i></a></p>
                        </article>
                    </div>
                    <div class=\"large-3 medium-3 small-8 cell\">
                        <article id=\"picture\">
                            <div class=\"pictureMemberTeam\"><img src=\"../img/michel.jpg\" alt=\"Michel Magnier\"></div>
                            <p>Michel <a href=\"https://www.linkedin.com/in/michelmagnier/\"><i class=\"fab fa-linkedin\"></i></a></p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div id=\"mapArea\">
            <h2>Find us</h2>
            <div id=\"map\"></div>
            <script>
                function initMap() {
                    var technoport = {lat: 49.502622, lng: 5.949151};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 13,
                        center: technoport
                    });
                    var marker = new google.maps.Marker({
                        position: technoport,
                        map: map
                    });
                }
            </script>
            <script async defer
                    src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyCdI3YslSOblOzl8QAnvef75Vgz9M4dh-E&callback=initMap\">
            </script>
        </div>
        <div id=\"contact\">
            <h2>Contact us</h2>
            <form method=\"post\">
                <p>Your name</p><input type=\"text\" name=\"name\">
                <p>Your email</p>
                <div id=\"emailContactInput\">
                    <input type=\"email\" name=\"email\">
                </div>
                <p>Subject</p><input type=\"text\" name=\"subject\">
                <textarea id=\"message\" placeholder=\"Your message\" name=\"message\"></textarea>
                <button type=\"submit\" id=\"contactSubmit\"><i class=\"far fa-envelope\" id=\"envelope\"></i>Send</button>
            </form>
        </div>
    </div>


";
    }

    // line 78
    public function block_footer($context, array $blocks = array())
    {
        // line 79
        echo "    ";
        $this->loadTemplate("footer.html.twig", "team.html.twig", 79)->display($context);
        echo "      
";
    }

    public function getTemplateName()
    {
        return "team.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 79,  113 => 78,  41 => 8,  38 => 7,  33 => 4,  30 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %}

{% block header %}
    {% include 'headerReport.html.twig' %}
{% endblock %}
        
{% block content %}
    <div class=\"grid-container\">
        <div id=\"teamContent\">
            <h1>The team</h1>
            <div id=\"teamMemberPicture\">
                <div class=\"grid-x grid-padding-x\">
                    <div class=\"large-3 medium-3 small-8 cell\">
                        <article id=\"picture\">
                            <img src=\"../img/tamarra.jpg\" alt=\"Tamara Esclante\">
                            <p>Tamara <a href=\"https://www.linkedin.com/in/tamara-escalante-b677b31/\"><i class=\"fab fa-linkedin\"></i></a></p>
                        </article>
                    </div>
                    <div class=\"large-3 medium-3 small-8 cell\">
                        <article id=\"picture\">
                            <div class=\"pictureMemberTeam\"><img src=\"../img/jeremy.jpg\" alt=\"Jeremy Deumer\"></div>
                            <p>Jeremy <a href=\"https://www.linkedin.com/in/jeremy-deumer-20672098/\"><i class=\"fab fa-linkedin\"></i></a></p>
                        </article>
                    </div>
                    <div class=\"large-3 medium-3 small-8 cell\">
                        <article id=\"picture\">
                            <div class=\"pictureMemberTeam\"><img src=\"../img/catherine.jpg\" alt=\"Catherine Tritz\"></div>
                            <p>Catherine <a href=\"https://www.linkedin.com/in/catherine-tritz-35465232/\"><i class=\"fab fa-linkedin\"></i></a></p>
                        </article>
                    </div>
                    <div class=\"large-3 medium-3 small-8 cell\">
                        <article id=\"picture\">
                            <div class=\"pictureMemberTeam\"><img src=\"../img/michel.jpg\" alt=\"Michel Magnier\"></div>
                            <p>Michel <a href=\"https://www.linkedin.com/in/michelmagnier/\"><i class=\"fab fa-linkedin\"></i></a></p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div id=\"mapArea\">
            <h2>Find us</h2>
            <div id=\"map\"></div>
            <script>
                function initMap() {
                    var technoport = {lat: 49.502622, lng: 5.949151};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 13,
                        center: technoport
                    });
                    var marker = new google.maps.Marker({
                        position: technoport,
                        map: map
                    });
                }
            </script>
            <script async defer
                    src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyCdI3YslSOblOzl8QAnvef75Vgz9M4dh-E&callback=initMap\">
            </script>
        </div>
        <div id=\"contact\">
            <h2>Contact us</h2>
            <form method=\"post\">
                <p>Your name</p><input type=\"text\" name=\"name\">
                <p>Your email</p>
                <div id=\"emailContactInput\">
                    <input type=\"email\" name=\"email\">
                </div>
                <p>Subject</p><input type=\"text\" name=\"subject\">
                <textarea id=\"message\" placeholder=\"Your message\" name=\"message\"></textarea>
                <button type=\"submit\" id=\"contactSubmit\"><i class=\"far fa-envelope\" id=\"envelope\"></i>Send</button>
            </form>
        </div>
    </div>


{% endblock %}

{% block footer %}
    {% include 'footer.html.twig' %}      
{% endblock %}  ", "team.html.twig", "C:\\xampp\\htdocs\\Tequila_project\\templates\\team.html.twig");
    }
}
