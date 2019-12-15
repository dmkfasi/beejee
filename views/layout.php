<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <!-- Bootstrap core JavaScript-->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--  DataTables -->
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

	<title>BeeJee Task List Website</title>
  </head>
  <body>
		<div class="container pt-4">
			<div class="row">
				<div class="col text-left">
					<a href="<?=url('task.create')?>" class="btn btn-primary">Add a Task</a>
					<a href="<?=url('task.index')?>" class="btn btn-primary">Task List</a>
				</div>
				<div class="col text-center my-auto">
					<?=Controller::getSessionMessage('user_login_message', false)?>
				</div>
				<div class="col text-right">
					<?php if ($this->user_auth()->isValid()) {
					   printf('<a href="%s" class="btn btn-primary">%s</a>', url('user.logout'), 'Logout');
					} else {
					   printf('<a href="%s" class="btn btn-primary">%s</a>', url('user.login'), 'Login');
					}
					?>
				</div>
			</div>
		</div>

		<div class="container pt-4">
			<?= $this->getContent(); ?>
		</div>
  </body>
</html>

