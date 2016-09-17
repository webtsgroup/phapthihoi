<?php
  use Cake\Routing\Router;
  $URL = Router::url(['controller' => 'users','action' => $action])
?>
<div class="ibox">
  <div class="ibox-content">
    <div class="row">
      <div class="col-md-12">
        <form id="formUser" class="form-horizontal">
        <div class="form-group has-feedback">
        <label for="inputPassword3" class="col-md-2 control-label"><?php echo __('First Name',true); ?></label>
        <div class="col-md-4">
        <?php
        echo $this->Form->input(
        'first_name',
        array(
        'name' => 'first_name',
        'div' => false,
        'data-required' => true,
        'title' => __('Enter the First Name'),
        'label' => false,
        'class' => 'form-control input-error',
        'default' => &$result['first_name']
        )
        );
        ?>
        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
        </div>
        </div>
        <div class="form-group has-feedback">
        <label for="inputPassword3" class="col-md-2 control-label"><?php echo __('Last Name',true); ?></label>
        <div class="col-md-4">
        <?php
        echo $this->Form->input(
        'last_name',
        array(
        'name' => 'last_name',
        'data-required' => true,
        'title' => __('Enter the Last Name'),
        'div' => false,
        'label' => false,
        'class' => 'form-control input-error',
        'default' => &$result['last_name']
        )
        );
        ?>
        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
        </div>
        </div>
        <div class="form-group has-feedback">
        <label for="inputEmail3" class="col-md-2 control-label"><?php echo __('Username',true); ?></label>
        <div class="col-md-4">
        <?php
        echo $this->Form->input(
        'username',
        array(
        'name' => 'username',
        'data-required' => true,
        'title' => __('Enter the username'),
        'div' => false,
        'label' => false,
        'class' => 'form-control',
        'default' => &$result['username'],
        'readonly' => isset($onchange) && $onchange != '' ? true : ''
        )
        );
        ?>
        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
        </div>
        </div>
        <div class="form-group">
        <label for="inputEmail3" class="col-md-2 control-label"><?php echo __('Role',true); ?></label>
        <div class="col-md-4">
        <?php
        $option = array(
        '1' => 'Admin', '2' => 'Sub-Admin'
        );
        echo $this->Form->input('role',array(
        'options' => $option,
        'name' => 'role',
        'div' => false,
        'label' => false,
        'class' => 'form-control',
        'default' => &$result['role']
        )
        );
        ?>
        </div>
        </div>
        <div class="hr-line-dashed"></div>
        <?php $clsHide = $action == 'add' ? '' : 'elm-hide' ; ?>
        <?php if($action == 'edit') { ?>
        <div class="form-group">
        <label for="inputPassword3" class="col-md-2 control-label"></label>
        <div class="col-md-4">
        <button type="button" onclick="showBoxChangePass();" class="btn btn-success btn-xs"><?php echo __('Change Password',true); ?></button>
        </div>
        </div>
        <div class="form-group  has-feedback <?php echo $clsHide;?>">
        <label for="inputPassword3" class="col-md-2 control-label"><?php echo __('Old Password',true); ?></label>
        <div class="col-md-4">

        <?php
        echo $this->Form->input(
        'old_pass',
        array(
        'type' => 'password',
        'name' => 'old_pass',
        'div' => false,
        'label' => false,
        'class' => 'form-control'
        )
        );
        ?>
        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
        </div>
        </div>
        <?php } ?>

        <div class="form-group  has-feedback <?php echo $clsHide;?>">
        <label for="inputPassword3" class="col-md-2 control-label"><?php echo __('Password',true); ?></label>
        <div class="col-md-4">

        <?php
        echo $this->Form->input(
        'pass',
        array(
        'type' => 'password',
        'name' => 'pass',
        'data-required' => true,
        'title' => __('Enter the Password'),
        'div' => false,
        'label' => false,
        'class' => 'form-control'
        )
        );
        ?>
        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
        </div>
        </div>
        <div class="form-group  has-feedback <?php echo $clsHide;?>">
        <label for="inputPassword3" class="col-md-2 control-label"><?php echo __('Re Password',true); ?></label>
        <div class="col-md-4">
        <?php
        echo $this->Form->input(
        're_pass',
        array(
        'type' => 'password',
        'name' => 're_pass',
        'data-required' => true,
        'title' => __('Password confirm does not match'),
        'div' => false,
        'label' => false,
        'class' => 'form-control'
        )
        );
        ?>
        <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
        </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-md-2 control-label"></label>
          <div class="col-md-4">
            <button type="reset" class="btn btn-default btn-reset">
            <?php echo __('Reset',true); ?></button>
            <button type="button" onclick="user('<?=$URL?>');" class="btn btn-primary btn-save">
            <?php echo __('Submit',true); ?></button>
          </div>
        </div>
        <?php if ($action === 'edit') { ?>
        <div class="form-group <?php echo $clsHide;?>">
          <label for="inputPassword3" class="col-md-2 control-label"></label>
          <div class="col-md-4">
            <button type="button" onclick="changePass('/users/changePass/<?php echo $id;?>');" class="btn btn-primary">
            <?php echo __('Sumit',true); ?></button>
          </div>
        </div>
        <?php } ?>
        </form>
      </div>
    </div>
  </div>
</div>
