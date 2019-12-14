<h3>Task list</h3>

<div class="alert alert-primary" role="alert"><?=Controller::getSessionMessage('task_save_message')?></div>

<table class="table table-striped table-bordered" id="taskList">
  <thead>
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">User Email</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach ($this->tasks as $task) {
    $done   = ($task->isDone == 1) ? 'Done' : 'Not done yet';

printf('
	<tr>
      <th scope="row">%s</th>
      <td>%s</td>
      <td>%s</td>
      <td>%s</td>
    </tr>
', $task->username, $task->email, $task->description, $done);

}
?>
  </tbody>
</table>

<script>
$(document).ready(function () {
    $('#taskList').DataTable({
        "pageLength": 3,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
        });
	  $('.dataTables_length').addClass('bs-select');
	});
</script>