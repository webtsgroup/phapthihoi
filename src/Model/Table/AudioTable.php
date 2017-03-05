<?php
// src/Model/Table/CategoriesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class AudioTable extends Table
{
  public function initialize(array $config)
  {
    $this->belongsTo('AudioAlbums', [
      'className' => 'AudioAlbums',
      'foreignKey' => 'album_id'
    ]);
    $this->belongsTo('Singers', [
      'className' => 'Singers',
      'foreignKey' => 'singer_id'
    ]);
  }
}
