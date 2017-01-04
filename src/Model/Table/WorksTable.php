<?php
// src/Model/Table/CategoriesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class WorksTable extends Table
{
  public function initialize(array $config)
  {
    $this->hasMany('Galleries', [
      'className' => 'Galleries',
      'foreignKey' => 'reference_id',
      'conditions' => ['type' => 'work']
    ]);
    $this->hasOne('Avatar', [
      'className' => 'Galleries',
      'foreignKey' => 'reference_id',
      'strategy' => 'select',
      'conditions' => function ($e, $query) {
        $query->order(['Avatar.id' => 'ASC']);
        return [];
      }
    ]);
  }
}
