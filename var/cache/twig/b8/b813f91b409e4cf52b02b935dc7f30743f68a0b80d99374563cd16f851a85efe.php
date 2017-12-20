<?php

/* footer.html.twig */
class __TwigTemplate_96385178d7fc72b39c7989d47c5a4f80a5b3aae1a87e3df2400ff8b73a407c7b extends Twig_Template
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
        echo "<!--FOOTER-->
    <footer>

        <div class=\"grid-container\">
            <div class=\"grid-x grid-padding-x footer\">

                <!--Contact - col gauche-->
                <div class=\"large-4 medium-4 small-12 cell\">
                    <article id=\"contact\">
                        <h5>Contact</h5>
                        <p>
                            tequilateam2017@gmail.com
                        </p>
                    </article>
                </div>

                <div class=\"large-4 medium-4 small-12 cell\">

                </div>

                <!--Legal Mention - col droit-->
                <div class=\"large-4 medium-4 small-12 cell\">
                    <article id=\"legal\">
                        <p>Legal Mentions</p>
                        <a href=\"";
        // line 25
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("team");
        echo "\"><p>Team</p></a>
                    </article>
                </div>
            </div>
        </div>


        <!--réseaux sociaux-->

        <div class=\"social\">
            <a href=\"https://www.facebook.com/\"><i class=\"fab fa-facebook-f \" id=\"linksfb\"></i></a>
            <a href=\"https://plus.google.com/\"><i class=\"fab fa-google-plus-g \"id=\"linksG\"></i></a>
            <a href=\"https://www.linkedin.com/\"><i class=\"fab fa-linkedin-in links\" id=\"linksLn\"></i></a>
            <a href=\"https://github.com/Jeremy6717/Tequila_project\"><i class=\"fab fa-github\" id=\"linkGithub\"></i></a>
        </div>

        <!--copyright-->
        <div>
        <p class=\"copyright\"> Created with <i class=\"fas fa-heart\"></i> by Team Tequila 2017 </p>
        </div>

    </footer>

            <script src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/foundation-6.4.2-complete/js/vendor/jquery.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/foundation-6.4.2-complete/js/vendor/what-input.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/foundation-6.4.2-complete/js/vendor/foundation.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("lib/foundation-6.4.2-complete/js/app.js"), "html", null, true);
        echo "\"></script>

</body>
";
    }

    public function getTemplateName()
    {
        return "footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 51,  79 => 50,  75 => 49,  71 => 48,  45 => 25,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!--FOOTER-->
    <footer>

        <div class=\"grid-container\">
            <div class=\"grid-x grid-padding-x footer\">

                <!--Contact - col gauche-->
                <div class=\"large-4 medium-4 small-12 cell\">
                    <article id=\"contact\">
                        <h5>Contact</h5>
                        <p>
                            tequilateam2017@gmail.com
                        </p>
                    </article>
                </div>

                <div class=\"large-4 medium-4 small-12 cell\">

                </div>

                <!--Legal Mention - col droit-->
                <div class=\"large-4 medium-4 small-12 cell\">
                    <article id=\"legal\">
                        <p>Legal Mentions</p>
                        <a href=\"{{ path (\"team\") }}\"><p>Team</p></a>
                    </article>
                </div>
            </div>
        </div>


        <!--réseaux sociaux-->

        <div class=\"social\">
            <a href=\"https://www.facebook.com/\"><i class=\"fab fa-facebook-f \" id=\"linksfb\"></i></a>
            <a href=\"https://plus.google.com/\"><i class=\"fab fa-google-plus-g \"id=\"linksG\"></i></a>
            <a href=\"https://www.linkedin.com/\"><i class=\"fab fa-linkedin-in links\" id=\"linksLn\"></i></a>
            <a href=\"https://github.com/Jeremy6717/Tequila_project\"><i class=\"fab fa-github\" id=\"linkGithub\"></i></a>
        </div>

        <!--copyright-->
        <div>
        <p class=\"copyright\"> Created with <i class=\"fas fa-heart\"></i> by Team Tequila 2017 </p>
        </div>

    </footer>

            <script src=\"{{ asset('lib/foundation-6.4.2-complete/js/vendor/jquery.js') }}\"></script>
            <script src=\"{{ asset('lib/foundation-6.4.2-complete/js/vendor/what-input.js') }}\"></script>
            <script src=\"{{ asset('lib/foundation-6.4.2-complete/js/vendor/foundation.js') }}\"></script>
            <script src=\"{{ asset('lib/foundation-6.4.2-complete/js/app.js') }}\"></script>

</body>
", "footer.html.twig", "C:\\xampp\\htdocs\\Tequila_project\\templates\\footer.html.twig");
    }
}
