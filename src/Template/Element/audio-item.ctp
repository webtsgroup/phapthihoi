<?php
  use Cake\Routing\Router;
?>
<div class="js-obj-mp3 item r" data-id="item-<?=$item['id']?>" data-src="<?=$item['audio'][0]['url']?>">
  <div class="item-media accent item-media-4by3">
    <a href="<?=Router::url(['controller' => 'Albums','action' => 'detail', $item['id']])?>" class="item-media-content" style="background-image: url('<?=$item['img']?>');"></a>
    <div class="item-overlay center">
      <button class="btn-playpause">Play</button>
    </div>
  </div>
  <div class="item-info">
    <div class="item-overlay bottom text-right">
      <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
      <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
      <div class="dropdown-menu pull-right black lt"></div>
    </div>
    <div class="item-title text-ellipsis">
      <a href="<?=Router::url(['controller' => 'Albums', 'action' => 'detail', $item['id']])?>"><?=$item['name']?></a>
    </div>
    <div class="item-author text-sm text-ellipsis">
      <a href="<?=Router::url(['controller' => 'Singers', 'action' => 'detail', $item['singer']['id']])?>" class="text-muted"><?=$item['singer']['name']?></a>
    </div>
  </div>
</div>
