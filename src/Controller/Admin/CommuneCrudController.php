<?php

namespace App\Controller\Admin;

use App\Entity\Commune;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class CommuneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commune::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom Commune'),
            DateTimeField::new ('date Creation'),
            DateTimeField::new ('date Modification'),
        ];
    }
    
}
