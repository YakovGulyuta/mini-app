<?php
return [
  '^$' => ['Default::index'],
  '^page/([\d+]+$)' => ['Page::view'],
  '^page/([\w-]+)$' => ['Page::alias'],
  '^page/([\w-]+)/([\d+]+)$' => ['Page::rand'],
  '^page$' => ['Page::list']
];