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
<!-- saved from url=(0063)http://www.themenesia.com/themeforest/archi/index-slider-2.html -->
<html lang="en" class="csstransforms csstransforms3d csstransitions">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title><?=$systemConfigs['seo_title']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?=$systemConfigs['seo_keyword']?>">
    <meta name="description" content="<?=$systemConfigs['seo_description']?>">
    <meta name="author" content="">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
	<script src="js/html5shiv') ?>
	<![endif]-->


    <!-- CSS Files
    ================================================== -->
    <?= $this->Html->css('bootstrap') ?>
    <?= $this->Html->css('jpreloader') ?>
    <?= $this->Html->css('animate') ?>
    <?= $this->Html->css('plugin') ?>
    <?= $this->Html->css('owl.carousel') ?>
    <?= $this->Html->css('owl.theme') ?>
    <?= $this->Html->css('owl.transitions') ?>
    <?= $this->Html->css('magnific-popup') ?>
    <?= $this->Html->css('style') ?>
    <?= $this->Html->css('demo') ?>

    <!-- custom background -->
    <?= $this->Html->css('bg') ?>

    <!-- color scheme -->
    <?= $this->Html->css('lime') ?>

    <!-- load fonts -->
    <?= $this->Html->css('font-awesome') ?>
    <?= $this->Html->css('style(1)') ?>
    <?= $this->Html->css('custom') ?>

    <!-- revolution slider -->
    <?= $this->Html->css('settings') ?>
    <?= $this->Html->css('rev-settings') ?>

    <!-- Javascript Files
    ================================================== -->
    <?= $this->Html->script('jquery.min') ?>
    <?= $this->Html->script('jpreLoader') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('jquery.isotope.min') ?>
    <?= $this->Html->script('easing') ?>
    <?= $this->Html->script('jquery.flexslider-min') ?>
    <?= $this->Html->script('jquery.scrollto') ?>
    <?= $this->Html->script('owl.carousel') ?>
    <?= $this->Html->script('jquery.countTo') ?>
    <?= $this->Html->script('classie') ?>
    <?= $this->Html->script('video.resize') ?>
    <?= $this->Html->script('validation') ?>
    <?= $this->Html->script('wow.min') ?>
    <?= $this->Html->script('jquery.magnific-popup.min') ?>
    <?= $this->Html->script('enquire.min') ?>

</head>

<body id="homepage" style="display: block;">

    <div id="wrapper">

        <!-- header begin -->
        <header class="transparent clone smaller">

            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <!-- logo begin -->
                  <div id="logo">
                    <!-- <a href="/">
                      <img class="logo" src="./Archi - Responsive Interior Design Template home_files/logo.png" alt="">
                    </a> -->
                    <a href="/">
                      <h1 class="m-t" style="margin-top: 16px"><span class="id-color">A</span>SIDEC</h1>
                    </a>
                  </div>
                  <!-- logo close -->

                  <!-- small button begin -->
                  <span id="menu-btn"></span>
                  <!-- small button close -->

  				        <!-- mainmenu begin -->
                  <?=$this->element('menu')?>
                  <!-- mainmenu close -->
                </div>
              </div>
            </div>
        </header>
        <!-- header close -->

        <?=$this->fetch('content')?>

        <!-- footer begin -->
        <?=$this->element('footer')?>
        <!-- footer close -->
    </div>

    <?= $this->Html->script('designesia') ?>
    <?= $this->Html->script('demo') ?>

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <?= $this->Html->script('jquery.themepunch.plugins.min') ?>
    <?= $this->Html->script('jquery.themepunch.revolution.min') ?>
</body></html>
