<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Intitulé de l\'image'),
            ImageField::new('path', 'Chemin de l\'image')
                ->setUploadedFileNamePattern('upload/[uuid]-[name].[extension]')
                ->setUploadDir('/public/upload/'),
            AssociationField::new('ad', 'Annonce liée'),
            AssociationField::new('service', 'Service liée')
        ];
    }
}
