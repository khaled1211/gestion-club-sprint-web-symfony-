<?php

namespace clubsBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ClubAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idClub')
            ->add('nomClub')
            ->add('domaineClub')
            ->add('placedesponibleClub')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idClub')
            ->add('nomClub')
            ->add('domaineClub')
            ->add('placedesponibleClub')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('idClub')
            ->add('nomClub')
            ->add('domaineClub')
            ->add('placedesponibleClub')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('idClub')
            ->add('nomClub')
            ->add('domaineClub')
            ->add('placedesponibleClub')

        ;
    }
}
