<?php


namespace App\Controller;


use App\DTO\Task;
use App\Form\TaskType;
use App\Service\ContactService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{


    /**
     * @var ContactService
     */


//    private $contactService;
//
//    public function __construct(ContactService $contactService)
//    {
//
//        $this->contactService = $contactService;
//    }

    /**
     * @Route("/annoucements/task", name="task")
     */

    public function index(Request $request)
    {
       // $this->contactService->send('Hello ceci est un envoi de mail');
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();
          //  dump($task);die;
            return $this->redirectToRoute('task');

        }

        return $this->render('contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}