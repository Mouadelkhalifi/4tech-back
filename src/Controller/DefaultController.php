<?php
namespace App\Controller;

use App\Entity\Vehicles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index(): Response
    {
        return $this->render('app/index.html.twig');
    }

    /**
     * @Route("/vehicles", name="app_vehicles_list")
     */
    public function listVehicles(EntityManagerInterface $entityManager): Response
    {
        $vehicles = $entityManager->getRepository(Vehicles::class)->findAll();

        return $this->render('app/list.html.twig', [
            'vehicles' => $vehicles,
        ]);
    }

    /**
     * @Route("/vehicles/{id}", name="app_vehicle_show")
     */
    public function showVehicles(Vehicles $vehicle): Response
    {
        return $this->render('app/show.html.twig', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * @Route("/api/vehicles", name="api_vehicles_list")
     */
    public function apiListVehicles(EntityManagerInterface $entityManager): Response
    {
        $vehicles = $entityManager->getRepository(Vehicles::class)->findAll();
        $vehiclesArray = [];

        foreach ($vehicles as $vehicle) {
            $vehiclesArray[] = [
                'id' => $vehicle->getId(),
                'brand' => $vehicle->getBrand(),
                'model' => $vehicle->getModel(),
                'version' => $vehicle->getVersion(),
                'year' => $vehicle->getYear(),
                'energy' => $vehicle->getEnergy(),
                'power' => $vehicle->getPower(),
                'price' => $vehicle->getPrice(),
                'priceRetail' => $vehicle->getPriceRetail(),
                'priceMonthly' => $vehicle->getPriceMonthly(),
                'pics' => $vehicle->getPics(),
                'gearbox' => $vehicle->getGearbox(),
            ];
        }

        return $this->json($vehiclesArray);
    }

}
