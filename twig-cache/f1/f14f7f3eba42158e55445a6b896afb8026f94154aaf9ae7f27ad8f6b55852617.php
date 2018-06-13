<?php

/* _global/index.html */
class __TwigTemplate_db4c30a7173fb63f0161446b999b0e8be73ba9ccb33015986110838bef83bbfc extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'main' => array($this, 'block_main'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
  <title>Test Projekat Aukcije</title>
  <link rel=\"stylesheet\" href=\"assets/libs/bootstrap/dist/css/bootstrap.min.css\">
  <link rel=\"stylesheet\" href=\"assets/libs/font-awesome/css/font-awesome.min.css\">
  <link rel=\"stylesheet\" href=\"assets/css/main.css\">
</head>
<body>
    <div class=\"container\">
    <head>
      Neko zaglavlje sajta...
    </head>

    <main>
      ";
        // line 19
        $this->displayBlock('main', $context, $blocks);
        // line 21
        echo "    </main>

    <footer>
      &copy 2018 mariolaWeb
    </footer>
    </div>
   <script src=\"assets/libs/jquery/dist/jquery.min.js\"></script>
   <script src=\"assets/libs/bootstrap/dist/js/bootstrap.min.js\"></script>
</body>
</html>
";
    }

    // line 19
    public function block_main($context, array $blocks = array())
    {
        // line 20
        echo "      ";
    }

    public function getTemplateName()
    {
        return "_global/index.html";
    }

    public function getDebugInfo()
    {
        return array (  63 => 20,  60 => 19,  46 => 21,  44 => 19,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "_global/index.html", "/Applications/MAMP/htdocs/Test-Project-Auction/views/_global/index.html");
    }
}
