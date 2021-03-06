<?php

return [
    'user/office' => 'user/index', //actionCabinet UserConteroller
    'user/login' => 'user/login', //actionLogin UserController
    'user/register' => 'user/register', //actionRegister UserController
    'user/logout' => 'user/logout', //actionLogout UserController
    'article/controll/add' => 'article/add', //actionAdd ArticleController
    'article/controll/update/([0-9]+)' => 'article/update/$1', //actionUpdate ArticleController
    'article/controll/delete/([0-9]+)' => 'article/delete/$1', //actionDelete ArticleController
    'article/controll' => 'article/controll', //actionControll ArticleController 
    'article/create' => 'article/create', //actionCreate ArticleController
    'article/([0-9]+)' => 'article/view/$1', //actionView ArticleController
    'generate/sync' => 'generate/sync', //actionSync GenerateController
    'generate' => 'generate/index', //actionIndex GenerateController
    '' => 'site/index', //actionIndex SiteController
];