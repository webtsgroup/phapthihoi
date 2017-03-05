<?php
  $this->loadHelper('CakephpJqueryFileUpload.JqueryFileUpload');
  echo $this->JqueryFileUpload->loadCss();
  echo $this->JqueryFileUpload->loadScripts();
  use Cake\Routing\Router;
  $URL = $this->request->here;
  $id = isset($result['id']) ? $result['id'] : 0;
?>
<div class="row">
  <div class="col-lg-3">
      <div class="ibox float-e-margins">
          <div class="ibox-content mailbox-content">
              <div class="file-manager">
                  <div class="space-25"></div>
                  <h5><?=__('Categories')?></h5>
                  <ul class="folder-list m-b-md" style="padding: 0">
                    <?php
                    foreach($categories as $ind => $parents) {
                      $childrens = isset($parents['children']) ? $parents['children'] : [];
                      $selectedParent = '';
                      if (isset($result['cat_id']) && $result['cat_id'] === $parents['id']) {
                        $selectedParent = 'selected';
                      }
                      ?>
                      <li><a href="<?=Router::url(['controller' => 'Audio','action' => 'index', $parents['id']])?>">
                        <i class="fa fa-circle"></i><?=$parents['name']?>
                      </a></li>
                      <?php
                      foreach($childrens as $_ind => $child) {
                        $selected = '';
                        if (isset($result['cat_id']) && $result['cat_id'] === $child['id']) {
                          $selected = 'selected';
                        }
                        ?>
                        <li><a href="<?=Router::url(['controller' => 'Audio','action' => 'index', $child['id']])?>">
                          &nbsp;&nbsp;<i class="fa fa-angle-right"></i><?=$child['name']?>
                        </a></li>
                        <?php
                      }
                    }
                    ?>
                  </ul>
                  <div class="clearfix"></div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-9 animated fadeInRight">
  <div class="mail-box-header">
      <div class="pull-right tooltip-demo">
        <?php
        echo $this->Html->link(
          __('Albums', true),
          ['controller' => $this->request->params['controller'], 'action' => 'index'],
          ['class' => 'btn btn-white btn-list']
        ); ?>
      </div>
      <h2>
        <?=__('Thông tin Album')?>
      </h2>
  </div>
      <div class="mail-box">
      <div class="mail-body">
          <form id="formAlbum">
            <fieldset class="form-horizontal">
              <div class="form-group has-feedback"><label class="col-sm-2 control-label required"><?=__('Name');?></label>
                <div class="col-sm-10">
                  <?php
                  echo $this->Form->input('id', array(
                    'type' => 'hidden',
                    'name' => 'id',
                    'hiddenField' => false,
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'default' => &$result['id']
                  ));
                  echo $this->Form->input('name', array(
                    'name' => 'name',
                    'div' => false,
                    'hiddenField' => false,
                    'data-required' => true,
                    'title' => __('Enter the Name'),
                    'label' => false,
                    'class' => 'form-control',
                    'default' => &$result['name']
                  ));
                  ?>
                  <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group has-feedback"><label class="col-sm-2 control-label required"><?=__('Image');?></label>
                <div class="col-sm-10">
                  <?php
                  echo $this->Form->input('img', array(
                    'name' => 'img',
                    'div' => false,
                    'hiddenField' => false,
                    'data-required' => true,
                    'title' => __('Enter the Img'),
                    'label' => false,
                    'class' => 'form-control',
                    'default' => &$result['img']
                  ));
                  ?>
                  <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label"><?=__('Trình bày', true);?></label>
                <div class="col-sm-5">
                  <?php
                  echo $this->Form->input('singer_id', array(
                    'type' => 'select',
                    'name' => 'singer_id',
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'option' => $singers,
                    'default' => isset($result['singer_id']) ? $result['singer_id'] : ''
                  ));
                  ?>
                </div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label"><?=__('Content');?></label>
                <div class="col-sm-10">
                  <?php
                  echo $this->Form->input('info', array(
                    'type' => 'textarea',
                    'name' => 'info',
                    //'data-required' => true,
                    //'title' => __('Enter the Content'),
                    'hiddenField' => false,
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'default' => isset($result['info']) ? $result['info'] : ''
                  ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <div class="hr-line-dashed col-md-12"></div>
                <div class="col-md-offset-2 col-sm-10 text-right">
                  <button type="reset" class="btn btn-default btn-reset">
                    <?php echo __('Reset',true); ?></button>
                  <button type="button" onclick="album('<?=$URL?>');" class="btn btn-primary btn-save">
                    <?php echo __('Submit',true); ?></button>
                </div>
              </div>
            </fieldset>
          </form>

      </div>
      </div>
  </div>
</div>
<?php echo $this->CKEditor->replace('info'); ?>
