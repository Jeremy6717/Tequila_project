<?php

/* category.html.twig */
class __TwigTemplate_e184d384c577c1247f65bf06a5da72436c6dc4b57c860ea1f772da81d5dffa58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "category.html.twig", 1);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
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
        $this->loadTemplate("headerReport.html.twig", "category.html.twig", 4)->display($context);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("content", $context, $blocks);
        echo "

    <a href=\"";
        // line 10
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("categorycsv");
        echo "\">EXPORT TO CSV</a>
    <h3>All items on given Category</h3>
    <div class=\"grid-container\">
        <table border=\"1\">
            <thead>
                <tr>
                    <td>CATEGORY ID</td>
                    <td>CATEGORY NAME</td>
                </tr>
            </thead>
            <tbody>
                ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new Twig_Error_Runtime('Variable "categories" does not exist.', 21, $this->getSourceContext()); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 22
            echo "                    <tr>
                        <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["category"], "getId", array(), "method"), "html", null, true);
            echo "</td>
                        <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["category"], "getName", array(), "method"), "html", null, true);
            echo "</td>

                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 28
            echo "                    <strong>LA TABLE category EST VIDE</strong>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "            </tbody>
        </table>
            
            
    </div>
";
    }

    public function getTemplateName()
    {
        return "category.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 30,  81 => 28,  72 => 24,  68 => 23,  65 => 22,  60 => 21,  46 => 10,  40 => 8,  37 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %}

{% block header %}
    {% include 'headerReport.html.twig' %}
{% endblock %}

{% block content %}
    {{ parent() }}

    <a href=\"{{ path (\"categorycsv\") }}\">EXPORT TO CSV</a>
    <h3>All items on given Category</h3>
    <div class=\"grid-container\">
        <table border=\"1\">
            <thead>
                <tr>
                    <td>CATEGORY ID</td>
                    <td>CATEGORY NAME</td>
                </tr>
            </thead>
            <tbody>
                {% for category in categories %}
                    <tr>
                        <td>{{ category.getId() }}</td>
                        <td>{{ category.getName() }}</td>

                    </tr>
                {% else %}
                    <strong>LA TABLE category EST VIDE</strong>
                {% endfor %}
            </tbody>
        </table>
            
            
    </div>
{% endblock %}


", "category.html.twig", "C:\\xampp\\htdocs\\Tequila_project\\templates\\category.html.twig");
    }
}
