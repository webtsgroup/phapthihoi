<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
//use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?=$systemConfigs['seo_title']?></title>
  <meta name="keywords" content="<?=$systemConfigs['seo_keyword']?>">
  <meta name="description" content="<?=$systemConfigs['seo_description']?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="/img/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="/img/logo.png">

    <?= $this->Html->css('animate.css/animate.min') ?>
    <?= $this->Html->css('glyphicons/glyphicons') ?>
    <?= $this->Html->css('font-awesome/css/font-awesome.min') ?>
    <?= $this->Html->css('material-design-icons/material-design-icons') ?>
    <?= $this->Html->css('bootstrap/dist/css/bootstrap.min') ?>
    <?= $this->Html->css('styles/app') ?>
    <?= $this->Html->css('styles/style') ?>
    <?= $this->Html->css('styles/font') ?>
    <?= $this->Html->css('/js/libs/owl.carousel/dist/assets/owl.carousel.min') ?>
    <?= $this->Html->css('/js/libs/owl.carousel/dist/assets/owl.theme') ?>
    <?= $this->Html->css('/js/libs/mediaelement/build/mediaelementplayer.min') ?>
    <?= $this->Html->css('/js/libs/mediaelement/build/mep') ?>

</head>
<body>
  <div class="app dk" id="app">

<!-- ############ LAYOUT START-->

  <?=$this->element('sidebar');?>

  <!-- content -->
  <div id="content" class="app-content white bg box-shadow-z2" role="main">
    <div class="app-header hidden-lg-up white lt box-shadow-z1">
        <div class="navbar">
        <!-- brand -->
        <a href="index.html" class="navbar-brand md">
        	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
        		<circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"/>
        		<circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color"/>
        		<circle cx="24" cy="24" r="10" fill="#ffffff"/>
        		<circle cx="13" cy="13" r="2"  fill="#ffffff" class="brand-animate"/>
        		<path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
        		<circle cx="24" cy="24" r="3" fill="#000000"/>
        	</svg>

        	<img src="/img/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline">pulse</span>
        </a>
        <!-- / brand -->
        <!-- nabar right -->
        <ul class="nav navbar-nav pull-right">
          <li class="nav-item">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="nav-link">
              <i class="material-icons">menu</i>
            </a>
            <!-- / -->
          </li>
        </ul>
        <!-- / navbar right -->
      </div>
    </div>
    <div class="app-footer app-player grey bg">
      <div class="playlist" style="width:100%"></div>
    </div>
    <div class="app-body" id="view">
      <!-- ############ PAGE START-->
      <div class="page-content">
        <?=$this->fetch('content')?>
      </div>
      <!-- ############ PAGE END-->
    </div>
  </div>
  <!-- / -->


  <!-- ############ SWITHCHER START-->
    <div id="switcher">
      <div class="switcher white" id="sw-theme">
        <a href="#" data-ui-toggle-class="active" data-ui-target="#sw-theme" class="white sw-btn">
          <i class="fa fa-gear text-muted"></i>
        </a>
        <div class="box-header">
          <strong>Theme Switcher</strong>
        </div>
        <div class="box-divider"></div>
        <div class="box-body">
          <p id="settingLayout" class="hidden-md-down">
            <label class="md-check m-y-xs" data-target="folded">
              <input type="checkbox">
              <i class="green"></i>
              <span>Folded Aside</span>
            </label>
            <label class="m-y-xs pointer" data-ui-fullscreen data-target="fullscreen">
              <span class="fa fa-expand fa-fw m-r-xs"></span>
              <span>Fullscreen Mode</span>
            </label>
          </p>
          <p>Colors:</p>
          <p data-target="color">
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="primary">
              <i class="primary"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="accent">
              <i class="accent"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warn">
              <i class="warn"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="success">
              <i class="success"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="info">
              <i class="info"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="blue">
              <i class="blue"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warning">
              <i class="warning"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="danger">
              <i class="danger"></i>
            </label>
          </p>
          <p>Themes:</p>
          <div data-target="bg" class="text-u-c text-center _600 clearfix">
            <label class="p-a col-xs-3 light pointer m-a-0">
              <input type="radio" name="theme" value="" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
            <label class="p-a col-xs-3 grey pointer m-a-0">
              <input type="radio" name="theme" value="grey" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
            <label class="p-a col-xs-3 dark pointer m-a-0">
              <input type="radio" name="theme" value="dark" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
            <label class="p-a col-xs-3 black pointer m-a-0">
              <input type="radio" name="theme" value="black" hidden>
              <i class="active-checked fa fa-check"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  <!-- ############ SWITHCHER END-->
  <!-- ############ SEARCH START -->
    <div class="modal white lt fade" id="search-modal" data-backdrop="false">
      <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
      <div class="row-col">
        <div class="p-a-lg h-v row-cell v-m">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <form action="search.html" class="m-b-md">
                <div class="input-group input-group-lg">
                  <input type="text" class="form-control" placeholder="Type keyword" data-ui-toggle-class="hide" data-ui-target="#search-result">
                  <span class="input-group-btn">
                    <button class="btn b-a no-shadow white" type="submit">Search</button>
                  </span>
                </div>
              </form>
              <div id="search-result" class="animated fadeIn">
                <p class="m-b-md"><strong>23</strong> <span class="text-muted">Results found for: </span><strong>Keyword</strong></p>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row item-list item-list-sm item-list-by m-b">
                          <div class="col-xs-12">
                          	<div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                      			<div class="item-media ">
                      				<a href="track.detail.html" class="item-media-content" style="background-image: url('/img/b2.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="track.detail.html">I Wanna Be In the Cavalry</a>
                      				</div>
                      				<div class="item-author text-sm text-ellipsis ">
                      					<a href="artist.detail.html" class="text-muted">Jeremy Scott</a>
                      				</div>
                      				<div class="item-meta text-sm text-muted">
                      		        </div>


                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item r" data-id="item-6" data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                      			<div class="item-media ">
                      				<a href="track.detail.html" class="item-media-content" style="background-image: url('/img/b5.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="track.detail.html">Body on me</a>
                      				</div>
                      				<div class="item-author text-sm text-ellipsis ">
                      					<a href="artist.detail.html" class="text-muted">Rita Ora</a>
                      				</div>
                      				<div class="item-meta text-sm text-muted">
                      		        </div>


                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                      			<div class="item-media ">
                      				<a href="track.detail.html" class="item-media-content" style="background-image: url('/img/b1.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="track.detail.html">Fireworks</a>
                      				</div>
                      				<div class="item-author text-sm text-ellipsis ">
                      					<a href="artist.detail.html" class="text-muted">Kygo</a>
                      				</div>
                      				<div class="item-meta text-sm text-muted">
                      		        </div>


                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item r" data-id="item-7" data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                      			<div class="item-media ">
                      				<a href="track.detail.html" class="item-media-content" style="background-image: url('/img/b6.jpg');"></a>
                      			</div>
                      			<div class="item-info">
                      				<div class="item-title text-ellipsis">
                      					<a href="track.detail.html">Reflection (Deluxe)</a>
                      				</div>
                      				<div class="item-author text-sm text-ellipsis ">
                      					<a href="artist.detail.html" class="text-muted">Fifth Harmony</a>
                      				</div>
                      				<div class="item-meta text-sm text-muted">
                      		        </div>


                      			</div>
                      		</div>
                      	</div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row item-list item-list-sm item-list-by m-b">
                          <div class="col-xs-12">
                          	<div class="item">
                      			<div class="item-media rounded ">
                      				<a href="artist.detail.html" class="item-media-content" style="background-image: url('/img/a7.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="artist.detail.html">Richard Carr</a>
                      					<div class="text-sm text-muted">6 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item">
                      			<div class="item-media rounded ">
                      				<a href="artist.detail.html" class="item-media-content" style="background-image: url('/img/a3.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="artist.detail.html">Joe Holmes</a>
                      					<div class="text-sm text-muted">24 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item">
                      			<div class="item-media rounded ">
                      				<a href="artist.detail.html" class="item-media-content" style="background-image: url('/img/a5.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="artist.detail.html">Judy Woods</a>
                      					<div class="text-sm text-muted">23 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                          <div class="col-xs-12">
                          	<div class="item">
                      			<div class="item-media rounded ">
                      				<a href="artist.detail.html" class="item-media-content" style="background-image: url('/img/a4.jpg');"></a>
                      			</div>
                      			<div class="item-info ">
                      				<div class="item-title text-ellipsis">
                      					<a href="artist.detail.html">Judith Garcia</a>
                      					<div class="text-sm text-muted">13 songs</div>
                      				</div>
                      			</div>
                      		</div>
                      	</div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="top-search" class="btn-groups">
                <strong class="text-muted">Top searches: </strong>
                <a href="#" class="btn btn-xs white">Happy</a>
                <a href="#" class="btn btn-xs white">Music</a>
                <a href="#" class="btn btn-xs white">Weekend</a>
                <a href="#" class="btn btn-xs white">Summer</a>
                <a href="#" class="btn btn-xs white">Holiday</a>
                <a href="#" class="btn btn-xs white">Blue</a>
                <a href="#" class="btn btn-xs white">Soul</a>
                <a href="#" class="btn btn-xs white">Calm</a>
                <a href="#" class="btn btn-xs white">Nice</a>
                <a href="#" class="btn btn-xs white">Home</a>
                <a href="#" class="btn btn-xs white">SLeep</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ############ SEARCH END -->
  <!-- ############ SHARE START -->
  <div id="share-modal" class="modal fade animate">
    <div class="modal-dialog">
      <div class="modal-content fade-down">
        <div class="modal-header">

          <h5 class="modal-title">Share</h5>
        </div>
        <div class="modal-body p-lg">
          <div id="share-list" class="m-b">
            <a href="" class="btn btn-icon btn-social rounded btn-social-colored indigo" title="Facebook">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-facebook"></i>
            </a>

            <a href="" class="btn btn-icon btn-social rounded btn-social-colored light-blue" title="Twitter">
                <i class="fa fa-twitter"></i>
                <i class="fa fa-twitter"></i>
            </a>

            <a href="" class="btn btn-icon btn-social rounded btn-social-colored red-600" title="Google+">
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-google-plus"></i>
            </a>

            <a href="" class="btn btn-icon btn-social rounded btn-social-colored blue-grey-600" title="Trumblr">
                <i class="fa fa-tumblr"></i>
                <i class="fa fa-tumblr"></i>
            </a>

            <a href="" class="btn btn-icon btn-social rounded btn-social-colored red-700" title="Pinterst">
                <i class="fa fa-pinterest"></i>
                <i class="fa fa-pinterest"></i>
            </a>
          </div>
          <div>
            <input class="form-control" value="http://plamusic.com/slug"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ############ SHARE END -->

<!-- ############ LAYOUT END-->
  </div>

<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
  <?= $this->Html->script('libs/jquery/dist/jquery') ?>
<!-- Bootstrap -->
  <?= $this->Html->script('libs/tether/dist/js/tether.min') ?>
  <?= $this->Html->script('libs/bootstrap/dist/js/bootstrap') ?>
<!-- core -->
  <?= $this->Html->script('libs/jQuery-Storage-API/jquery.storageapi.min') ?>
  <?= $this->Html->script('libs/jquery.stellar/jquery.stellar.min') ?>
  <?= $this->Html->script('libs/owl.carousel/dist/owl.carousel.min') ?>
  <?= $this->Html->script('libs/jscroll/jquery.jscroll.min') ?>
  <?= $this->Html->script('libs/PACE/pace.min') ?>
  <?= $this->Html->script('libs/jquery-pjax/jquery.pjax') ?>

  <?= $this->Html->script('libs/mediaelement/build/mediaelement-and-player.min') ?>
  <?= $this->Html->script('libs/mediaelement/build/mep') ?>
  <?= $this->Html->script('player') ?>

  <?= $this->Html->script('config.lazyload') ?>
  <?= $this->Html->script('ui-load') ?>
  <?= $this->Html->script('ui-jp') ?>
  <?= $this->Html->script('ui-include') ?>
  <?= $this->Html->script('ui-device') ?>
  <?= $this->Html->script('ui-form') ?>
  <?= $this->Html->script('ui-nav') ?>
  <?= $this->Html->script('ui-screenfull') ?>
  <?= $this->Html->script('ui-scroll-to') ?>
  <?= $this->Html->script('ui-toggle-class') ?>
  <?= $this->Html->script('ui-taburl') ?>
  <?= $this->Html->script('app') ?>
  <?= $this->Html->script('site') ?>
  <?= $this->Html->script('ajax') ?>
<!-- endbuild -->
</body>
</html>
