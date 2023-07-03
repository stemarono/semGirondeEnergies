<?php

namespace App\Controller\Admin;

use App\Entity\PreCommande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class PreCommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PreCommande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomStructure'),
            TextField::new('nomDemandeur'),
            TextField::new('prenomDemandeur'),
            TextField::new('emailDemandeur'),
            TextField::new('telephoneDemandeur'),
            TextField::new('localisation'),
            TextEditorField::new('description'),
            DateTimeField::new('dateCreation'),
            DateTimeField::new('dateModification'),
        ];
    }
    
}
