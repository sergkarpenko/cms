<?php

require_once dirname(__FILE__).'/../bootstrap/unit.php';

$t = new lime_test(2);
$t->comment('::slugify()');
$t->is(1, 1, '::test() должен что то там');
$t->is(1, 1, '::test() должен что то там 2');
