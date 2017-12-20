<?php

/* stock.html.twig */
class __TwigTemplate_88d09723465f0820e5fc7132f0e408b23e45d9071d2d7a5460e3d21c05b560dd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "stock.html.twig", 1);
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
        $this->loadTemplate("headerReport.html.twig", "stock.html.twig", 4)->display($context);
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
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("stockcsv");
        echo "\">EXPORT TO CSV</a>
    
    <h3>Out of Stock and Low Stock Report</h3>


    <table border=\"1\">
        <thead>
        <tr>
            <td> CATEGORY NAME</td>
            <td> PRODUCT ID</td>
            <td> PRODUCT NAME</td>
            <td> QUANTITY</td>

        </tr>
        </thead>
        <tbody>

        <div id=\"chart_OutOfStock\"></div>

        <h3> No Stock </h3>
        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new Twig_Error_Runtime('Variable "products" does not exist.', 30, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 31
            echo "            ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "stock", array()) == 0)) {
                // line 32
                echo "                <tr>
                    <td>";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "getCatid", array(), "method"), "getName", array(), "method"), "html", null, true);
                echo "</td>
                    <td>";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "getId", array(), "method"), "html", null, true);
                echo "</td>
                    <td>";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "getName", array(), "method"), "html", null, true);
                echo "</td>
                    <td>";
                // line 36
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "getStock", array(), "method"), "html", null, true);
                echo "</td>
                </tr>
            ";
            }
            // line 39
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "        </tbody>
    </table>

    <h3> Low Stock </h3>


    <div id=\"chart_div\"></div>

    <table border=\"1\">
        <thead>
        <tr>
            <td> CATEGORY NAME</td>
            <td> PRODUCT ID</td>
            <td> PRODUCT NAME</td>
            <td> QUANTITY</td>

        </tr>
        </thead>
        <tbody>
        ";
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new Twig_Error_Runtime('Variable "products" does not exist.', 59, $this->getSourceContext()); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 60
            echo "            ";
            if (((twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "stock", array()) > 0) && (twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "stock", array()) < 3))) {
                // line 61
                echo "
                <tr>
                    <td>";
                // line 63
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "getCatid", array(), "method"), "getName", array(), "method"), "html", null, true);
                echo "</td>
                    <td>";
                // line 64
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "getId", array(), "method"), "html", null, true);
                echo "</td>
                    <td>";
                // line 65
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "getName", array(), "method"), "html", null, true);
                echo "</td>
                    <td>";
                // line 66
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "getStock", array(), "method"), "html", null, true);
                echo "</td>                
                </tr>
            ";
            }
            // line 69
            echo "
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 71
            echo "            <strong>LA TABLE product EST VIDE</strong>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "        </tbody>
    </table>



";
    }

    // line 80
    public function block_footer($context, array $blocks = array())
    {
        // line 81
        echo "    ";
        $this->displayParentBlock("footer", $context, $blocks);
        echo "

    <!--Load the AJAX API-->
    <script type=\"text/javascript\" src=\"https://www.gstatic.com/charts/loader.js\"></script>
    <script type=\"text/javascript\">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Items');
            data.addColumn('number', 'Number of items');
            data.addRows([
                ";
        // line 103
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new Twig_Error_Runtime('Variable "products" does not exist.', 103, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 104
            echo "                ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "stock", array()) < 6)) {
                // line 105
                echo "                ['";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "getName", array(), "method"), "html", null, true);
                echo "', ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["product"], "getStock", array(), "method"), "html", null, true);
                echo "],
                ";
            }
            // line 107
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 108
        echo "            ]);
            // Set chart options
            var options = {'title':'Stock level of the items',
                'width':900,
                'height':1200};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById('chart_OutOfStock'));
            chart.draw(data, options);
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "stock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 108,  221 => 107,  213 => 105,  210 => 104,  206 => 103,  180 => 81,  177 => 80,  168 => 73,  161 => 71,  155 => 69,  149 => 66,  145 => 65,  141 => 64,  137 => 63,  133 => 61,  130 => 60,  125 => 59,  104 => 40,  98 => 39,  92 => 36,  88 => 35,  84 => 34,  80 => 33,  77 => 32,  74 => 31,  70 => 30,  47 => 10,  41 => 8,  38 => 7,  33 => 4,  30 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %}

{% block header %}
    {% include 'headerReport.html.twig' %}
{% endblock %}

{% block content %}
    {{ parent() }}

    <a href=\"{{ path (\"stockcsv\") }}\">EXPORT TO CSV</a>
    
    <h3>Out of Stock and Low Stock Report</h3>


    <table border=\"1\">
        <thead>
        <tr>
            <td> CATEGORY NAME</td>
            <td> PRODUCT ID</td>
            <td> PRODUCT NAME</td>
            <td> QUANTITY</td>

        </tr>
        </thead>
        <tbody>

        <div id=\"chart_OutOfStock\"></div>

        <h3> No Stock </h3>
        {% for product in products %}
            {% if product.stock == 0 %}
                <tr>
                    <td>{{ product.getCatid().getName() }}</td>
                    <td>{{ product.getId() }}</td>
                    <td>{{ product.getName() }}</td>
                    <td>{{ product.getStock() }}</td>
                </tr>
            {% endif %}
        {% endfor %}
        </tbody>
    </table>

    <h3> Low Stock </h3>


    <div id=\"chart_div\"></div>

    <table border=\"1\">
        <thead>
        <tr>
            <td> CATEGORY NAME</td>
            <td> PRODUCT ID</td>
            <td> PRODUCT NAME</td>
            <td> QUANTITY</td>

        </tr>
        </thead>
        <tbody>
        {% for product in products %}
            {% if product.stock > 0 and product.stock < 3 %}

                <tr>
                    <td>{{ product.getCatid().getName() }}</td>
                    <td>{{ product.getId() }}</td>
                    <td>{{ product.getName() }}</td>
                    <td>{{ product.getStock() }}</td>                
                </tr>
            {% endif %}

        {% else %}
            <strong>LA TABLE product EST VIDE</strong>
        {% endfor %}
        </tbody>
    </table>



{% endblock %}

{% block footer %}
    {{ parent() }}

    <!--Load the AJAX API-->
    <script type=\"text/javascript\" src=\"https://www.gstatic.com/charts/loader.js\"></script>
    <script type=\"text/javascript\">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Items');
            data.addColumn('number', 'Number of items');
            data.addRows([
                {% for product in products %}
                {% if product.stock < 6 %}
                ['{{ product.getName() }}', {{ product.getStock() }}],
                {% endif %}
                {% endfor %}
            ]);
            // Set chart options
            var options = {'title':'Stock level of the items',
                'width':900,
                'height':1200};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById('chart_OutOfStock'));
            chart.draw(data, options);
        }
    </script>
{% endblock %}", "stock.html.twig", "C:\\xampp\\htdocs\\Tequila_project\\templates\\stock.html.twig");
    }
}
