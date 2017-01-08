<?php
  use Cake\Routing\Router;
  $URL = Router::url(['controller' => 'Categories','action' => 'add', '?' => ['mod' => $mod]])
?>
<div class="ibox">
<div class="ibox-content main-content">
    <div class="row m-b">
      <div class="col-md-6">
        <h2><?php echo __('Categories'); ?></h2>
      </div>
      <div class="col-md-6 text-right">
        <div class="btn-group">
          <?php
          echo $this->Html->link(
            __('Create', true),
            ['controller' => 'Categories', 'action' => 'add', '?' => ['mod' => $mod]],
            ['class' => 'btn btn-default btn-create']
          ); ?>
        </div>
      </div>
    </div>
    <div class="dd" id="nestable2">
        <ol class="dd-list">
            <?php
            foreach($modules as $id => $name) {
              ?>
              <li class="dd-item" data-id="<?=$id?>">
                  <div class="dd-handle">
                      <i class="fa fa-list-ol" aria-hidden="true"></i>
                      <strong><?=$name?></strong>
                  </div>
                  <ol class="dd-list" style="">
                      <?php
                      if (isset($categories[$id])) {
                        foreach($categories[$id] as $cat) { ?>
                          <li id="js-row-<?=$cat['id']?>" class="dd-item" data-id="2">
                            <div class="dd-handle">
                              <span class="pull-right">
                                <div class="btn-group">
                                  <a href="<?=Router::url(['controller' => 'Categories','action' => 'add', '?' => ['mod' => $mod]])?>" class="btn btn-xs btn-default">
                                    <i class="fa fa-plus"></i></a>
                                  <a href="<?=Router::url(['controller' => 'Works','action' => 'index', $cat['id']])?>" class="btn btn-xs btn-default">
                                    <i class="fa fa-list"></i>
                                  </a>
                                  <a href="<?=Router::url(['controller' => 'Categories','action' => 'edit', $cat['id'], '?' => ['mod' => $mod]])?>" class="btn btn-xs btn-default">
                                    <i class="fa fa-pencil"></i>
                                  </a>
                                  <button type="button" data-id="<?=$cat['id']?>" data-url="<?=Router::url(['controller' => 'Categories','action' => 'delete', $cat['id'], '?' => ['mod' => $mod]])?>" class="btn btn-xs btn-default js-delete-item">
                                    <i class="fa fa-trash"></i></button>
                                </div>
                              </span>
                              <i class="fa fa-sort-desc" aria-hidden="true"></i> <?=$cat['name']?>
                            </div>
                            <ol class="dd-list" style="">
                                <?php
                                if (isset($cat['children'])) {
                                  foreach($cat['children'] as $sub) { ?>
                                    <li id="js-row-<?=$sub['id']?>" class="dd-item" data-id="2">
                                      <div class="dd-handle">
                                        <span class="pull-right">
                                          <div class="btn-group">
                                            <a href="<?=Router::url(['controller' => 'Works','action' => 'index', $sub['id']])?>" class="btn btn-xs btn-default">
                                              <i class="fa fa-list"></i>
                                            </a>
                                            <a href="<?=Router::url(['controller' => 'Categories','action' => 'edit', $sub['id'], '?' => ['mod' => $mod]])?>" class="btn btn-xs btn-default">
                                              <i class="fa fa-pencil"></i>
                                            </a>
                                            <button type="button" data-id="<?=$sub['id']?>" data-url="<?=Router::url(['controller' => 'Categories','action' => 'delete', $sub['id'], '?' => ['mod' => $mod]])?>" class="btn btn-xs btn-default js-delete-item">
                                              <i class="fa fa-trash"></i></button>
                                          </div>
                                        </span>
                                        <?=$sub['name']?>
                                      </div>
                                    </li>
                                    <?php }
                                } ?>
                            </ol>
                          </li>
                          <?php }
                      } ?>
                  </ol>
              </li>
              <?php
            } ?>
        </ol>
    </div>
</div>
</div>
