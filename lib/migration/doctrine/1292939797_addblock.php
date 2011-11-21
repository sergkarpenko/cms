<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addblock extends Doctrine_Migration_Base
{
  public function up()
  {
    $this->createTable('block', array(
      'id' =>
      array(
        'type' => 'integer',
        'length' => 8,
        'autoincrement' => true,
        'primary' => true,
      ),
      'name' =>
      array(
        'type' => 'string',
        'notnull' => true,
        'length' => 255,
      ),
      'description' =>
      array(
        'type' => 'string',
        'notnull' => true,
        'length' => 255,
      ),
    ), array(
      'indexes' =>
      array(
      ),
      'primary' =>
      array(
        0 => 'id',
      ),
    ));
  }

  public function down()
  {
    $this->dropTable('block');
  }
}