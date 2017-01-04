<?php
  use Cake\Routing\Router;
?>
<section id="subheader" data-speed="8" data-type="background" style="background-position: 50% 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1></h1>
            </div>
        </div>
    </div>
</section>
<div id="content">
  <div class="container">
      <div class="row">
          <div class="col-md-9">
              <div class="row">
                <div class="container">

                    <div class="spacer-single"></div>

                    <!-- portfolio filter begin -->
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <ul id="filters" class="wow fadeInUp animated" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                                <li><a href="#" data-filter="*" class="selected">All</a></li>
                                <?php foreach ($path as $key => $value) {
                                  ?>
                                  <li><a href="<?=Router::url(['controller' => 'Works','action' => 'index', $key])?>" class=""><?=$value?></a></li>
                                  <?php
                                } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- portfolio filter close -->

                </div>
                <div id="gallery" class="grid_gallery gallery de-gallery wow fadeInUp isotope animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; position: relative; overflow: hidden; height: 478px;">

                    <?php foreach ($results as $ind => $item) {
                      ?>
                      <!-- gallery item -->
                      <div class="col-md-4 item residential isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);">
                          <div class="picframe" style="height: 239px;">
                              <a href="<?=Router::url(['controller' => 'Works','action' => 'detail', $item['id']])?>">
                                  <span class="overlay" style="opacity: 0; width: 359px; height: 239px;">
                                      <span class="pf_text" style="margin-top: 102.5px;">
                                          <span class="project-name"><?=$item['name']?></span>
                                      </span>
                                  </span>
                              </a>
                              <img src="<?=$galleryPathThumb . $item['avatar']['file']?>" alt="<?=$item['name']?>" style="width: 100%; height: auto; margin-left: 0px; margin-top: 0px;">
                          </div>
                      </div>
                      <!-- close gallery item -->
                      <?php
                    } ?>


                </div>
              </div>
          </div>
          <div id="sidebar" class="col-md-3">
              <!-- <div class="widget widget_search">
                  <input type="text" name="search" id="search" class="form-control" placeholder="search product">
                  <button id="btn-search" type="submit"></button>
                  <div class="clearfix"></div>
              </div> -->

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
          </div>
      </div>
  </div>
</div>
