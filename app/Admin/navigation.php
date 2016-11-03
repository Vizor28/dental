<?php

use SleepingOwl\Admin\Navigation\Page;

return [
    [
        'title' => 'Зарегистрированые юзера',
        'icon' => 'fa fa-newspaper-o',
        'priority'=>'1',
        'model' => \App\User::class,
    ],
    [
        'title' => 'Зубы',
        'icon' => 'fa fa-newspaper-o',
        'priority'=>'2',
        'model' => \App\Thooth::class,
    ],
    [
        'title' => 'Пациенты',
        'icon' => 'fa fa-newspaper-o',
        'priority'=>'3',
        'model' => \App\Patient::class,
    ],
    [
        'title' => 'Доктора',
        'icon' => 'fa fa-newspaper-o',
        'priority'=>'4',
        'model' => \App\Doctor::class,
    ],
    [
        'title' => 'Клиники',
        'icon' => 'fa fa-newspaper-o',
        'priority'=>'5',
        'model' => \App\Clinic::class,
    ],
    [
        'title' => 'Изменение зубов',
        'icon' => 'fa fa-newspaper-o',
        'priority'=>'6',
        'model' => \App\Users_theeth::class,
    ],
];