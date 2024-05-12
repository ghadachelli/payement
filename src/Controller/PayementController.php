<?php
// src/Controller/PayementController.php

namespace App\Controller;

use App\Entity\Payement;
use App\Form\PayementType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PayementController extends AbstractController
{
/**
     * @Route("/payment/new", name="payment_new", methods={"GET", "POST"})
     */
 public function new(Request $request): Response
 {
 $payement = new Payement();
$form = $this->createForm(PayementType::class, $payement);
 $form->handleRequest($request);

 if ($form->isSubmitted() && $form->isValid()) {
$entityManager = $this->getDoctrine()->getManager();
 $entityManager->persist($payement);
 $entityManager->flush();

return $this->redirectToRoute('payment_success');
 }

 return $this->render('payement/new.html.twig', [
'form' => $form->createView(),
]);
}
}



