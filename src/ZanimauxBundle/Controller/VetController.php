<?php

namespace ZanimauxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ZanimauxBundle\Entity\User;
use ZanimauxBundle\Form\UserType;

class VetController extends Controller
{


    public function updateAction( Request $request){
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository(User::class)->find($this->getUser());

        $form = $this->createForm(UserType::class,$users);

        $users->setNom($request->request->get('nom'));
        $users->setPrenom($request->request->get('prenom'));
        $users->setTelephone($request->request->get('telephone'));
        $users->setAdresse($request->request->get('adresse'));
        $users->setVille($request->request->get('ville'));
        $users->setCodePostale($request->request->get('codepostale'));
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $users = $form->getData();
            $em->persist($users);
            $em->flush();
            return $this->redirectToRoute('affiche');

        }
        return $this->render('ZanimauxBundle:Vet:ModifVet.html.twig', array('form' => $form->createView(),)
        );
    }
    public function afficheAction()
    {
        return $this->render('ZanimauxBundle:Vet:AcceuilVet.html.twig', array(
            // ...
        ));
    }

}
