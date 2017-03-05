<?php
  use Cake\Routing\Router;
  $url = Router::url(['controller' => $this->request->params['controller'],'action' => 'edit']);
  $urlDelete = Router::url(['controller' => $this->request->params['controller'],'action' => 'delete'])
?>
<div class="row">
  <div class="col-md-12">
    <div class="ibox float-e-margins">
      <div class="ibox-content">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover dataTables" >
          <thead>
            <tr>
                <th><?= __('No.', true) ?></th>
                <th><?= __('Name', true) ?></th>
                <th><?= __('Trình bày', true) ?></th>
                <th class="text-center"><?= __('Display', true) ?></th>
                <th></th>
            </tr>
          </thead>
            <tbody>
              <?php foreach ($results as $index => $item) {
                $index ++;
                ?>
                <tr id="js-row-<?=$item['id']?>">
                  <td><?=$index?></td>
                  <td><?=$item['name']?></td>
                  <td><?=$item['singer']['name']?></td>
                  <td class="text-center">1</td>
                  <td class="text-right"><?=$item['id']?></td>
                </tr>
                <?php
                # code...
              } ?>
            </tbody>
          <tfoot>
          </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->Html->css([
  'Administrator.plugins/dataTables/dataTables.min.css'
]) ?>
<?= $this->Html->script([
  'Administrator.plugins/dataTables/datatables.min.js'
]) ?>
<script>
$(document).ready(function(){
  var table = $('.dataTables').DataTable({
    dom: '<"html5buttons"B>lTfgitp',
    total: 57,
    columnDefs: [{
      targets: -1,
      //data: null,
      render: function( data) {
        return '<div class="btn-group"><a href="<?=$url?>/' + data + '" class="btn btn-xs btn-white btn-edit s-before-n-p"></a>'
          + '<button type="button" data-id="' + data + '" data-url="<?=$urlDelete?>/' + data + '" class="btn btn-xs btn-white btn-delete s-before-n-p js-delete-item"></button</div>';
      }
    },
    {
      targets: -2,
      //data: null,
      render: function( data) {
        var icon = '';
        if (data == 1) {
          icon = '<i class="fa fa-check" aria-hidden="true"></i>';
        }
        return '<span class="text-primary text-status">' + icon + '</span>';
      }
    }],
    buttons: [
      {
        text: '<?=__('Create', true)?>',
        action: function ( e, dt, node, config ) {
          location.href = '<?=Router::url(['controller' => $this->request->params['controller'], 'action' => 'add', $cat])?>'
        }
      }
    ]
  });
});
</script>
