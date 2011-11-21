<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addnews extends Doctrine_Migration_Base
{
  public function up()
  {
    $this->createTable('news', array(
      'id' =>
      array(
        'type' => 'integer',
        'length' => 8,
        'autoincrement' => true,
        'primary' => true,
      ),
      'picture' =>
      array(
        'type' => 'string',
        'length' => 255,
      ),
      'status' =>
      array(
        'type' => 'enum',
        'values' =>
        array(
          0 => 'Активно',
          1 => 'Неактивно',
        ),
        'length' => NULL,
      ),
      'slug' =>
      array(
        'type' => 'string',
        'length' => 255,
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
        'news_sluggable' =>
        array(
          'fields' =>
          array(
            0 => 'slug',
          ),
          'type' => 'unique',
        ),
      ),
      'primary' =>
      array(
        0 => 'id',
      ),
    ));
  }

  public function down()
  {
    $this->dropTable('news');
  }
}