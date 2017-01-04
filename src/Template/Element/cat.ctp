<?php
  use Cake\Routing\Router;
?>
<div class="widget widget_category">
    <h4><?=__('Categories', true)?></h4>
    <ul>
    <?php
    //for work module
    foreach ($workModules as $key => $mod) {
      $module = $mod['id'];
      //for parent category (level 1)
      foreach ($workCategories[$module] as $i => $cat) {
        ?>
        <li><a href="<?=Router::url(['controller' => 'Works','action' => 'index', $cat['id']])?>">
          <span class="id-color"><?=$cat['name']?></a><span></span></span>
          <ul>
            <?php
            //for children category (level 2)
            foreach ($cat['children'] as $j => $child) {
              ?>
              <li class="cat-child-item">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <a href="<?=Router::url(['controller' => 'Works','action' => 'index', $child['id']])?>"><?=$child['name']?></a>
              </li>
              <?php
            }
            ?>
          </ul>
        </li>
        <?php
      }
    }
    ?>
  </ul>
</div>
