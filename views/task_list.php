<h3>Task list</h3>

<?php
$pagination = $this->pagination;
?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
<?php
if (is_null($pagination['previousPage'])) {
    $prevDisabled = 'disabled';
}

if (is_null($pagination['nextPage'])) {
    $nextDisabled = 'disabled';
}
?>
    <li class="page-item <?=$prevDisabled?>"><a class="page-link" href="#">Previous</a></li>
<?php 
for ($i = 1; $i <= $pagination['totalPages']; $i++) {
    $active = ($pagination['currentPage'] == $i) ? 'active' : '';
    echo '<li class="page-item ' . $active . '"><a class="page-link" href="' . url('task', [ 'id' => $i ]) . '">' . $i . '</a></li>';
}
?>
    <li class="page-item <?=$nextDisabled?>"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

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
