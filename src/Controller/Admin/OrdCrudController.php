<?php

namespace App\Controller\Admin;

use App\Entity\Ord;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use App\Entity\Choice;

class OrdCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ord::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $instance = $this->getContext()->getEntity()->getInstance();
        yield IdField::new('id')->onlyOnIndex();
        yield AssociationField::new('consumer')
            ->hideWhenUpdating()
            ;
        yield AssociationField::new('consumer')
            ->onlyWhenUpdating()
            ->setFormTypeOptions(['disabled' => 'disabled']);
        yield CollectionField::new('ordItems')
            ->onlyWhenCreating()
            ->setFormTypeOptions(['required' => 'required'])
            // ->useEntryCrudForm()
        ;
        yield CollectionField::new('ordItems')
            ->OnlyWhenUpdating()
            ->allowAdd(false)
            ->allowDelete(false)
            // ->useEntryCrudForm()
        ;
        yield MoneyField::new('amount')
            ->setCurrency('CNY')
            ->onlyOnIndex();
        if (!is_null($instance)) {
            if ($instance->getStatus() > 3) {
                yield ChoiceField::new('status')
                    ->setChoices(Choice::ORDER_STATUSES)
                    ->hideWhenCreating()
                    ->setFormTypeOptions(['disabled' => 'disabled']);
            } else {
                yield ChoiceField::new('status')
                    ->setChoices(Choice::ORDER_STATUSES)
                    ->hideWhenCreating();
            }
        }
        yield ChoiceField::new('status')
            ->setChoices(Choice::ORDER_STATUSES)
            ->onlyOnIndex();
        yield DateTimeField::new('createdAt')->HideOnForm();
        yield TextareaField::new('note');
    }
}
