<?php
  use Cake\Routing\Router;
  $URL = $this->request->here;
?>
<div class="ibox">
  <div class="ibox-content main-content">
    <div class="row m-b">
      <div class="col-md-6">
        <h2><?php echo __('Create new Page'); ?></h2>
      </div>
      <div class="col-md-6 text-right">
        <div class="btn-group">
          <?php
          echo $this->Html->link(
            __('Page', true),
            ['controller' => $this->request->params['controller'], 'action' => 'index', '?' => ['mod' => $cat]],
            ['class' => 'btn btn-default btn-list']
          ); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form id="formPage" class="form-horizontal">
        <div class="form-group has-feedback">
          <label for="inputPassword3" class="col-md-2 control-label"><?php echo __('Title',true); ?></label>
          <div class="col-md-10">
            <?php
            echo $this->Form->input('title', array(
              'name' => 'title',
              'div' => false,
              'data-required' => true,
              'title' => __('Enter the Title'),
              'label' => false,
              'class' => 'form-control input-error',
              'default' => &$result['title']
            ));
            ?>
            <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
          </div>
        </div>
        <div class="form-group hidden">
          <div class="col-md-10">
            <?php
            echo $this->Form->input('id', array(
              'name' => 'id',
              'div' => false,
              'label' => false,
              'class' => 'form-control',
              'default' => &$result['id']
            ));
            ?>
          </div>
        </div>
				<div class="form-group">
					<label for="inputPassword3" class="col-md-2 control-label"><?php echo __('Alias',true); ?></label>
          <div class="col-md-5">
            <?php
            echo $this->Form->input('alias', array(
              'name' => 'alias',
              'id' => 'alias',
              'type' => 'text',
              'data-required' => true,
							'readonly' => isset($result['id']) ? 'readonly' : '',
              'title' => __('Enter the Alias'),
              'div' => false,
              'label' => false,
              'class' => 'form-control',
              'default' => &$result['alias']
            ));
            ?>
          </div>
        </div>
        <div class="form-group hidden">
          <label for="inputEmail3" class="col-md-2 control-label"><?php echo __('Parent category',true); ?></label>
          <div class="col-md-10">
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="inputPassword3" class="col-md-2 control-label"><?php echo __('Description',true); ?></label>
          <div class="col-md-10">
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
        <div class="form-group has-feedback">
          <label for="inputPassword3" class="col-md-2 control-label required"><?php echo __('Content',true); ?></label>
          <div class="col-md-10">
            <?php
            echo $this->Form->input('content', array(
              'type' => 'textarea',
              'rows' => '5',
              'name' => 'content',
              'data-required' => true,
              'title' => __('Enter the Content'),
              'div' => false,
              'label' => false,
              'class' => 'form-control input-error',
              'default' => &$result['content']
            ));
            ?>
          </div>
        </div>
				<div class="form-group">
						<div class="col-md-offset-2 col-sm-10">
						<div class="checkbox checkbox-primary">
							<?php
							echo $this->Form->checkbox('display', array(
								'name' => 'display',
								'div' => false,
								'hiddenField' => false,
								'class' => '',
								'default' => isset($result['display']) ? $result['display'] : 1
							));
							?>
							<label for="display">
								<?=__('Display', true)?>
							</label>
						</div>
					</div>
				</div>
        <div class="form-group">
          <label for="inputPassword3" class="col-md-2 control-label"></label>
          <div class="col-md-10">
            <button type="reset" class="btn btn-default btn-reset">
            <?php echo __('Reset',true); ?></button>
            <button type="button" onclick="page('<?=$URL?>');" class="btn btn-primary btn-save">
            <?php echo __('Submit',true); ?></button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $this->CKEditor->replace('content'); ?>
