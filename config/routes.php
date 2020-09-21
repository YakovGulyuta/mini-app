<?php
return [
  '' => ['Default::index'],
  'page/(?P<id>[\d+]+)' => ['Page::view'],
  'page/(?P<alias>[\w-]+)' => ['Page::alias'],
  'page/(?P<alias>[\w-]+)/(?<id>[\d+]+)' => ['Page::rand'],
  'page' => ['Page::list']
  //^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$
];