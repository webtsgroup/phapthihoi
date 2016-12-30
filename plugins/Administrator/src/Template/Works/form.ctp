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
<div class="ecommerce">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
              <form id="formWork">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#tab-1"><?=__('Work info')?></a></li>
                  <li class=""><a data-toggle="tab" href="#tab-2"><?=__('Upload images')?></a></li>
                </ul>
                <div class="tab-content">
                  <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
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
                              'default' => &$result['address']
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
                              'default' => &$result['owner']
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
                                if (isset($result['category_id']) && $result['category_id'] === $parents['id']) {
                                  $selectedParent = 'selected';
                                }
                                ?>
                                <option <?=$selectedParent?> value="<?=$parents['id']?>">
                                  <?=$parents['name']?>
                                </option>
                                <?php
                                foreach($childrens as $_ind => $child) {
                                  $selected = '';
                                  if (isset($result['category_id']) && $result['category_id'] === $child['id']) {
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
                              'default' => &$result['keyword']
                            ));
                            ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-offset-2 col-sm-10">
                            <button type="reset" class="btn btn-default btn-reset">
                              <?php echo __('Reset',true); ?></button>
                            <button type="button" onclick="work('<?=$URL?>');" class="btn btn-primary btn-save">
                              <?php echo __('Submit',true); ?></button>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                  </div>
                  <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                      <div class="m-b">
                        <span class="btn btn-white fileinput-button">
                          <i class="fa fa-plus"></i>
                          <span><?=__('Add picture...', true)?></span>
                          <!-- The file input field used as target for the file upload widget -->
                          <input id="js-image-upload" type="file" name="files[]" multiple>
                        </span>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th><?=__('Image preview')?></th>
                              <th><?=__('Description')?></th>
                              <th><?=__('Actions')?></th>
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
                                   <textarea id="js-image-des-<?=$image['id']?>" type="text" rows="3" class="form-control"><?=$image['description']?></textarea>
                                 </td>
                                 <td>
                                   <div class="btn-group">
                                     <button type="button" data-id="<?=$image['id']?>" class="btn btn-primary js-image-save"><i class="fa fa-floppy-o"></i></button>
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
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function () {
  var images = [];
  var tmp = '<tr id="js-image-row-%ID%" data-id="%ID%"><td>'
    + '<img alt="" src="%URL%">'
    + "</td>"
    + '<td>'
    + '<textarea type="text" id="js-image-des-%ID%" rows="3" class="form-control" data-id></textarea>'
    + '</td>'
    + '<td>'
    + '<div class="btn-group">'
    + '<button type="button" data-id="%ID%" class="btn btn-primary"><i class="fa fa-floppy-o"></i></button>'
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
  $('.js-image-save').click(function() {
    var id = $(this).attr('data-id');
    var des = $('#js-image-des-' + id).val();
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
