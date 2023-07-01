<?php

namespace App\Controller\Admin;

use App\Entity\PreCommande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PreCommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PreCommande::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
