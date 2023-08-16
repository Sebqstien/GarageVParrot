<?php

namespace App\Controller\Admin;

use App\Entity\Testimonials;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TestimonialsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Testimonials::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('author', 'Autheur'),
            TextareaField::new('message', 'Commentaire'),
            IntegerField::new('note', 'Note'),
            BooleanField::new('validated', 'Validé'),
            AssociationField::new('garage', 'Garage')

        ];
    }
}
