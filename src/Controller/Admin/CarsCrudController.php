<?php

namespace App\Controller\Admin;

use App\Entity\Cars;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CarsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cars::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('brand', 'Marque'),
            TextField::new('model', 'Modèle'),
            TextField::new('energy', 'Carburant'),
            TextField::new('kilometers', 'Kilomètrages'),
            IntegerField::new('year', 'Année'),
            AssociationField::new('ad', 'Annonce Associée')
        ];
    }
}
