<?php

namespace App\Controller;

use App\Entity\Mobile;
use App\Form\MobileFormType;
use App\Repository\MobileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController {
  private $em;
  private $mobileRepository;

  public function __construct(MobileRepository $mobileRepository, EntityManagerInterface $em)
  {
    $this->em = $em;
    $this->mobileRepository = $mobileRepository;
  }

  #[Route('/home', name: 'home')]
  #[Route('/', name: 'mobile_home')]
  public function index(): Response
  {
    $mobiles = $this->mobileRepository->findAll();
    return $this->render('home/index.html.twig', [
      'mobiles' => $mobiles
    ]);
  }

  #[Route('/create', name: 'create')]
  public function create(Request $request): Response {
    $mobile = new Mobile();
    $form = $this->createForm(MobileFormType::class, $mobile)->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $mobile = $form->getData();
      $this->em->persist($mobile);
      $this->addFlash('success', 'MObile specification updated');
      $this->em->flush();

      return $this->redirectToRoute('create');
    }
    return $this->render('home/create.html.twig', [
      'form' => $form->createView()
    ]);
  }
}
