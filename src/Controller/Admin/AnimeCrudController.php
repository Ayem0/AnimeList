<?php

namespace App\Controller\Admin;

use App\Entity\Anime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class AnimeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Anime::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            IdField::new('episode'),
            TextField::new('genre'),
            AssociationField::new('categorie', 'Categorie')->autocomplete(),
        ];
    }
}
