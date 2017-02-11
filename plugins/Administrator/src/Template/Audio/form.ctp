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
                      if (isset($result['category_id']) && $result['category_id'] === $parents['id']) {
                        $selectedParent = 'selected';
                      }
                      ?>
                      <li><a href="<?=Router::url(['controller' => 'Works','action' => 'index', $parents['id']])?>">
                        <i class="fa fa-circle"></i><?=$parents['name']?>
                      </a></li>
                      <?php
                      foreach($childrens as $_ind => $child) {
                        $selected = '';
                        if (isset($result['category_id']) && $result['category_id'] === $child['id']) {
                          $selected = 'selected';
                        }
                        ?>
                        <li><a href="<?=Router::url(['controller' => 'Works','action' => 'index', $child['id']])?>">
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
          __('Works', true),
          ['controller' => $this->request->params['controller'], 'action' => 'index'],
          ['class' => 'btn btn-white btn-list']
        ); ?>
      </div>
      <h2>
        <?=__('Work information')?>
      </h2>
  </div>
      <div class="mail-box">


      <div class="mail-body">

          <form id="formWork">
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
              <div class="form-group"><label class="col-sm-2 control-label required"><?=__('Address', true);?></label>
                <div class="col-sm-10">
                  <?php
                  echo $this->Form->input('address', array(
                    'name' => 'address',
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'default' => isset($result['address']) ? $result['address'] : ''
                  ));
                  ?>
                </div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label"><?=__('Owner', true);?></label>
                <div class="col-sm-5">
                  <?php
                  echo $this->Form->input('owner', array(
                    'name' => 'owner',
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'default' => isset($result['owner']) ? $result['owner'] : ''
                  ));
                  ?>
                </div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label required"><?=__('Category', true);?></label>
                <div class="col-sm-5">
                  <select class="form-control" data-required="1" title="<?=__('Select Parent', true)?>" name="category_id" id="category_id">
                    <option value="">
                      <?=__('Select one', true)?>
                    </option>
                    <?php
                    foreach($categories as $ind => $parents) {
                      $childrens = isset($parents['children']) ? $parents['children'] : [];
                      $selectedParent = '';
                      if (isset($result['category_id']) && $result['category_id'] == $parents['id']) {
                        $selectedParent = 'selected';
                      }
                      ?>
                      <option <?=$selectedParent?> value="<?=$parents['id']?>">
                        <?=$parents['name']?>
                      </option>
                      <?php
                      foreach($childrens as $_ind => $child) {
                        $selected = '';
                        if (isset($result['category_id']) && $result['category_id'] == $child['id']) {
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
              <div class="form-group"><label class="col-sm-2 control-label required"><?=__('Content');?></label>
                <div class="col-sm-10">
                  <?php
                  echo $this->Form->input('content', array(
                    'type' => 'textarea',
                    'name' => 'content',
                    'title' => __('Enter the Content'),
                    'hiddenField' => false,
                    'data-required' => true,
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
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
                      'id' => 'display',
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
                <div class="col-md-offset-2 col-sm-10">
                  <div class="checkbox checkbox-primary">
                    <?php
                    echo $this->Form->checkbox('highlight', array(
                      'name' => 'highlight',
                      'id' => 'highlight',
                      'div' => false,
                      'hiddenField' => false,
                      'class' => '',
                      'default' => isset($result['highlight']) ? $result['highlight'] : 0
                    ));
                    ?>
                    <label for="highlight">
                      <?=__('Highlight', true)?>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group"><label class="col-sm-2 control-label"><?=__('Keyword')?></label>
                <div class="col-sm-10">
                  <?php
                  echo $this->Form->input('keyword', array(
                    'name' => 'keyword',
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'default' => isset($result['keyword']) ? $result['keyword'] : ''
                  ));
                  ?>
                </div>
              </div>
              <div class="form-group m-t-md m-b">
              <div class="col-md-2">
                <div class="m-b">
                  <span class="btn btn-white fileinput-button">
                    <i class="fa fa-plus"></i>
                    <span><?=__('Add picture...', true)?></span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="js-image-upload" type="file" name="files[]" multiple>
                  </span>
                </div>
              </div>
              <div class="col-md-10">
                <div class="table-responsive">
                  <table class="table table-bordered table-stripped">
                    <thead>
                      <tr>
                        <th class="col-md-3"><?=__('Image preview')?></th>
                        <th class="col-md-8"><?=__('Description')?></th>
                        <th class="col-md-1"></th>
                      </tr>
                    </thead>
                    <tbody id="js-image-list">
                      <?php
                      $galleries = [];
                      foreach($result['galleries'] as $i => $image) {
                        array_push($galleries, $image['id']);
                         ?>
                         <tr id="js-image-row-<?=$image['id']?>" data-id="<?=$image['id']?>">
                           <td>
                             <img alt="<?=$image['file']?>" src="/uploads/galleries/thumbnail/<?=$image['file']?>">
                           </td>
                           <td>
                             <textarea data-id="<?=$image['id']?>" id="js-image-des-<?=$image['id']?>" type="text" rows="3" class="form-control js-image-save"><?=$image['description']?></textarea>
                           </td>
                           <td class="text-right">
                             <div class="btn-group">
                               <button type="button" data-id="<?=$image['id']?>" class="btn btn-white js-image-delete"><i class="fa fa-trash"></i></button>
                             </div>
                           </td>
                         </tr>
                         <?php
                      }?>
                    </tbody>
                  </table>
                  <?php
                  $str = implode("|", $galleries);
                  echo $this->Form->input('galleries', array(
                    'type' => 'hidden',
                    'name' => 'galleries',
                    'div' => false,
                    'label' => false,
                    'class' => 'form-control',
                    'default' => &$str
                  )); ?>
                </div>
              </div>
              </div>
              <div class="form-group">
                <div class="col-md-offset-2 col-sm-10 text-right">
                  <button type="reset" class="btn btn-default btn-reset">
                    <?php echo __('Reset',true); ?></button>
                  <button type="button" onclick="work('<?=$URL?>');" class="btn btn-primary btn-save">
                    <?php echo __('Submit',true); ?></button>
                </div>
              </div>
            </fieldset>
          </form>

      </div>
      </div>
  </div>
</div>
<?php echo $this->CKEditor->replace('content'); ?>
<script type="text/javascript">
$(document).ready(function() {
  var images = [];
  var tmp = '<tr id="js-image-row-%ID%" data-id="%ID%"><td>'
    + '<img alt="" src="%URL%">'
    + "</td>"
    + '<td>'
    + '<textarea data-id="%ID%" type="text" id="js-image-des-%ID%" rows="3" class="form-control js-image-save" data-id></textarea>'
    + '</td>'
    + '<td class="text-right">'
    + '<div class="btn-group">'
    + '<button type="button" class="btn btn-white"><i class="fa fa-trash"></i></button>'
    + '</div>'
    + '</td></tr>';
  // Initialize the jQuery File Upload widget:
  $('#js-image-upload').fileupload({
    multiple: true,
    dataType: 'json',
    url: '<?=$urlUpload?>',
    done: function (e, data) {
      data.jqXHR.done(function(data, status) {
        // prepare images for view
        var record = tmp.replace('%URL%', data.thumbnailUrl);
        record = record.replace(/%ID%/g, data.id);
        $(record).appendTo('#js-image-list');
        var list = [];
        $('#js-image-list tr').each(function() {
          var id = $(this).attr('data-id');
          list.push(id);
        });
        list = list.join('|');
        $('#galleries').val(list);
      });
    }
  });

  /**
   * update description
   */
  $('#js-image-list').on('change', '.js-image-save', function() {
    var id = $(this).attr('data-id');
    var des = $(this).val();
    updateField('Galleries', id, 'description', des);
  });

  /**
   * update description
   */
  $('.js-image-delete').click(function() {
    var id = $(this).attr('data-id');
    deleteImage('<?=$urlDelete?>', id, 'js-image-row');
  });
});
</script>
