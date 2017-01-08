<?php
  use Cake\Routing\Router;
  use Cake\I18n\I18n;
  I18n::locale('en_US');
?>
<nav>
  <ul id="mainmenu" class="line-separator">
    <li><a href="/"><i style="font-size: 16px" class="fa fa-home" aria-hidden="true"></i></a></li>
    <?php
    //for work module
    foreach ($workModules as $key => $mod) {
      ?>
      <li><a href="<?=Router::url(['controller' => 'Works','action' => 'index', $mod['alias']])?>"><?=$mod['name']?></a><span></span>
        <ul>
          <?php
          $module = $mod['id'];
          //for parent category (level 1)
          foreach ($workCategories[$module] as $i => $cat) {
            ?>
            <li><a href="<?=Router::url(['controller' => 'Works','action' => 'index', $cat['id'], $cat['name']])?>"><?=$cat['name']?></a><span></span>
              <ul>
                <?php
                //for children category (level 2)
                foreach ($cat['children'] as $j => $child) {
                  ?>
                  <li><a href="<?=Router::url(['controller' => 'Works','action' => 'index', $child['id'], $child['name']])?>"><?=$child['name']?></a></li>
                  <?php
                }
                ?>
              </ul>
            </li>
            <?php
          }
          ?>
        </ul>
      </li>
      <?php
    }
    ?>
    <li><a href="<?=$urlSetting['about']['url']?>"><?=$urlSetting['about']['text']?></a></li>
    <li><a href="<?=$urlSetting['contact']['url']?>"><?=$urlSetting['contact']['text']?></a></li>
  </ul>
</nav>
