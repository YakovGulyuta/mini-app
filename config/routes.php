<?php
return [
    '^$' => ['Default::index'],
    '^page$' => ['Page::index'],
    '^page/list$' => ['Page::list'],
//    '^page/list/views/land$' => ['Page::list'],
    '^page/list/([a-z]+)/([0-9]+)$' => ['Page::view']
];