<?php
  use Cake\Routing\Router;
?>
<div class="row-col">
  <div class="col-lg-9 b-r no-border-md">
    <div class="padding">


      <div class="page-title m-b">
        <h1 class="inline m-a-0"><?=__('Nghe pháp âm', true)?></h1>
        <div class="dropdown inline">
          <button class="btn btn-sm no-bg h4 m-y-0 v-b dropdown-toggle text-primary" data-toggle="dropdown">All</button>
          <div class="dropdown-menu">
            <a href="#" class="dropdown-item active">
              All
            </a>
            <a href="#" class="dropdown-item">
              acoustic
            </a>
            <a href="#" class="dropdown-item">
              ambient
            </a>
            <a href="#" class="dropdown-item">
              blues
            </a>
            <a href="#" class="dropdown-item">
              classical
            </a>
            <a href="#" class="dropdown-item">
              country
            </a>
            <a href="#" class="dropdown-item">
              electronic
            </a>
            <a href="#" class="dropdown-item">
              emo
            </a>
            <a href="#" class="dropdown-item">
              folk
            </a>
            <a href="#" class="dropdown-item">
              hardcore
            </a>
            <a href="#" class="dropdown-item">
              hip hop
            </a>
            <a href="#" class="dropdown-item">
              indie
            </a>
            <a href="#" class="dropdown-item">
              jazz
            </a>
            <a href="#" class="dropdown-item">
              latin
            </a>
            <a href="#" class="dropdown-item">
              metal
            </a>
            <a href="#" class="dropdown-item">
              pop
            </a>
            <a href="#" class="dropdown-item">
              pop punk
            </a>
            <a href="#" class="dropdown-item">
              punk
            </a>
            <a href="#" class="dropdown-item">
              reggae
            </a>
            <a href="#" class="dropdown-item">
              rnb
            </a>
            <a href="#" class="dropdown-item">
              rock
            </a>
            <a href="#" class="dropdown-item">
              soul
            </a>
            <a href="#" class="dropdown-item">
              world
            </a>
          </div>
        </div>
      </div>
      <div data-ui-jp="jscroll" class="jscroll-loading-center" data-ui-options="{
          autoTrigger: true,
          loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
          padding: 50,
          nextSelector: 'a.jscroll-next:last'
        }">
        <div class="row">
          <?php
          foreach ($results as $ind => $item) {
            ?>
              <div class="col-xs-4 col-sm-4 col-md-3">
                <?=$this->element('audio-item', ['item' => $item])?>
            </div>
            <?php } ?>
        </div>
        <div class="text-center">
          <a href="scroll.item.html" class="btn btn-sm white rounded jscroll-next">Show More</a>
        </div>
      </div>

    </div>
  </div>
  <?=$this->element('right')?>
</div>
