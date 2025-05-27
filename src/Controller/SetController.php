<?php

namespace App\Controller;

use App\Entity\Set;
use App\Form\SetForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/set')]
final class SetController extends AbstractController
{
    #[Route(name: 'app_set_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $sets = $entityManager
            ->getRepository(Set::class)
            ->findAll();

        return $this->render('set/index.html.twig', [
            'sets' => $sets,
        ]);
    }

    #[Route('/new', name: 'app_set_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $set = new Set();
        $form = $this->createForm(SetForm::class, $set);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($set);
            $entityManager->flush();

            return $this->redirectToRoute('app_set_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('set/new.html.twig', [
            'set' => $set,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_set_show', methods: ['GET'])]
    public function show(Set $set): Response
    {
        return $this->render('set/show.html.twig', [
            'set' => $set,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_set_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Set $set, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SetForm::class, $set);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_set_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('set/edit.html.twig', [
            'set' => $set,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_set_delete', methods: ['POST'])]
    public function delete(Request $request, Set $set, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$set->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($set);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_set_index', [], Response::HTTP_SEE_OTHER);
    }
}
