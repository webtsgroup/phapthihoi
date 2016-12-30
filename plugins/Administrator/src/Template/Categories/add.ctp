<?php
  use Cake\Routing\Router;
  $URL = Router::url(['controller' => 'Categories','action' => $action, '?' => ['mod' => $mod]])
?>
<div class="ibox">
  <div class="ibox-content main-content">
    <div class="row">
      <div class="col-md-6">
        <h2><?php echo __('Create new Category'); ?></h2>
      </div>
      <div class="col-md-6 text-right m-b">
        <div class="btn-group">
          <?php
          echo $this->Html->link(
            __('Categories', true),
            ['controller' => 'Categories', 'action' => 'index', '?' => ['mod' => $mod]],
            ['class' => 'btn btn-default btn-list']
          ); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form id="formCategory" class="form-horizontal">
        <div class="form-group has-feedback">
          <label for="inputPassword3" class="col-md-2 control-label"><?php echo __('Name',true); ?></label>
          <div class="col-md-4">
            <?php
            echo $this->Form->input('name', array(
              'name' => 'name',
              'div' => false,
              'data-required' => true,
              'title' => __('Enter the Name'),
              'label' => false,
              'class' => 'form-control input-error',
              'default' => &$result['name']
            ));
            ?>
            <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
          </div>
        </div>
        <div class="form-group hidden">
          <div class="col-md-4">
            <?php
            echo $this->Form->input('id', array(
              'name' => 'id',
              'div' => false,
              'label' => false,
              'class' => 'form-control',
              'default' => &$result['id']
            ));
            ?>
            <?php
            echo $this->Form->input('module_id', array(
              'name' => 'module_id',
              'id' => 'module_id',
              'type' => 'text',
              'div' => false,
              'label' => false,
              'class' => 'form-control',
              'default' => &$result['module_id']
            ));
            ?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-md-2 control-label"><?php echo __('Parent category',true); ?></label>
          <div class="col-md-4">
            <select class="form-control" data-required="1" title="<?=__('Select Parent')?>" name="parent_id" id="parent_id">
              <option value="">
                <?=__('Select one', true)?>
              </option>
              <?php
              foreach($modules as $_mod => $name) {
                $cat = isset($parents[$_mod]) ? $parents[$_mod] : [];
                $selectedModule = '';
                if (isset($result['module_id']) && $result['module_id'] === $_mod) {
                  if (isset($result['parent_id']) && $result['parent_id'] === 0) {
                    $selectedModule = 'selected';
                  }
                }
                ?>
                <optgroup label="<?=$name?>">
                  <option <?=$selectedModule?> data-module="<?=$_mod?>" value="0">
                    <?=__('Parent category', true)?>
                  </option>
                  <?php
                  foreach($cat as $value => $text) {
                    $selected = '';
                    if (isset($result['parent_id']) && $result['parent_id'] === $value) {
                      $selected = 'selected';
                    }
                    ?>
                    <option <?=$selected?> data-module="<?=$_mod?>" value="<?=$value?>">
                      <?=$text['name']?>
                    </option>
                    <?php
                  } ?>
                </optgroup>
                <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="inputPassword3" class="col-md-2 control-label"><?php echo __('Description',true); ?></label>
          <div class="col-md-6">
            <?php
            echo $this->Form->input('description', array(
              'type' => 'textarea',
              'rows' => '5',
              'name' => 'description',
              'div' => false,
              'label' => false,
              'class' => 'form-control input-error',
              'default' => &$result['description']
            ));
            ?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-md-2 control-label"></label>
          <div class="col-md-4">
            <button type="reset" class="btn btn-default btn-reset">
            <?php echo __('Reset',true); ?></button>
            <button type="button" onclick="category('<?=$URL?>');" class="btn btn-primary btn-save">
            <?php echo __('Submit',true); ?></button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#parent_id').change(function() {
    var module = $( "#parent_id option:selected" ).attr('data-module');
    $('#module_id').val(module);
  });
</script>
