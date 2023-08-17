<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImagesCrudController extends AbstractCrudController
{

    public const BASE_PATH = 'public/upload/';


    public static function getEntityFqcn(): string
    {
        return Images::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Voiture'),
            ImageField::new('path', 'Chemin de l\'image')
                ->setUploadedFileNamePattern('upload/[uuid]-[name].[extension]')
                ->setUploadDir(self::BASE_PATH),
            AssociationField::new('ad', 'Annonce liée')
        ];
    }
}
