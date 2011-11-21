<?php

class Addinvestorstable extends Doctrine_Migration_Base
{
  public function up()
  {
    $this->createTable('investor', array(
      'id' =>
      array(
        'type' => 'integer',
        'length' => 8,
        'autoincrement' => true,
        'primary' => true,
      ),
      'whois' =>
      array(
        'type' => 'string',
        'notnull' => true,
        'length' => 255,
      ),
      'name' =>
      array(
        'type' => 'string',
        'notnull' => true,
        'length' => 255,
      ),
      'project' =>
      array(
        'type' => 'string',
        'notnull' => true,
        'length' => 255,
      ),
      'role' =>
      array(
        'type' => 'string',
        'notnull' => true,
        'length' => 255,
      ),
      'phone' =>
      array(
        'type' => 'string',
        'notnull' => true,
        'length' => 255,
      ),
      'email' =>
      array(
        'type' => 'string',
        'notnull' => true,
        'length' => 255,
      ),
      'message' =>
      array(
        'type' => 'clob',
        'length' => NULL,
      ),
      'created_at' =>
      array(
        'notnull' => true,
        'type' => 'timestamp',
        'length' => 25,
      ),
      'updated_at' =>
      array(
        'notnull' => true,
        'type' => 'timestamp',
        'length' => 25,
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
    $this->dropTable('investor');
  }
}
