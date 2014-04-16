<?php

namespace Acme\StoreBundle\Controller;

use Acme\StoreBundle\Entity\Category;
use Acme\StoreBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }
    

    public function createAction()
    {
    	$category = new Category();
    	$category->setName('Complementos');
    	
    	$product = new Product();
    	$product->setName('Bufanda');
    	$product->setPrice('19.99');
    	$product->setDescription('Es, pues, de saber que este sobredicho hidalgo, los ratos que estaba ocioso, que eran los más del año, 
    			se daba a leer libros de caballerías, con tanta afición y gusto, que olvidó casi de todo punto el ejercicio de la caza, y 
    			aun la administración de su hacienda.');
    	$product->setCategory($category);
    
    	$em = $this->getDoctrine()->getManager();
    	$em->persist($category);
    	$em->persist($product);
    	$em->flush();
    
    	return new Response('Creado el producto de nombre '.$product->getName());
    }
    
    public function showAction($id)
    {
    	$product = $this->getDoctrine()
    	->getRepository('AcmeStoreBundle:Product')
    	->find($id);
    	
    	if ($product->getCategory()) {
    		$categoryName = $product->getCategory()->getName();
    	} else {
    		$categoryName = 'Sin Categoría';
    	}
    
    	if (!$product) {
    		throw $this->createNotFoundException(
    				'No hay producto con id '.$id
    		);
    	}
    	
    	return $this->render('AcmeStoreBundle:Default:index.html.twig', array(
    			'name' => $product->getName(), 
    			'price' => $product->getPrice(), 
    			'descrip' => $product->getDescription(),
    			'category' => $categoryName
    	));
    }
    
    public function showProductAction($id)
    {
    	$category = $this->getDoctrine()
    	->getRepository('AcmeStoreBundle:Category')
    	->find($id);
    	 
    	$products = $category->getProducts();
    	
    
    	if (!$category) {
    		throw $this->createNotFoundException(
    				'No hay producto con id '.$id
    		);
    	}
    	 
    	return $this->render('AcmeStoreBundle:Default:productos.html.twig', array(
    			'productos' => $products
    	));
    }
    
    public function updateAction($id, $nombre) {
    	$em = $this->getDoctrine()->getManager();
    	$product = $em->getRepository('AcmeStoreBundle:Product')->find($id);
    	 
    	if (!$product) {
    		throw $this->createNotFoundException(
    				'No hay producto con id '.$id
    		);
    	}
    	if (!$nombre) {
    		throw $this->createNotFoundException(
    				'Tienes que escribir el nuevo nombre'
    		);
    	}
    	
    	$product->setName($nombre);
    	$em->flush();
    	
    	return $this->redirect($this->generateUrl('acme_store_mostrar', array('id' => $id)));
    }
}
