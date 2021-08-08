<?php

namespace App\Controller\Backend;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BackPropertyController extends AbstractController
{
     /**
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository,EntityManagerInterface $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;
    }

    /**
     * @Route("/admin", name="admin.property.index")
     */
    public function index(): Response
    {
        $properties = $this->repository->findAll();

            return $this->render('admin/property/index.html.twig', [
            'properties' => $properties,
        ]);
    }

    /**
     * @Route("/admin/property/new", name="admin.property.new")
     */
    public function new(Request $request)
    {
        $property = new Property;

        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid())
        {            
            $property->setCreatedAt(new \DateTime());

            $this->manager->persist($property);
            $this->manager->flush();
            return $this->redirectToRoute('admin.property.index');
        }
            return $this->render('admin/property/new.html.twig', [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.edit", methods={"GET"})
     */
    public function edit(Property $property,Request $request)
    {
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid())
        {
            $this->manager->flush();
            return $this->redirectToRoute('admin.property.index');
        }
            return $this->render('admin/property/edit.html.twig', [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.delete", methods={"DELETE","POST"})
     */
    public function delete(Property $property,Request $request)
    {
        if ($this->isCsrfTokenValid('delete'.$property->getId(),$request->get('_token'))){
           // $this->manager->remove($property);
           // $this->manager->flush();
           return new Response('Suppression');
        }
            
        return $this->redirectToRoute('admin.property.index');
    }
}
