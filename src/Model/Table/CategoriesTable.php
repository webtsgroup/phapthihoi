<?php
// src/Model/Table/CategoriesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class CategoriesTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Tree');
    $this->belongsTo('Modules', [
      'className' => 'Modules',
      'foreignKey' => 'module_id'
    ]);
    // $this->hasMany('Categories', [
    //   'className' => 'Categories',
    //   'foreignKey' => 'parent_id'
    // ]);
  }
}
