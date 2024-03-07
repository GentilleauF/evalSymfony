<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TaskController extends AbstractController
{

    private TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository){
        $this->taskRepository = $taskRepository;
    }


    #[Route('/task/add', name: 'app_task_add')] 
    public function addTask(Request $request, EntityManagerInterface $entityManager) {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $entityManager->persist($task);
            $entityManager->flush(); 
           
        }


        return $this->render('task/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/task/all', name: 'app_task_all')] 
    public function allTask() : Response {
        $task = $this->taskRepository->findAll();

        return $this->render('task/task_all.html.twig', [
            'tasks' => $task,
        ]);
    }
}
