<?php
namespace App\Controller;

use App\Entity\Book;
use App\Form\BookFormType;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BooksiteController extends AbstractController
{
    #[Route("/booksite", name: "book_index", methods: ["GET"])]
    public function index(BookRepository $bookRepository): Response
    {
        return $this->render("booksite/index.html.twig", [
            "books" => $bookRepository->findAll(),
        ]);
    }

    #[Route("/new", name: "book_new", methods: ["GET", "POST"])]
    public function new (Request $request, ManagerRegistry $doctrine): Response
    {
        $book = new Book();
        $form = $this->createForm(BookFormType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute("book_index");
        }

        return $this->render("booksite/new.html.twig", [
            "book" => $book,
            "form" => $form->createView(),
        ]);
    }

    #[Route("/{id}/edit", name: "book_edit", methods: ["GET", "POST"])]
    public function edit(Request $request, Book $book, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(BookFormType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine->getManager()
                ->flush();

            return $this->redirectToRoute("book_index");
        }

        return $this->render("booksite/edit.html.twig", [
            "book" => $book,
            "form" => $form->createView(),
        ]);
    }

    #[Route("/{id}", name: "book_delete", methods: ["DELETE"])]
    public function delete(Request $request, Book $book, ManagerRegistry $doctrine): Response
    {
        if ($this->isCsrfTokenValid("delete" . $book->getId(), $request->request->get("_token"))) {
            $entityManager = $doctrine->getManager();
            $entityManager->remove($book);
            $entityManager->flush();

            $this->addFlash('success', 'The book has been deleted.');

            return $this->redirectToRoute("book_index");
        }

        return $this->redirectToRoute("book_index");
    }

}
