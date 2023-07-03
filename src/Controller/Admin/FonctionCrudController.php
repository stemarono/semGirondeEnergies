<?php

namespace App\Controller\Admin;

use App\Entity\Fonction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class FonctionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fonction::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('fonction'),
            DateTimeField::new('date Creation'),
            DateTimeField::new('date Modification'),

        ];
    }
    
}
