<?php
use Alexspi\Spares\Models\PrsoProduct;
use Alexspi\Spares\Models\PrsoProductUpdate;
use Alexspi\Spares\Models\PrsoCategory;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(PrsoProductUpdate::class, function (ModelConfiguration $model)
{
    $model->setTitle('Update');
    $model->setAlias('spares/update');

   
    $model->onCreateAndEdit(function () {

        $form = AdminForm::form();
        $form ->setAction(URL::to('admin/spares/update/create'));
        $form ->setItems([
//
            AdminFormElement::upload('file')->required(),
           
            
        ]);
        $form->getButtons()
            ->setSaveButtonText('Сохранить')
            ->hideSaveAndCloseButton();

        return $form;
    });
}) ;




