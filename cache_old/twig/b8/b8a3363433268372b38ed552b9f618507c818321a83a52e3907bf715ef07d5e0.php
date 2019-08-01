<?php

/* home.twig */
class __TwigTemplate_3a25729ae6fdfcfe74bd1fe44625d578af9107ca9fac76d87aafe26d37632728 extends Twig_Template
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
        echo "<html>
    <head>
        <meta charset=\"utf-8\"/>
        <title>Slim 3</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <link href='";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->baseUrl(), "html", null, true);
        echo "/css/style.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <h1>Slim</h1>
        <div>a microframework for PHP</div>
    </body>
</html>
        
";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 6,  19 => 1,);
    }
}
/* <html>*/
/*     <head>*/
/*         <meta charset="utf-8"/>*/
/*         <title>Slim 3</title>*/
/*         <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>*/
/*         <link href='{{ base_url() }}/css/style.css' rel='stylesheet' type='text/css'>*/
/*     </head>*/
/*     <body>*/
/*         <h1>Slim</h1>*/
/*         <div>a microframework for PHP</div>*/
/*     </body>*/
/* </html>*/
/*         */
/* */
