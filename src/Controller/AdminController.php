<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
  #[Route('/admin', name: 'app_admin')]
  public function index(): Response {
    $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
    $user = new User();
    $user = $this->getUser();
    return match ($user->isVerified()) {
       true => $this->render("admin/index.html.twig"),
       false => $this->render("admin/verify-email.html.twig"),
    };
    return $this->render('admin/index.html.twig');
  }
}
