<?php

namespace App\Controller\Admin;

use App\Entity\Product;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use App\Admin\Field\VichImageField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            TextField::new('spec'),
            TextareaField::new('intro'),
            TextField::new('sn')
                ->HideWhenUpdating()
                ->setHelp('<b>商品编号</b>为总公司内部常用商品编号')
            ,
            TextField::new('sn')->onlyWhenUpdating()->setFormTypeOptions(['disabled' => 'disabled']),
            MoneyField::new('price')->setCurrency('CNY'),
            ImageField::new('img', 'Product Image')
                ->hideOnForm()
                ->setBasePath('img/product/thumbnail/')
                // ->setUploadDir('public/img/product/')
            ,
            VichImageField::new('imageFile', 'Product Image')
                ->onlyOnForms()
            ,
        ];
    }
}
