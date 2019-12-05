<?php

namespace clubsBundle\Controller;

use clubsBundle\clubsBundle;
use clubsBundle\Entity\Club;
use clubsBundle\Entity\Inscriptionc;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Club controller.
 *
 */
class ClubController extends Controller
{
    protected $FosUser;


    /**
     * Lists all club entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $clubs = $em->getRepository('clubsBundle:Club')->findAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $clubs,
            $request->query->get('page', 1),

            $request->query->getInt('limit', 5)/*nbre d'éléments par page*/
        );
        return $this->render('@clubs/Club/index.html.twig', array(
            'clubs' => $pagination,));
    }

    /**
     * Creates a new club entity.
     *
     */
    public function newAction(Request $request)
    {
        $club = new Club();
        $form = $this->createForm('clubsBundle\Form\ClubType', $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($club);
            $em->flush();

            return $this->redirectToRoute('club_show', array('idClub' => $club->getIdclub()));
        }

        return $this->render('@clubs/club/new.html.twig', array(
            'club' => $club,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a club entity.
     *
     */
    public function showAction(Club $club)
    {
       // $deleteForm = $this->createDeleteForm($club);
        $FosUser = $this->container->get('security.token_storage')->getToken()->getUser();
        if ($FosUser != null) {
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery('Select c from clubsBundle:Inscriptionc c where c.FosUser=:FosUser ')->setParameter('FosUser', $FosUser);
            $i = $query->getResult();
            $inss = array();
            foreach ($i as $ii) {
                array_push($inss, $ii->getClub()->getIdClub());
            }
            return $this->render('@clubs/club/show.html.twig', array(
                'club' => $club,
               // 'delete_form' => $deleteForm->createView(),
                'inss' => $inss
            ));
        } else
            $inss = array();
        return $this->render('@clubs/club/show.html.twig', array(
            'club' => $club,
            //'delete_form' => $deleteForm->createView(),
            'inss' => $inss
        ));
    }

    /**
     * Displays a form to edit an existing club entity.
     *
     */
    public function editAction(Request $request, Club $club)
    {
        $deleteForm = $this->createDeleteForm($club);
        $editForm = $this->createForm('clubsBundle\Form\ClubType', $club);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('club_edit', array('idClub' => $club->getIdclub()));
        }

        return $this->render('@clubs/club/edit.html.twig', array(
            'club' => $club,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a club entity.
     *
     */
    public function deleteAction(Request $request, Club $club)
    {
        $form = $this->createDeleteForm($club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($club);
            $em->flush();
        }

        return $this->redirectToRoute('club_index');
    }

    /**
     * Creates a form to delete a club entity.
     *
     * @param Club $club The club entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Club $club)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('club_delete', array('idClub' => $club->getIdclub())))
            ->setMethod('DELETE')
            ->getForm();
    }

    public function clubsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $query = $em->createQuery('Select c from clubsBundle:Inscriptionc c where c.FosUser=:FosUser ')->setParameter('FosUser', $user);
        $inscriptions = $query->getResult();


        return $this->render('@clubs/Club/clubs.html.twig', array(
            'query' => $inscriptions,
        ));
    }


    public function inscriptionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $ins = new Inscriptionc();
        $nb = $em->getRepository('clubsBundle:Club')->find($id);
        if ($nb->getPlacedesponibleclub() > 0) {
            $nb->setPlacedesponibleclub($nb->getPlacedesponibleclub() - 1);
            $ins->setClub($nb);
            $userid = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
            $ins->setFosUser($em->getRepository('clubsBundle:FosUser')->find($userid));

            $em->persist($ins);
            $em->flush();
            return $this->redirectToRoute('club_index');
        } else {
            return $this->render('@clubs/Club/liste.html.twig');
        }
    }


    public function desinscriptionAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $club = $em->getRepository('clubsBundle:Club')->find($id);
        $club->setPlacedesponibleclub($club->getPlacedesponibleclub() + 1);

        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $ins = $em->getRepository('clubsBundle:Inscriptionc')->findOneBy(array('FosUser' => $user, 'club' => $club));
        $em->remove($ins);
        $em->flush();
        return $this->redirectToRoute('club_index');
    }

    private function getFosUser()
    {
        return $this->FosUser;
    }


}