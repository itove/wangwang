<?php

namespace App\Controller\Admin;

use App\Entity\Ord;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OrdCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ord::class;
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
