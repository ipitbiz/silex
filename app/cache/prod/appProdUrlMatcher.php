<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // acme_store_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_store_homepage')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::indexAction',));
        }

        // acme_store_nuevo
        if ($pathinfo === '/nuevo') {
            return array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::createAction',  '_route' => 'acme_store_nuevo',);
        }

        // acme_store_mostrar
        if (0 === strpos($pathinfo, '/producto') && preg_match('#^/producto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_store_mostrar')), array (  '_controller' => 'Acme\\StoreBundle\\Controller\\DefaultController::showAction',));
        }

        // acme_hello_homepage
        if (0 === strpos($pathinfo, '/hola') && preg_match('#^/hola/(?P<name>[^/]++)(?:/(?P<creator>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_hello_homepage')), array (  '_controller' => 'Acme\\HelloBundle\\Controller\\DefaultController::indexAction',  'creator' => NULL,));
        }

        // acme_hello_aviso
        if ($pathinfo === '/aviso-legal') {
            return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction',  'template' => 'AcmeHelloBundle:Static:aviso.html.twig',  '_route' => 'acme_hello_aviso',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
