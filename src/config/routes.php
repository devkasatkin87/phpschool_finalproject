<?php

return [
    'user/login' => 'user/login', //actionLogin UserContorller
    'user/logout' => 'user/logout', //actionLogout UserContorller
    'user/register' => 'user/register', //actionRegister UserContorller
    'article/([0-9]+)' => 'site/article/$1', //actionArticle SiteController
    'generate' => 'generate/index', //actionIndex GenerateController
    '' => 'site/index', //actionIndex SiteController
];