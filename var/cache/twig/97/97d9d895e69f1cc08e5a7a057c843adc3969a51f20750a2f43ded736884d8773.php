<?php

/* orders.html.twig */
class __TwigTemplate_c8fba0a802c293bba1a92b1bc289f3de44a56c76a694cb1a0265f6b4a46d588c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "orders.html.twig", 1);
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
        $this->loadTemplate("headerReport.html.twig", "orders.html.twig", 4)->display($context);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("content", $context, $blocks);
        echo "
    <a href=\"";
        // line 9
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ordercsv");
        echo "\">EXPORT TO CSV</a>
    <h3>Orders In a Given Period For One Customer</h3>

    <div class=\"grid-container\">
        <div class=\"grid-x grid-padding-x footer\">

            <div class=\"large-4 medium-4 small-12 cell\">
                <article id=\"contact\">
                    <h5>Select the date of the start</h5>
                    <input type=\"date\" class=\"span2\" value=\"02-12-2017\" id=\"dp1\">
                </article>
            </div>

            <div class=\"large-4 medium-4 small-12 cell\">
                <article id=\"contact\">
                    <h5>Select the date of the end</h5>
                    <input type=\"date\" class=\"span2\" value=\"31-12-2017\" id=\"dp1\">
                </article>
            </div>

            <div class=\"large-4 medium-4 small-12 cell\">
                <article id=\"contact\">

                    <h5>Select Last Name of Client</h5>
                    <select>
                        ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orders"]) || array_key_exists("orders", $context) ? $context["orders"] : (function () { throw new Twig_Error_Runtime('Variable "orders" does not exist.', 34, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 35
            echo "                            <option value=\"LastName\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["order"], "getCustid", array(), "method"), "getLastname", array(), "method"), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                    </select>
                </article>
            </div>
        </div>
    </div>

    <div class=\"orderBtn\">
        <a href=\"http://localhost/Tequila_project/web/index_dev.php/report/orders\">Submit</a>
    </div>


<hr/>

    <h3>All Orders </h3>


    <table border=\"1\">
        <thead>

            <tr>
                <td>ORDERS ID</td>
                <td>ORDERS DATE</td>
                <td>ORDERS PAYMENT</td>
                <td>ORDERS CUSTOMER FIRST NAME</td>
                <td>ORDERS CUSTOMER LAST NAME</td>
            </tr>
        </thead>
        <tbody>
            ";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orders"]) || array_key_exists("orders", $context) ? $context["orders"] : (function () { throw new Twig_Error_Runtime('Variable "orders" does not exist.', 65, $this->getSourceContext()); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 66
            echo "                <tr>
                    <td>";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["order"], "getId", array(), "method"), "html", null, true);
            echo "</td>
                    <td>";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["order"], "getDate", array(), "method"), "html", null, true);
            echo "</td>
                    <td>";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["order"], "getPayment", array(), "method"), "html", null, true);
            echo "</td>
                    <td>";
            // line 70
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["order"], "getCustid", array(), "method"), "getFirstname", array(), "method"), "html", null, true);
            echo "</td>
                    <td>";
            // line 71
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["order"], "getCustid", array(), "method"), "getLastname", array(), "method"), "html", null, true);
            echo "</td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 74
            echo "            <strong>THE ORDERS TABLE IS EMPTY.</strong>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "orders.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 76,  148 => 74,  140 => 71,  136 => 70,  132 => 69,  128 => 68,  124 => 67,  121 => 66,  116 => 65,  86 => 37,  77 => 35,  73 => 34,  45 => 9,  40 => 8,  37 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %}

{% block header %}
    {% include 'headerReport.html.twig' %}
{% endblock %}

{% block content %}
    {{ parent() }}
    <a href=\"{{ path (\"ordercsv\") }}\">EXPORT TO CSV</a>
    <h3>Orders In a Given Period For One Customer</h3>

    <div class=\"grid-container\">
        <div class=\"grid-x grid-padding-x footer\">

            <div class=\"large-4 medium-4 small-12 cell\">
                <article id=\"contact\">
                    <h5>Select the date of the start</h5>
                    <input type=\"date\" class=\"span2\" value=\"02-12-2017\" id=\"dp1\">
                </article>
            </div>

            <div class=\"large-4 medium-4 small-12 cell\">
                <article id=\"contact\">
                    <h5>Select the date of the end</h5>
                    <input type=\"date\" class=\"span2\" value=\"31-12-2017\" id=\"dp1\">
                </article>
            </div>

            <div class=\"large-4 medium-4 small-12 cell\">
                <article id=\"contact\">

                    <h5>Select Last Name of Client</h5>
                    <select>
                        {% for order in orders %}
                            <option value=\"LastName\">{{ order.getCustid().getLastname() }}</option>
                        {% endfor %}
                    </select>
                </article>
            </div>
        </div>
    </div>

    <div class=\"orderBtn\">
        <a href=\"http://localhost/Tequila_project/web/index_dev.php/report/orders\">Submit</a>
    </div>


<hr/>

    <h3>All Orders </h3>


    <table border=\"1\">
        <thead>

            <tr>
                <td>ORDERS ID</td>
                <td>ORDERS DATE</td>
                <td>ORDERS PAYMENT</td>
                <td>ORDERS CUSTOMER FIRST NAME</td>
                <td>ORDERS CUSTOMER LAST NAME</td>
            </tr>
        </thead>
        <tbody>
            {% for order in orders %}
                <tr>
                    <td>{{ order.getId() }}</td>
                    <td>{{ order.getDate() }}</td>
                    <td>{{ order.getPayment() }}</td>
                    <td>{{ order.getCustid().getFirstname() }}</td>
                    <td>{{ order.getCustid().getLastname() }}</td>
                </tr>
            {% else %}
            <strong>THE ORDERS TABLE IS EMPTY.</strong>
        {% endfor %}
    </tbody>
</table>
{% endblock %}
", "orders.html.twig", "C:\\xampp\\htdocs\\Tequila_project\\templates\\orders.html.twig");
    }
}
