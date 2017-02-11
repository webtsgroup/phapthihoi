<?php
// src/Model/Table/CategoriesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class AudioAlbumsTable extends Table
{
  public function initialize(array $config)
  {
    $this->hasMany('Audio', [
      'className' => 'Audio',
      'foreignKey' => 'album_id'
    ]);
    $this->belongsTo('Singers', [
      'className' => 'Singers',
      'foreignKey' => 'singer_id'
    ]);
  }
}
