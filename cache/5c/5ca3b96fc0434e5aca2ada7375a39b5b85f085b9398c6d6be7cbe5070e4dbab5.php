<?php

/* index.html */
class __TwigTemplate_46b5a91454cc047288866647a2a2d816f9a3696cc8951d4e3795acccfbb37591 extends Twig_Template
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
        echo "<!DOCTYPE HTML>
<html>
<head>
    <title>Gofit</title>
    <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"/>
    <meta name=\"description\" content=\"\"/>
    <meta name=\"author\" content=\"tj\"/>
    <link href=\"http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900,300italic\" rel=\"stylesheet\"/>
    <script src=\"js/jquery.min.js\"></script>
    <script src=\"js/jquery.dropotron.js\"></script>
    <script src=\"js/config.js\"></script>
    <script src=\"js/skel.min.js\"></script>
    <script src=\"js/skel-panels.min.js\"></script>
    <noscript>
        <link rel=\"stylesheet\" href=\"css/skel-noscript.css\"/>
        <link rel=\"stylesheet\" href=\"css/style.css\"/>
        <link rel=\"stylesheet\" href=\"css/style-desktop.css\"/>
    </noscript>
    <!--[if lte IE 8]>
    <script src=\"js/html5shiv.js\"></script>
    <link rel=\"stylesheet\" href=\"css/ie8.css\"/>
    <![endif]-->
</head>
<body class=\"homepage\">

<!-- Header Wrapper -->
<div id=\"header-wrapper\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"12u\">

                <!-- Header -->
                <section id=\"header\">

                    <!-- Logo -->
                    <h1><a href=\"#\">Gofit</a></h1>

                    <!-- Nav -->
                    <nav id=\"nav\">
                        <ul>
                            <li class=\"current_page_item\"><a href=\"index.html\">Home</a></li>
                            <li><a href=\"health.html\">Health</a></li>
                            <li><a href=\"sports.html\">Sports</a></li>
                            <li><a href=\"activity.html\">Activity</a></li>
                            <li><a href=\"friends.html\">Friends</a></li>
                        </ul>
                    </nav>

                </section>

            </div>
        </div>
        <div class=\"row\">
            <div class=\"12u\">

                <!-- Banner -->
                <section id=\"banner\">
                    <div>
                        <span class=\"image image-full\"><img src=\"images/pic01.jpg\" alt=\"\"/></span>
                        <header>
                            <h2>Come Gofit to find your friends!</h2>
                            <span class=\"byline\">Life lies in movement.</span>
                        </header>
                    </div>
                </section>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"12u\">
                <section id=\"intro\">
                    <div class=\"actions\">
                        <a href=\"login.html\" class=\"button button-big\">Get Started</a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<!-- Footer Wrapper -->
<div id=\"footer-wrapper\">

    <!-- Footer -->
    <section id=\"footer\" class=\"container\">
        <div class=\"row\">
            <div class=\"12u\">

                <!-- Copyright -->
                <div id=\"copyright\">
                    <ul class=\"links\">
                        &copy; Copyright &copy; 2016.TJStudio All rights reserved.
                    </ul>
                </div>

            </div>
        </div>
    </section>

</div>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html", "G:\\Gofit\\view\\index.html");
    }
}
