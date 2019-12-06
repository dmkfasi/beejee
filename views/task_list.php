<h3>Task list</h3>

<table class="table">
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
foreach ($this as $task) {
    $name = $this->escape()->html($task['userName']);
    $email = $this->escape()->html($task['userEmail']);
    $desc = $this->escape()->html($task['description']);
    $done = (isset($task['isDone'])) ? 'Done' : 'Not done yet';

printf('
		<tr>
      <th scope="row">%s</th>
      <td>%s</td>
      <td>%s</td>
      <td>%s</td>
    </tr>
', $name, $email, $desc, $done);

}
?>
  </tbody>
</table>
