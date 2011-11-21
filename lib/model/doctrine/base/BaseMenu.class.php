<?php

/**
 * BaseMenu
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @property string $name
 * @property string $url
 * @property integer $position
 * @property integer $status
 *
 * @method string  getName()     Returns the current record's "name" value
 * @method string  getUrl()      Returns the current record's "url" value
 * @method integer getPosition() Returns the current record's "position" value
 * @method integer getStatus()   Returns the current record's "status" value
 * @method Menu    setName()     Sets the current record's "name" value
 * @method Menu    setUrl()      Sets the current record's "url" value
 * @method Menu    setPosition() Sets the current record's "position" value
 * @method Menu    setStatus()   Sets the current record's "status" value
 *
 * @package    si-invest
 * @subpackage model
 * @author     sergk
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMenu extends sfDoctrineRecord
{
  public function setTableDefinition()
  {
    $this->setTableName('menu');
    $this->hasColumn('name', 'string', 255, array(
      'type' => 'string',
      'notnull' => true,
      'length' => 255,
    ));
    $this->hasColumn('url', 'string', 255, array(
      'type' => 'string',
      'notnull' => true,
      'length' => 255,
    ));
    $this->hasColumn('position', 'integer', null, array(
      'type' => 'integer',
    ));
    $this->hasColumn('status', 'integer', null, array(
      'type' => 'integer',
    ));
  }

  public function setUp()
  {
    parent::setUp();
    $i18n0 = new Doctrine_Template_I18n(array(
      'fields' =>
      array(
        0 => 'name',
      ),
    ));
    $this->actAs($i18n0);
  }
}