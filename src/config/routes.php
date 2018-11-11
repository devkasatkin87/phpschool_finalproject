<?php

return [
    'article/([0-9]+)' => 'site/article/$1', //actionArticle SiteController
    'generate' => 'generate/index', //actionIndex GenerateController
    '' => 'site/index', //actionIndex SiteController
];