<?php

return [
    'article/create' => 'article/create', //actionCreate ArticleController
    'article/([0-9]+)' => 'article/view/$1', //actionView ArticleController
    'generate' => 'generate/index', //actionIndex GenerateController
    '' => 'site/index', //actionIndex SiteController
];