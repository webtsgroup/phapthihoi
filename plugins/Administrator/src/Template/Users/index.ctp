<div class="row">
  <div class="col-md-12">
    <div class="ibox float-e-margins">
      <div class="ibox-content">
        <div class="row">
          <div class="col-md-12">
            <?php
            echo $this->Html->link(
              __('Create', true),
              ['controller' => 'users', 'action' => 'add'],
              ['class' => 'btn btn-primary btn-create']
            ); ?>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover dataTables-example" >
          <thead>
            <tr>
                <th><?= __('No.') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Action') ?></th>
            </tr>
          </thead>
            <tbody>
              <?php foreach ($results as $index => $item) {
                $index ++;
                ?>
                <tr>
                  <td><?=$index?></td>
                  <td><?=$item['username']?></td>
                  <td><?=$item['first_name']?></td>
                  <td><?=$item['username']?></td>
                  <td><?=$item['username']?></td>
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
  var table = $('.dataTables-example').DataTable({
    dom: '<"html5buttons"B>lTfgitp',
    columnDefs: [{
      targets: -1,
      data: null,
      defaultContent:`<button class="btn btn-xs btn-white btn-update">Edit</button>
        <button class="btn btn-xs btn-white btn-delete">Delete</button>`
    }],
    buttons: [
      {
        extend: 'print',
        customize: function (win) {
          $(win.document.body).addClass('white-bg');
          $(win.document.body).css('font-size', '10px');
          $(win.document.body).find('table')
                  .addClass('compact')
                  .css('font-size', 'inherit');
        }
      }
    ]
  });
});
</script>
