<?php

namespace clubsBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class WorkshopsAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idWorkshop')
            ->add('nomClub')
            ->add('date')
            ->add('heureDebutSeance')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idWorkshop')
            ->add('nomClub')
            ->add('date')
            ->add('heureDebutSeance')
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
            ->add('idWorkshop')
            ->add('nomClub')
            ->add('date')
            ->add('heureDebutSeance')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('idWorkshop')
            ->add('nomClub')
            ->add('date')
            ->add('heureDebutSeance')
        ;
    }
}
