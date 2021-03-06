<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;

class Doctor extends Section
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
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('name', 'ФИО'),
                AdminColumn::email('email', 'Email'),
                AdminColumn::text('experience', 'Стаж'),
                AdminColumn::lists('clinics.name', 'Клиники'),
                AdminColumn::lists('directions.name', 'Направление')
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
            AdminFormElement::text('name', 'ФИО')->required()->unique(),
            AdminFormElement::text('email', 'Email')->required()->unique(),
            AdminFormElement::text('experience', 'Стаж'),
            AdminFormElement::multiselect('clinics', 'Клиники')
                ->setModelForOptions('App\Clinic')->setDisplay('name'),
            AdminFormElement::multiselect('directions', 'Направление')
                ->setModelForOptions('App\Direction')->setDisplay('name'),
            AdminFormElement::wysiwyg('text', 'Текст')
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
