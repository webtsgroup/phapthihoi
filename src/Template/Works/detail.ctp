<?php
  use Cake\Routing\Router;
?>
<section id="subheader" data-speed="8" data-type="background" style="background-position: 50% 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?=__('Work information', true)?></h1>
                <!-- <ul class="crumb">
                    <li><a href="http://www.themenesia.com/themeforest/archi/index.html">Home</a></li>
                    <li class="sep">/</li>
                    <li>Blog</li>
                </ul> -->
            </div>
        </div>
    </div>
</section>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h4><?=$result['name']?></h4>
                <address>
                    <span><strong><?=__('Address', true)?>:</strong><?=$result['address']?></span>
                    <span><strong><?=__('Owner', true)?>:</strong><?=$result['owner']?></span>
                </address>
                <div class="work-detail">
                  <?=$result['content']?>
                </div>
                <ul class="blog-list">
                    <?php foreach ($result['galleries'] as $index => $item) {
                      ?>
                      <li>
                          <div class="post-content">
                              <div class="post-image">
                                  <img src="<?=$galleryPath . $item['file']?>" alt="<?=$result['name']?>">
                              </div>


                              <div class="date-box">
                                  <div class="day"></div>
                              </div>

                              <div class="post-text">
                                <p><?=$item['description']?></p>
                              </div>

                          </div>
                      </li>
                      <?php
                    } ?>

                </ul>

            </div>

            <div id="sidebar" class="col-md-3">
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
                <div class="widget widget_tags">
                    <h4><?=__('Keyword', true)?></h4>
                    <div class="small-border"></div>
                    <ul>
                      <?php foreach (explode(',', $result['keyword']) as $ind => $word) {
                        ?>
                        <li><a href="#"><?=$word?></a></li>
                        <?php
                      } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
