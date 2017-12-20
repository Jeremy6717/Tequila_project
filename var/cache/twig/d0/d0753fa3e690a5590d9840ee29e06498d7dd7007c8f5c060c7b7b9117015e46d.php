<?php

/* marketing.html.twig */
class __TwigTemplate_a7f53957f9ff8d9f7c3d122c583b908c2065f9169bfab03420c8075101ff17f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "marketing.html.twig", 1);
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
        $this->loadTemplate("headerReport.html.twig", "marketing.html.twig", 4)->display($context);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("content", $context, $blocks);
        echo "
    <table border=\"1\">
        <thead>
        <tr>
            <td>customer ID</td>
            <td>customer NAME</td>
            <td>customer Title</td>
            <td>customer age</td>

        </tr>
        </thead>
        <tbody>
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["customers"]) || array_key_exists("customers", $context) ? $context["customers"] : (function () { throw new Twig_Error_Runtime('Variable "customers" does not exist.', 20, $this->getSourceContext()); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["customer"]) {
            // line 21
            echo "
            <tr>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["customer"], "getId", array(), "method"), "html", null, true);
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["customer"], "getFirstname", array(), "method"), "html", null, true);
            echo "</td>
               ";
            // line 27
            echo "
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 30
            echo "            <strong>LA TABLE customer EST VIDE</strong>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "        </tbody>
    </table>
";
    }

    // line 36
    public function block_footer($context, array $blocks = array())
    {
        // line 37
        echo "    ";
        $this->loadTemplate("footer.html.twig", "marketing.html.twig", 37)->display($context);
    }

    public function getTemplateName()
    {
        return "marketing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 37,  94 => 36,  88 => 32,  81 => 30,  74 => 27,  70 => 24,  66 => 23,  62 => 21,  57 => 20,  41 => 8,  38 => 7,  33 => 4,  30 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %}

{% block header %}
    {% include 'headerReport.html.twig' %}
{% endblock %}

{% block content %}
    {{ parent() }}
    <table border=\"1\">
        <thead>
        <tr>
            <td>customer ID</td>
            <td>customer NAME</td>
            <td>customer Title</td>
            <td>customer age</td>

        </tr>
        </thead>
        <tbody>
        {% for customer in customers %}

            <tr>
                <td>{{ customer.getId() }}</td>
                <td>{{ customer.getFirstname() }}</td>
               {# <td>{{ Title }}</td>
                <td>{{ age }}</td> #}

            </tr>
        {% else %}
            <strong>LA TABLE customer EST VIDE</strong>
        {% endfor %}
        </tbody>
    </table>
{% endblock %}

{% block footer %}
    {% include 'footer.html.twig' %}
{% endblock %}", "marketing.html.twig", "C:\\xampp\\htdocs\\Tequila_project\\templates\\marketing.html.twig");
    }
}
