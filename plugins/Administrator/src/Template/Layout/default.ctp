<?=
  $this->element('load');
  use Cake\Routing\Router;
?>
<!DOCTYPE html>
<html>
<?= $this->element('head') ?>
<body>
<div id="wrapper">
  <?= $this->element('sidebar'); ?>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
          <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
              <form role="search" class="navbar-form-custom" method="post" action="#">
                <div class="form-group">
                  <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
              </form>
            </div>
            <ul class="nav navbar-top-links navbar-right">
              <li>
                <a href="<?= Router::url(['controller' => 'users','action' => 'logout']); ?>">
                  <i class="fa fa-sign-out"></i> Log out
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-md-10">
            <h2><?=$MODULE;?></h2>
            <ol class="breadcrumb">
              <li><a href="/"><?= __('Home') ?></a></li>
              <?php if ($INDEX['title'] !== '') {
                ?>
                <li><a href="<?= $INDEX['link'] ?>"><?= $INDEX['title'] ?></a></li>
                <li class="active"><strong>Data Tables</strong></li>
                <?php
              } ?>
            </ol>
          </div>
          <div class="col-md-2">
          </div>
        </div>
        <!-- Mainly scripts -->
        <?= $this->Html->script([
          'Administrator.jquery-2.1.1.js',
          'Administrator.bootstrap.min.js',
          'Administrator.plugins/metisMenu/jquery.metisMenu.js',
          'Administrator.plugins/slimscroll/jquery.slimscroll.min.js',
          'Administrator.basic.js'
        ]) ?>

        <!-- Custom and plugin javascript -->
        <?= $this->Html->script([
          'Administrator.inspinia.js',
          'Administrator.plugins/pace/pace.min.js'
        ]) ?>
        <div class="wrapper wrapper-content animated fadeInRight">
            <?= $this->fetch('content') ?>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>
    </div>
</div>
</body>
</html>
