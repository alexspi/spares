<?php
use Alexspi\Spares\Model\PrsoProduct;
use Alexspi\Spares\Model\PrsoCategory;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(PrsoProduct::class, function (ModelConfiguration $model)
{
    $model->setTitle('Запчасти');
    $model->setAlias('spares/product');

    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name')->setLabel('Название'),
            AdminColumn::text('price')->setLabel('Цена'),
            AdminColumn::text('artikul')->setLabel('Артикулs'),
            AdminColumn::text('number')->setLabel('Оригинальный номер'),
        ]);

        $display->paginate(15);

        return $display;
    });

    $model->onCreateAndEdit(function () {

        $form = AdminForm::form()->setItems([
//            AdminFormElement::text('category_id', 'Category'),
            AdminFormElement::text('name', 'Товар')->required(),
            AdminFormElement::text('price', 'Цена'),
            AdminFormElement::text('slug', 'Ярлык (если не заполнять генерируется автоматически)'),
            AdminFormElement::text('status', 'Статус'),
            AdminFormElement::text('artikul', 'Артикул'),
            AdminFormElement::text('number', 'Номер'),
            AdminFormElement::multiselect('categories', 'Категории')->setModelForOptions(new PrsoCategory())->setDisplay('name'),
            AdminFormElement::text('views', 'Просмотры'),
            AdminFormElement::checkbox('show', 'Включен'),
//		AdminFormElement::checkbox('complected', 'Complected'),
//		AdminFormElement::text('complect_id', 'Complect'),
            AdminFormElement::textarea('description', 'Описание'),

        ]);
        $form->getButtons()
            ->setSaveButtonText('Сохранить');
//            ->hideSaveAndCloseButton();

        return $form;
    });
}) ;




