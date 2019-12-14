<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Bootstrap core JavaScript-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
					<?php if (\Aura\Auth\Status::VALID === $this->user_auth()->getStatus()) {
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

