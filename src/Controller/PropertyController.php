<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{
     /**
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository)
    {
         $this->repository = $repository;
    }

    /**
     * @Route("/biens", name="property.index")
     */
    public function index(): Response
    {
            return $this->render('property/index.html.twig', [
            'current_menu' => 'properties',
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show",requirements={"slug": "[a-z0-9\-]*"})
     * @param Property $property
     * @return Response
     */
    public function show(Property $property, string $slug): Response
    {
        if ($property->getSlug()!== $slug){
            return $this->redirectToRoute('property.show', [
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }
        return $this->render('property/show.html.twig', [
        'current_menu' => 'properties',
        'property' => $property,
        ]);
    }
}
