<?php

return [
    'user/cabinet' => 'user/cabinet', //actionCabinet UserConteroller
    'user/login' => 'user/login', //actionLogin UserController
    'user/register' => 'user/register', //actionRegister UserController
    'user/logout' => 'user/logout', //actionLogout UserController
    'article/controll' => 'article/controll', //actionControll ArticleController 
    'article/create' => 'article/create', //actionCreate ArticleController
    'article/([0-9]+)' => 'article/view/$1', //actionView ArticleController
    'generate' => 'generate/index', //actionIndex GenerateController
    '' => 'site/index', //actionIndex SiteController
];