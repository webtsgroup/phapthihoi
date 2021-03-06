<?php
  $this->loadHelper('CakephpJqueryFileUpload.JqueryFileUpload');
  echo $this->JqueryFileUpload->loadCss();
  echo $this->JqueryFileUpload->loadScripts();
  use Cake\Routing\Router;
  $URL = $this->request->here;
  $id = isset($result['id']) ? $result['id'] : 0;
  $urlUpload = '/ajaxs/upload/work/' . $id;
  $urlDelete = '/ajaxs/deleteImage/';
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
          __('Audio', true),
          ['controller' => $this->request->params['controller'], 'action' => 'index'],
          ['class' => 'btn btn-white btn-list']
        ); ?>
      </div>
      <h2>
        <?=__('Thông tin Pháp âm')?>
      </h2>
  </div>
      <div class="mail-box">
      <div class="mail-body">

          <form id="formAudio">
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
                  echo $this->Form->input('title', array(
                    'name' => 'title',
                    'div' => false,
                    'hiddenField' => false,
                    'data-required' => true,
                    'title' => __('Enter the Title'),
                    'label' => false,
                    'class' => 'form-control',
                    'default' => &$result['title']
                  ));
                  ?>
                  <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group has-feedback"><label class="col-sm-2 control-label required"><?=__('Link');?></label>
                <div class="col-sm-10">
                  <?php
                  echo $this->Form->input('url', array(
                    'name' => 'url',
                    'div' => false,
                    'hiddenField' => false,
                    'data-required' => true,
                    'title' => __('Enter the Url'),
                    'label' => false,
                    'class' => 'form-control',
                    'default' => &$result['url']
                  ));
                  ?>
                  <span class="glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-offset-2 col-sm-10">
                  <div class="checkbox checkbox-primary">
                    <?php
                    echo $this->Form->checkbox('is_local', array(
                      'name' => 'is_local',
                      'id' => 'is_local',
                      'div' => false,
                      'hiddenField' => false,
                      'class' => '',
                      'default' => isset($result['is_local']) ? $result['is_local'] : 0
                    ));
                    ?>
                    <label for="is_local">
                      <?=__('Local URL', true)?>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-offset-2 col-sm-10">
                  <div class="checkbox checkbox-primary">
                    <?php
                    echo $this->Form->checkbox('public', array(
                      'name' => 'public',
                      'id' => 'public',
                      'div' => false,
                      'hiddenField' => false,
                      'class' => '',
                      'default' => isset($result['public']) ? $result['public'] : 0
                    ));
                    ?>
                    <label for="public">
                      <?=__('Public link', true)?>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group has-feedback"><label class="col-sm-2 control-label"><?=__('Kích thướt');?></label>
                <div class="col-sm-3">
                  <?php
                  echo $this->Form->input('width', array(
                    'name' => 'width',
                    'div' => false,
                    'hiddenField' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => __('Rộng', true),
                    'default' => isset($result['width']) ? $result['width'] : ''
                  ));
                  ?>
                </div>
                <div class="col-sm-2">
                  <?php
                  echo $this->Form->input('height', array(
                    'name' => 'height',
                    'div' => false,
                    'hiddenField' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => __('Cao', true),
                    'default' => isset($result['height']) ? $result['height'] : ''
                  ));
                  ?>
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
              <div class="form-group"><label class="col-sm-2 control-label required"><?=__('Album', true);?></label>
                <div class="col-sm-10">
                  <?php
                  echo $this->Form->input('album_id', array(
                    'type' => 'select',
                    'name' => 'album_id',
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'option' => $albums,
                    'default' => isset($result['album_id']) ? $result['album_id'] : ''
                  ));
                  ?>
                </div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label required"><?=__('Thể loại', true);?></label>
                <div class="col-sm-5">
                  <select class="form-control" data-required="1" title="<?=__('Select Parent', true)?>" name="cat_id" id="category_id">
                    <option value="">
                      <?=__('Select one', true)?>
                    </option>
                    <?php
                    foreach($categories as $ind => $parents) {
                      $childrens = isset($parents['children']) ? $parents['children'] : [];
                      $selectedParent = '';
                      if (isset($result['cat_id']) && $result['cat_id'] == $parents['id']) {
                        $selectedParent = 'selected';
                      }
                      ?>
                      <option <?=$selectedParent?> value="<?=$parents['id']?>">
                        <?=$parents['name']?>
                      </option>
                      <?php
                      foreach($childrens as $_ind => $child) {
                        $selected = '';
                        if (isset($result['cat_id']) && $result['cat_id'] == $child['id']) {
                          $selected = 'selected';
                        }
                        ?>
                        <option <?=$selected?> value="<?=$child['id']?>">
                          -- <?=$child['name']?>
                        </option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label"><?=__('Content');?></label>
                <div class="col-sm-10">
                  <?php
                  echo $this->Form->input('lyric', array(
                    'type' => 'textarea',
                    'name' => 'lyric',
                    //'data-required' => true,
                    //'title' => __('Enter the Content'),
                    'hiddenField' => false,
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'default' => isset($result['lyric']) ? $result['lyric'] : ''
                  ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <div class="hr-line-dashed col-md-12"></div>
                <div class="col-md-offset-2 col-sm-10 text-right">
                  <button type="reset" class="btn btn-default btn-reset">
                    <?php echo __('Reset',true); ?></button>
                  <button type="button" onclick="audio('<?=$URL?>');" class="btn btn-primary btn-save">
                    <?php echo __('Submit',true); ?></button>
                </div>
              </div>
            </fieldset>
          </form>

      </div>
      </div>
  </div>
</div>
<?php echo $this->CKEditor->replace('lyric'); ?>
