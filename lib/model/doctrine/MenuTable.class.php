<?php

/**
 * MenuTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MenuTable extends Doctrine_Table
{
  const ACTIVE = 0;

  /**
   * Returns an instance of this class.
   *
   * @return object MenuTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Menu');
  }

  public function doSelectI18n(Doctrine_Query $q)
  {
    $rootAlias = $q->getRootAlias();

    $q->leftJoin($rootAlias . '.Translation t')
        ->andWhere('t.lang = ?', 'ru')
        ->orderBy('position ASC');
    return $q;
  }
}