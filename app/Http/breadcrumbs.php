<?php

// Home
Breadcrumbs::register('index', function($breadcrumbs)
{
    $breadcrumbs->push('Главная', route('index'));
});

// Home > posters
Breadcrumbs::register('posters', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Афиша концертов', route('posters'));
});

// Home > posters
Breadcrumbs::register('concert', function($breadcrumbs, $concert)
{
    $breadcrumbs->parent('posters');
    $breadcrumbs->push($concert->name."/".$concert->date_code, route('concert', [$concert->name, $concert->date_time] ));
});

// Home > offices
Breadcrumbs::register('offices', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Кассы', route('offices'));
});

// Home > hall
Breadcrumbs::register('hall', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Схема зала', route('hall'));
});

// Home > contact
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Контакты', route('contact'));
});
