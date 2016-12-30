<?php
  use Cake\Routing\Router;
  $URL = Router::url(['controller' => $this->request->params['controller'],'action' => 'edit'])
?>
<div class="row">
  <div class="col-md-12">
    <div class="ibox float-e-margins">
      <div class="ibox-content">
        <div class="row">
          <div class="col-md-12 text-right">
            <?php
            echo $this->Html->link(
              __('Create', true),
              ['controller' => $this->request->params['controller'], 'action' => 'add'],
              ['class' => 'btn btn-white btn-create']
            ); ?>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover dataTables" >
          <thead>
            <tr>
                <th><?= __('No.', true) ?></th>
                <th><?= __('Name', true) ?></th>
                <th><?= __('Address', true) ?></th>
                <th><?= __('Display', true) ?></th>
                <th><?= __('Action', true) ?></th>
            </tr>
          </thead>
            <tbody>
              <?php foreach ($results as $index => $item) {
                $index ++;
                ?>
                <tr>
                  <td><?=$index?></td>
                  <td><?=$item['name']?></td>
                  <td><?=$item['address']?></td>
                  <td><?=$item['display']?></td>
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
  '/plugins/datatables/datatables/media/css/dataTables.bootstrap.min.css'
]) ?>
<?= $this->Html->script([
  '/plugins/datatables/datatables/media/js/jquery.dataTables.min.js'
]) ?>
<script>
$(document).ready(function(){
  var table = $('.dataTables').DataTable({
    dom: '<"html5buttons"B>lTfgitp',
    columnDefs: [{
      targets: -1,
      //data: null,
      render: function( data) {
        return '<div class="btn-group"><a href="<?=$URL?>/' + data + '" class="btn btn-xs btn-white btn-edit s-before-n-p"></a>'
          + '<button class="btn btn-xs btn-white btn-delete"></button</div>';
      }
    }],
    buttons: []
  });
});
</script>
