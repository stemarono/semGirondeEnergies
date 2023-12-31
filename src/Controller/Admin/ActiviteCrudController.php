<?php

namespace App\Controller\Admin;

use App\Entity\Activite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class ActiviteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Activite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titreRealisation'),
            TextEditorField::new('description'),
            TextField::new('enProjet'),
            DateTimeField::new('dateCreation'),
            DateTimeField::new('dateModification'),
        ];
    }
    
}
