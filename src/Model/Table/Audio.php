<?php
// src/Model/Table/CategoriesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class AudioTable extends Table
{
  public function initialize(array $config)
  {
    $this->belongTo('AudioAlbums', [
      'className' => 'AudioAlbums',
      'foreignKey' => 'album_id'
    ]);
  }
}
