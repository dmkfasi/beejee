<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

		<title>BeeJee Task List Website</title>
  </head>
  <body>
		<div class="container pt-4">
			<div class="row">
				<div class="col text-left">
					<a href="<?=url('task.create')?>" class="btn btn-primary">Add a Task</a>
					<a href="<?=url('task.index')?>" class="btn btn-primary">Task List</a>
				</div>
				<div class="col text-right">
					<a href="/user/login" class="btn btn-primary">Login</a>
				</div>
			</div>
		</div>

		<div class="container pt-4">
			<?= $this->getContent(); ?>
		</div>
  </body>
</html>

