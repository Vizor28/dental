<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminDisplayFilter;
use AdminColumnFilter;

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


    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {

        // todo: remove if unused
        $display=AdminDisplay::datatables()
            /*->setActions([
                 AdminColumn::action('new_user', 'Зарегестрировать')->setIcon('fa fa-share')->setAction(url('/admin/users_theeths/'))->setMethod('get')
        ])*/
            ->setFilters(
                AdminDisplayFilter::field('status_id')->setAlias('status')->setTitle('status ID [:value]')
            )
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::link('id', '#')->setWidth('30px'),
                AdminColumn::datetime('date', 'Дата')->setFormat('d.m.Y'),
                AdminColumn::text('thooth.id', 'Зуб'),
                AdminColumn::text('status.name', 'Статус'),
                AdminColumn::relatedLink('doctor.name', 'Доктор'),
                AdminColumn::relatedLink('patient.fio', 'Пациент')
                //AdminColumn::checkbox()
            )->paginate(20);

        $display->getColumnFilters()->push(null)
            ->push(
                AdminColumnFilter::range()->setFrom(
                    AdminColumnFilter::date()->setPlaceholder('From Date')->setFormat('d.m.Y')
                )->setTo(
                    AdminColumnFilter::date()->setPlaceholder('To Date')->setFormat('d.m.Y')
                )
            )
            ->push(
                AdminColumnFilter::text()
            )
            ->push(
                AdminColumnFilter::select()->setPlaceholder('Статус')->setModel(new \App\Status)->setDisplay('name')
            )->push(
                AdminColumnFilter::select()->setPlaceholder('Доктор')->setModel(new \App\Doctor)->setDisplay('name')
            )->push(
                AdminColumnFilter::select()->setPlaceholder('Пациент')->setModel(new \App\Patient)->setDisplay('fio')
            )->push(null);

        return $display;
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
