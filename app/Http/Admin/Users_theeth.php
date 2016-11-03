<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;

class Users_theeth extends Section
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    public $timestamps = false;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        // todo: remove if unused
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::link('id', '#')->setWidth('30px'),
                AdminColumn::datetime('date', 'Дата')->setFormat('d.m.Y'),
                AdminColumn::text('text', 'Описание'),
                AdminColumn::text('thooth.name', 'Зуб'),
                AdminColumn::text('status.name', 'Статус'),
                AdminColumn::relatedLink('clinic.name', 'Клиника'),
                AdminColumn::relatedLink('doctor.name', 'Доктор'),
                AdminColumn::relatedLink('patient.fio', 'Пациент')
            )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        // todo: remove if unused
        return AdminForm::panel()->addBody([
            AdminFormElement::date('date', 'Дата')->setFormat('d.m.Y')->required(),

            AdminFormElement::select('thooth_id', 'Зуб')
                ->setModelForOptions('App\Thooth')->setDisplay('id')->required(),
            AdminFormElement::select('status_id', 'Статус')
                ->setModelForOptions('App\Status')->setDisplay('name')->required(),
            AdminFormElement::select('clinic_id', 'Клиника')
                ->setModelForOptions('App\Clinic')->setDisplay('name')->required(),
            AdminFormElement::select('doctor_id', 'Доктор')
                ->setModelForOptions('App\Doctor')->setDisplay('name')->required(),
            AdminFormElement::select('patient_id', 'Пациент')
                ->setModelForOptions('App\Patient')->setDisplay('fio')->required(),
            AdminFormElement::wysiwyg('text', 'Описание')->required()
        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}
