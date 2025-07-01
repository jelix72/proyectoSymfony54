<?php

namespace App\Controller\Admin;

use App\Entity\Conference;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
// use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ConferenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Conference::class;
    }

    public function configureFields(string $pageName): iterable
    {
        if ($pageName === 'edit') {
            yield FormField::addPanel('Comentarios relacionados');

        yield Field::new('comentariosList', 'Comentarios')
            ->onlyOnForms()
            ->setTemplatePath('admin/field/comments_list.html.twig');

            // yield TextareaField::new('comentariosList')
                // ->setLabel('Comentarios')
                // ->onlyOnForms()
                // ->setFormTypeOption('mapped', false)
                // // ->setFormTypeOption('disabled', true)
                // ->renderAsHtml()
                // ->setTemplatePath('admin/fields/comment_links.html.twig');
        }
        
        if ($pageName === 'index') {
            yield FormField::addPanel('Conferencias');
        }

        yield IdField::new('id')->hideOnForm();
        yield TextField::new('city');
        yield TextField::new('year');
        yield BooleanField::new('isInternational');
        yield IntegerField::new('commentsCount', 'Comentarios')->onlyOnIndex();
    }

}
