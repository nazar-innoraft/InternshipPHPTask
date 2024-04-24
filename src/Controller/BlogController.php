<?php

namespace App\Controller;

use App\Entity\Blogs;
use App\Form\BlogsFormType;
use App\Repository\BlogsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;

use function Symfony\Component\Clock\now;

/**
 * This is Blog Controller class. It controls whole site's routing.
 */
class BlogController extends AbstractController {
  private $blogsRepository;
  private $em;


  /**
   * This is constructor.
   *
   * @param  mixed $blogsRepository
   *   BlogsRepository class object.
   * @param  mixed $em
   *   EntityManagerInterface class object.
   *
   * @return void
   */
  public function __construct(BlogsRepository $blogsRepository, EntityManagerInterface $em) {
    $this->blogsRepository = $blogsRepository;
    $this->em = $em;
  }

  /**
   * This function shows home page.
   *
   * @return Response
   *   Returning a response.
   */
  #[Route('/blog', methods: ['GET'], name: 'home_blog')]
  #[Route('/', methods: ['GET'], name: 'app_blog')]
  public function index(): Response {
    // dd($blogs);
    return $this->render('blog/index.html.twig', [
      'blogs' => $this->blogsRepository->findAll(),
    ]);
  }

  /**
   * This function shows a single blog page.
   *
   * @return Response
   *   Returning a response.
   */
  #[Route('/blogs/{id}', methods: ['GET'], name: 'show', requirements: ['id' => '\d+'])]
  public function show($id): Response
  {
    return $this->render('blog/show.html.twig', [
      'blog' => $this->blogsRepository->find($id),
    ]);
  }

  /**
   * This function create page.
   *
   * @return Response
   *   Returning a response.
   */
  #[Route('/blogs/create', name: 'create-blog')]
  public function create(Request $request): Response {
    $blog = new Blogs();

    $form = $this->createForm(BlogsFormType::class, $blog);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $newBlog = $form->getData();

      $imagePath = $form->get('imagePath')->getData();
      if ($imagePath) {
        $newFileName = uniqid() . '.' . $imagePath->guessExtension();

        try {
          $imagePath->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads',
            $newFileName
          );
        } catch (FileException $e) {
          return new Response($e->getMessage());
        }

        $newBlog->setImagePath('/uploads/' . $newFileName);
      }

      $newBlog->setTime(now());
      $this->em->persist($newBlog);
      $this->em->flush();

      return $this->redirectToRoute('app_blog');
    }

    return $this->render('blog/create.html.twig', [
      'form' => $form->createView()
    ]);
  }

  /**
   * This function edit a single blog.
   *
   * @return Response
   *   Returning a response.
   */
  #[Route('/blogs/edit/{id}', name: 'edit', requirements: ['id' => '\d+'])]
  public function edit($id, Request $request): Response {
    $blog = $this->blogsRepository->find($id);
    $form = $this->createForm(BlogsFormType::class, $blog);

    $form->handleRequest($request);
    $imagePath = $form->get('imagePath')->getData();

    if ($form->isSubmitted() && $form->isValid()) {
      if ($imagePath) {
        echo($imagePath);
        if ($imagePath != null) {
          echo('helo');
          if (file_exists($this->getParameter('kernel.project_dir') . '/public' . $blog->getImagePath())) {

            try {
              $imagePath->move(
                $this->getParameter('kernel.project_dir') . '/public/uploads',
                $blog->getImagePath()
              );
            } catch (FileException $e) {
              return new Response($e->getMessage());
            }
          } else {
            $newFileName = uniqid() . '.' . $imagePath->guessExtension();

            try {
              $imagePath->move(
                $this->getParameter('kernel.project_dir') . '/public/uploads',
                $newFileName
              );
            } catch (FileException $e) {
              return new Response($e->getMessage());
            }
          }
        }
      }
      $blog->setTitle($form->get('title')->getData());
      $blog->setDescription($form->get('description')->getData());
      $blog->setTime(now());
      $this->em->flush();

      // return $this->redirectToRoute('show', ['id' => $id]);
    }
    return $this->render('blog/edit.html.twig', [
      'blog' => $blog,
      'form' => $form->createView()
    ]);
  }

  /**
   * This function delete a single blog page.
   *
   * @return Response
   *   Returning a response.
   */
  #[Route('/blogs/delete/{id}', name: 'delete', methods: ['GET', "DELETE"], requirements: ['id' => '\d+'])]
  public function delete($id):Response {
    $blog = $this->blogsRepository->find($id);
    $this->em->remove($blog);
    $this->em->flush();

    return $this->redirectToRoute('home_blog');
  }
}
