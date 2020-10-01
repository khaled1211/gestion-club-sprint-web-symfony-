<?php

namespace Inscription\InscriptionBundle\Controller;

use InscriptionInscriptionBundle\Entity\Inscriptionc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@InscriptionInscriptionBundle/Default/index.html.twig');
    }
    public function clubsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $query = $em->createQuery('Select c from InscriptionInscriptionBundle:Inscriptionc c where c.FosUser=:FosUser ')->setParameter('FosUser', $user);
        $inscriptions = $query->getResult();


        return $this->render('@InscriptionInscription/Default/clubs.html.twig', array(
            'query' => $inscriptions,
        ));
    }


    public function inscriptionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $ins = new Inscriptionc();
        $nb = $em->getRepository('InscriptionInscriptionBundle:Club')->find($id);
        if ($nb->getPlacedesponibleclub() > 0) {
            $nb->setPlacedesponibleclub($nb->getPlacedesponibleclub() - 1);
            $ins->setClub($nb);
            $userid = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
            $ins->setFosUser($em->getRepository('InscriptionInscriptionBundle:FosUser')->find($userid));

            $em->persist($ins);
            $em->flush();
            return $this->redirectToRoute('club_index');
        } else {
            return $this->render('@InscriptionInscriptionBundle/Default/liste.html.twig');
        }
    }}