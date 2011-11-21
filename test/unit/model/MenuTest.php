<?php

include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(1);

$t->comment('->getPosition()');
$menu = Doctrine_Core::getTable('Menu')->createQuery()->fetchOne();
$t->is($menu->getPosition(), 0, '->getPosition must be 0');