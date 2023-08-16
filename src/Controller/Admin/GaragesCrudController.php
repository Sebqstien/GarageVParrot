<?php

namespace App\Controller\Admin;

use App\Entity\Garages;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GaragesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Garages::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name', 'Nom'),
            EmailField::new('mail', 'Email'),
            TextField::new('phone', 'Téléphone'),
            TextField::new('address', 'Adresse')
        ];
    }
}
