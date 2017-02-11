<?=
  $this->element('load');
  use Cake\Routing\Router;
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                     </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                          <?= $this->Html->link(__('Logout'), [
                            'controller' => 'users',
                            'action' => 'logout'
                          ]); ?>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="<?= Router::url(['controller' => 'dashboards']); ?>">
                  <i class="fa fa-th-large"></i>
                  <span class="nav-label"><?= __('Dashboard', true) ?></span>
                </a>
            </li>
            <li>
              <a href="<?= Router::url(['controller' => 'audio']); ?>">
                <i class="fa fa-building"></i>
                <span class="nav-label"><?= __('Audio management', true) ?></span>
              </a>
            </li>
            <li>
              <a href="<?= Router::url(['controller' => 'categories', 'action' => 'index', '?' => ['mod' => 'audio']]); ?>">
                <i class="fa fa-list-ol"></i>
                <span class="nav-label"><?= __('Categories', true) ?></span>
              </a>
            </li>
            <li>
              <a href="<?= Router::url(['controller' => 'pages']); ?>">
                <i class="fa fa-file-text"></i>
                <span class="nav-label"><?= __('Static page', true) ?></span>
              </a>
            </li>
            <li>
              <a href="<?= Router::url(['controller' => 'configs']); ?>">
                <i class="fa fa-cogs"></i>
                <span class="nav-label"><?= __('System configuration', true) ?></span>
              </a>
            </li>
            <li>
              <a href="<?= Router::url(['controller' => 'users']); ?>">
                <i class="fa fa-users"></i>
                <span class="nav-label"><?= __('Administrator', true) ?></span>
              </a>
            </li>
        </ul>
    </div>
</nav>
