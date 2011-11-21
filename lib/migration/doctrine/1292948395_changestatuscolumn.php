<?php

/**
 * Преобразование статусов в инт
 */
class Changestatuscolumn extends Doctrine_Migration_Base
{
  public function up()
  {
    $this->changeColumn('news', 'status', 'integer');
    $this->changeColumn('page', 'status', 'integer');
    $this->changeColumn('menu', 'status', 'integer');
  }

  public function down()
  {
    $this->changeColumn('news', 'status', 'string');
    $this->changeColumn('page', 'status', 'string');
    $this->changeColumn('menu', 'status', 'string');
  }
}
