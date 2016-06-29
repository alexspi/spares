<?php
use Alexspi\Spares\Model\PrsoCategory;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(PrsoCategory::class, function (ModelConfiguration $model)
{
    $model->setTitle('Категории');
    $model->setAlias('spares/categoryes');

    $model->onDisplay(function () {
        $display = AdminDisplay::tree()->setValue('name');
        return $display;
    });

    $model->onCreateAndEdit(function () {

        $form = AdminForm::form()->setItems([
            AdminFormElement::text('name', 'Название'),
            AdminFormElement::text('slug', 'Ярлык'),
//            AdminFormElement::checkbox('showtop', 'Главное меню'),
//            AdminFormElement::checkbox('showside', 'Боковое меню'),
//            AdminFormElement::checkbox('showbottom', 'Меню подвала'),
//            AdminFormElement::checkbox('showcontent', 'В спсике категорий'),
//            AdminFormElement::ckeditor('note', 'Аннотация'),
//            AdminFormElement::ckeditor('desc', 'Описание'),
        ]);
        $form->getButtons()
            ->setSaveButtonText('Сохранить');
//            ->hideSaveAndCloseButton();

        return $form;
    });
}) ;




