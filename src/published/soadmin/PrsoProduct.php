<?php

Admin::model('Alexspi\Spares\Model\PrsoProduct')->title('Товары')->display(function ()
{
    $display = AdminDisplay::datatables();
    $display->with();
    $display->filters([

    ]);
    $display->columns([
        Column::string('name')->label('Товар'),
        Column::string('id')->label('Id'),
        Column::string('show')->label('Включен'),
        Column::string('views')->label('Просмотры'),
        Column::datetime('created_at')->label('Создан')->format('d.m.Y'),
    ]);
    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();
    $form->items([
//		AdminFormElement::text('category_id', 'Category'),
        AdminFormElement::text('name', 'Товар')->required(),
        AdminFormElement::text('cost', 'Цена'),
        AdminFormElement::text('slug', 'Ярлык (если не заполнять генерируется автоматически)'),
        AdminFormElement::text('status', 'Статус'),
        AdminFormElement::text('artikul', 'Артикул'),
        AdminFormElement::multiselect('categories', 'Категории')->model('Alexspi\Spares\Model\PrsoCategory')->display('name'),
        AdminFormElement::text('views', 'Просмотры')->readonly(),
        AdminFormElement::checkbox('show', 'Включен')->defaultValue(true),
//		AdminFormElement::checkbox('complected', 'Complected'),
//		AdminFormElement::text('complect_id', 'Complect'),
        AdminFormElement::ckeditor('note', 'Аннотация'),
        AdminFormElement::ckeditor('description', 'Описание'),
//        AdminFormElement::multiimages('photos', 'Изображения'),
    ]);
    return $form;
});