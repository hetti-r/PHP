<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BooksiteController extends AbstractController
{
    #[Route('/booksite', name: 'booksite')]
    public function index(EntityManagerInterface $em)
    {
        $books = $em->getRepository(Book::class)->findBy([], ['id' => 'DESC']);
        return $this->render('booksite/index.html.twig', ['books' => $books]);
    }

    #[Route('/bookform', name: 'bookform')]
    public function form(Response $request)
    {
        $formFactory = Forms::createFormFactoryBuilder()
            ->addExtension(new HttpFoundationExtension())
            ->getFormFactory();
        $form->handleRequest($request);

    }

    #[Route('/create', name: 'create_book', methods: ['POST'])]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $title = trim($request->get("title"));
        $author = trim($request->get("author"));
        if (empty($title) && empty($author)) {
            return $this->redirectToRoute('booksite');
        }
        $entityManager = $doctrine->getManager();
        $book = new Book();
        $book->setTitle($title);
        $book->setTitle($author);
        $entityManager->persist($book); // prepares for saving in dtaabase
        $entityManager->flush(); //saving is done by this line in db
        return $this->redirectToRoute('booksite');
    }

    #[Route('/update/{id}', name: 'update_book')]
    public function update($id, ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);
        $book->setStatus(!$book->getStatus());
        $entityManager->flush();

        return $this->redirectToRoute('booksite');
    }

    #[Route('/delete/{id}', name: 'delete_book')]
    public function delete($id, ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($id);
        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('booksite');
    }
}
