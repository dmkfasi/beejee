<h3>Task list</h3>

<div class="alert alert-primary" role="alert"><?=App\Controller::getSessionMessage('task_save_message')?></div>

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
    $doneToggle = '';
    $editor     = $task->description;
    $isDone     = ($task->isDone == 1) ? 'Done' : 'Not done yet';
    $isEdited   = ($task->isEdited == 1) ? 'Edited by Admin' : '';

    // Setup extra controls for authenticated user
    if ($this->user_auth()->isValid()) {
        // This is for Done pushbutton
        if  ($task->isDone == 0) {
            $doneToggle = '<a href="#" class="btn btn-outline-info completeButton" data-id="' . $task->id . '">Done</a>';
        }

        // This is for inline editor
        $editor = '<input class="align-middle w-75" id="task' . $task->id . '" value="' . $task->description . '"> <a href="#" class="btn btn-outline-info saveButton" data-id="' . $task->id . '">Save</a>';
    } else {
        $doneToggle = '';
    }

printf('
	<tr>
      <th scope="row">%s</th>
      <td>%s</td>
      <td>%s&nbsp;%s</td>
      <td>%s&nbsp;&nbsp;%s</td>
    </tr>
', $task->username, $task->email, $editor, $isEdited, $isDone, $doneToggle);

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

	// Done button handler
	$('#taskList').on('click', 'a.completeButton', function(e) {
	    var taskId = $(this).data('id');

	    $.ajax({
			url: '<?=url('setDone')?>',
			type: 'POST',
			data: {
				id: taskId,
			},

			success: function (response) {
                // ajax success callback
                location.reload();
            },

            error: function (response) {
                // ajax error callback
                alert('Unable to complete the Task ' + taskId);
            },
		});
	});

	// Save description button
	$('#taskList').on('click', 'a.saveButton', function(e) {
	    var taskId = $(this).data('id');
	    var descr = $('input#task' + taskId).val();

	    $.ajax({
			url: '<?=url('setDescription')?>',
			type: 'POST',
			data: {
				description: descr,
				id: taskId,
			},

			success: function (response) {
                // ajax success callback
                location.reload();
            },

            error: function (response) {
                // ajax error callback
                alert('Unable to save the Task ' + taskId);
            },
		});
	});
});
</script>