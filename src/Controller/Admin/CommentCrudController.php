<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
// use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

   public function configureFields(string $pageName): iterable
        {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('conference')
                ->setLabel('Conferencia')
                ->setFormTypeOption('placeholder', 'Seleccione una Conferencia')
                ->setRequired(true),
            TextField::new('author')
                ->setLabel('Autor')
                ->setRequired(true),
            TextareaField::new('text')
                ->setLabel('Comentario')
                ->setRequired(true),
            EmailField::new('email'),
            DateTimeField::new('createdAt'),
            TextField::new('photoFilename')->onlyOnIndex(),
        ];
    }

}
