<?php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CRUDListController extends AbstractController
{
    #[Route('/crud', name: 'app_crud_list')]
    public function index(EntityManagerInterface $em)
    {
        $tasks = $em->getRepository(Task::class)->findBy([], ['id' => 'DESC']);
        return $this->render('crudlist/index.html.twig', ['tasks' => $tasks]);
    }

    #[Route('/create', name: 'create_task', methods: ['POST'])]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $title = trim($request->get("title"));
        if (empty($title)) {
            return $this->redirectToRoute('app_crud_list');
        }
        $entityManager = $doctrine->getManager();
        $task = new Task();
        $task->setTitle($title);
        $entityManager->persist($task); // prepares for saving in dtaabase
        $entityManager->flush(); //saving is done by this line in db
        return $this->redirectToRoute('app_crud_list');
    }

    #[Route('/update/{id}', name: 'update_task')]
    public function update($id, ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        $task = $entityManager->getRepository(Task::class)->find($id);
        $task->setStatus(!$task->getStatus());
        $entityManager->flush();

        return $this->redirectToRoute('app_crud_list');
    }

    #[Route('/delete/{id}', name: 'delete_task')]
    public function delete($id, ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        $task = $entityManager->getRepository(Task::class)->find($id);
        $entityManager->remove($task);
        $entityManager->flush();

        return $this->redirectToRoute('app_crud_list');
    }
}
