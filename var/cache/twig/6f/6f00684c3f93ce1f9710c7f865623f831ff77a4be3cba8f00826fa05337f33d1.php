<?php

/* headerReport.html.twig */
class __TwigTemplate_2ef32fc8de7282583e8f08e4ff3215a743a7487fc3f2f0562fab3009dd6a32d5 extends Twig_Template
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
        echo "
<header>

    <div class=\"title-bar\" data-responsive-toggle=\"example-menu\" data-hide-for=\"medium\">
        <button class=\"menu-icon\" type=\"button\" data-toggle=\"example-menu\"></button>
        <div class=\"title-bar-title\">Menu</div>
    </div>

    <div class=\"top-bar\" id=\"example-menu\">
        <div class=\"top-bar-left\">
            <li class=\"menu-text\"><a href=\"";
        // line 11
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("report");
        echo "\">Tequila</a></li>
        </div>
        <div class=\"top-bar-right\">
            <ul class=\"dropdown menu\" data-dropdown-menu>
                <li id=\"identification\"><a href=\"\">HOLA ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new Twig_Error_Runtime('Variable "user" does not exist.', 15, $this->getSourceContext()); })()), "getUsername", array(), "method"), "html", null, true);
        echo "</a></li>
                <li><a href=\"";
        // line 16
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("logout");
        echo "\">Log Out</a>
                    <br>
                <li><a href=\"";
        // line 18
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("report");
        echo "\">Reporting</a>
                    <ul id=\"subMenu\">
                        <li><a href=\"";
        // line 20
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("category");
        echo "\">Category</a></li>
                        <li><a href=\"";
        // line 21
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("orderlines");
        echo "\">Sales</a></li>
                        <li><a href=\"";
        // line 22
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("product");
        echo "\">Products</a></li>
                        <li><a href=\"";
        // line 23
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("order");
        echo "\">Customers orders</a></li>
                        <li><a href=\"";
        // line 24
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("stock");
        echo "\">Stock</a></li>
                        <li><a href=\"";
        // line 25
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("marketing");
        echo "\">Marketing</a></li>
                    </ul>
                </li>
                <li><a href=\"";
        // line 28
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("team");
        echo "\">Team</a></li>

            </ul>
            </ul>
        </div>
    </div>

    <div class=\"row demo-toggle-title\">
        <div class=\"columns\">
            <h2 id=\"mainTitle\">Welcome <br> to our reporting <br>application</h2>

        </div>
    </div>


</header>
";
    }

    public function getTemplateName()
    {
        return "headerReport.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 28,  72 => 25,  68 => 24,  64 => 23,  60 => 22,  56 => 21,  52 => 20,  47 => 18,  42 => 16,  38 => 15,  31 => 11,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
<header>

    <div class=\"title-bar\" data-responsive-toggle=\"example-menu\" data-hide-for=\"medium\">
        <button class=\"menu-icon\" type=\"button\" data-toggle=\"example-menu\"></button>
        <div class=\"title-bar-title\">Menu</div>
    </div>

    <div class=\"top-bar\" id=\"example-menu\">
        <div class=\"top-bar-left\">
            <li class=\"menu-text\"><a href=\"{{ path (\"report\") }}\">Tequila</a></li>
        </div>
        <div class=\"top-bar-right\">
            <ul class=\"dropdown menu\" data-dropdown-menu>
                <li id=\"identification\"><a href=\"\">HOLA {{ user.getUsername() }}</a></li>
                <li><a href=\"{{ path (\"logout\") }}\">Log Out</a>
                    <br>
                <li><a href=\"{{ path (\"report\") }}\">Reporting</a>
                    <ul id=\"subMenu\">
                        <li><a href=\"{{ path (\"category\") }}\">Category</a></li>
                        <li><a href=\"{{ path (\"orderlines\") }}\">Sales</a></li>
                        <li><a href=\"{{ path (\"product\") }}\">Products</a></li>
                        <li><a href=\"{{ path (\"order\") }}\">Customers orders</a></li>
                        <li><a href=\"{{ path (\"stock\") }}\">Stock</a></li>
                        <li><a href=\"{{ path (\"marketing\") }}\">Marketing</a></li>
                    </ul>
                </li>
                <li><a href=\"{{ path (\"team\") }}\">Team</a></li>

            </ul>
            </ul>
        </div>
    </div>

    <div class=\"row demo-toggle-title\">
        <div class=\"columns\">
            <h2 id=\"mainTitle\">Welcome <br> to our reporting <br>application</h2>

        </div>
    </div>


</header>
", "headerReport.html.twig", "C:\\xampp\\htdocs\\Tequila_project\\templates\\headerReport.html.twig");
    }
}
