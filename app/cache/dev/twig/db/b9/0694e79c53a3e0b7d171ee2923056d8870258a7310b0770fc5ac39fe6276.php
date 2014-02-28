<?php

/* AcmeHelloBundle:Default:index.html.twig */
class __TwigTemplate_dbb90694e79c53a3e0b7d171ee2923056d8870258a7310b0770fc5ac39fe6276 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Mi Symfony";
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        echo "\t
\t<h1>Hola ";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "!</h1>
\t";
        // line 8
        if (((isset($context["yomismo"]) ? $context["yomismo"] : $this->getContext($context, "yomismo")) != null)) {
            echo "<p>web creada por ";
            echo twig_escape_filter($this->env, (isset($context["yomismo"]) ? $context["yomismo"] : $this->getContext($context, "yomismo")), "html", null, true);
            echo "</p>";
        }
    }

    public function getTemplateName()
    {
        return "AcmeHelloBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 8,  40 => 7,  35 => 6,  29 => 4,);
    }
}
