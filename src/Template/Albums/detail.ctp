<?php
  use Cake\Routing\Router;
?>
<div class="padding b-b">
  <div class="row-col">
      <div class="col-sm w w-auto-xs m-b">
        <div class="item w r">
          <div class="item-media item-media-4by3">
            <div class="item-media-content" style="background-image: url('<?=$detail['img']?>');"></div>
          </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="p-l-md no-padding-xs">
          <div class="page-title">
            <h1 class="inline"><?=$detail['name']?></h1>
          </div>
          <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">
            <?=$detail['info']?>
          </p>
          <div class="item-action m-b">
            <a class="btn btn-icon white rounded btn-share pull-right" data-toggle="modal" data-target="#share-modal"><i class="fa fa-share-alt"></i></a>
            <button class="btn-playpause text-primary m-r-sm"></button>
            <span class="text-muted"><?=$detail['viewed']?></span>
            <a class="btn btn-icon rounded btn-favorite"><i class="fa fa-heart-o"></i></a>
            <span class="text-muted">232</span>
            <div class="inline dropdown m-l-xs">
              <a class="btn btn-icon rounded btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
              <div class="dropdown-menu pull-right black lt"></div>
            </div>
          </div>
          <div class="item-meta">
            <a class="btn btn-xs rounded white">Pop</a> <a class="btn btn-xs rounded white">Happy</a>
          </div>
        </div>
      </div>
  </div>
</div>

<div class="row-col">
  <div class="col-lg-9 b-r no-border-md">
    <div class="padding">
      <h6 class="m-b">
        <span class="text-muted">by</span>
        <a href="<?=Router::url(['controller' => 'Singers', 'action' => 'detail', $detail['singer']['id']])?>" data-pjax class="item-author _600"><?=$detail['singer']['name']?></a>
        <span class="text-muted text-sm">- <?=count($detail['audio'])?> audio, 50 min 32 sec</span>
      </h6>
      <div id="tracks" class="row item-list item-list-xs item-list-li m-b">
        <?php
        foreach ($detail['audio'] as $ind => $audio) {
          ?>
          <div class="col-xs-12">
            <div class="item r" data-id="item-<?=$audio['id']?>" data-src="<?=$audio['url']?>">
              <div class="item-media item-media-4by3">
                <a href="<?=Router::url(['controller' => 'Albums', 'action' => 'detail', $detail['id']])?>" class="item-media-content" style="background-image: url('/img/b0.jpg');"></a>
                <div class="item-overlay center">
                  <button  class="btn-playpause">Play</button>
                </div>
              </div>
              <div class="item-info">
                <div class="item-overlay bottom text-right">
                  <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                  <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                  <div class="dropdown-menu pull-right black lt"></div>
                </div>
                <div class="item-title text-ellipsis">
                  <a href="<?=Router::url(['controller' => 'Albums', 'action' => 'detail', $detail['id']])?>"><?=$audio['title']?></a>
                </div>
                <div class="item-author text-sm text-ellipsis hide">
                  <a href="<?=Router::url(['controller' => 'Singers', 'action' => 'detail', $detail['singer']['id']])?>" class="text-muted"><?=$detail['singer']['name']?></a>
                </div>
                <div class="item-meta text-sm text-muted">
                  <span class="item-meta-right">5:05</span>
                </div>
              </div>
            </div>
          </div>
          <?php
        } ?>
      </div>
      <h5 class="m-b"><?=__('Cùng tác giả')?></h5>
      <div class="row m-b">
      <?php
      foreach($sameSinger as $ind => $item) {
        ?>
        <div class="col-xs-6 col-sm-6 col-md-3">
          <div class="item r" data-id="item-<?=$item['id']?>" data-src="<?=$item['audio'][0]['url']?>">
            <div class="item-media item-media-4by3">
              <a href="<?=Router::url(['controller' => 'Albums','action' => 'detail', $item['id']])?>" class="item-media-content" style="background-image: url('<?=$item['img']?>');"></a>
              <div class="item-overlay center">
                <button  class="btn-playpause">Play</button>
              </div>
            </div>
            <div class="item-info">
              <div class="item-overlay bottom text-right">
                <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                <div class="dropdown-menu pull-right black lt"></div>
              </div>
              <div class="item-title text-ellipsis">
                <a href="<?=Router::url(['controller' => 'Albums','action' => 'detail', $item['id']])?>"><?=$item['name']?></a>
              </div>
              <div class="item-author text-sm text-ellipsis hide">
                <a href="<?=Router::url(['controller' => 'Singers', 'action' => 'detail', $item['singer']['id']])?>" class="text-muted"><?=$item['singer']['name']?></a>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
      </div>
    </div>
  </div>
  <?=$this->element('right')?>
</div>
