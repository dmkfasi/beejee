<h3>Add a new Task</h3>

<form method="post" action="/task/save">

	<p>Please, fill in all the fields.</p>

	<div class="form-group">
		<label for="userName">Your Name</label>
		<input id="userName" class="form-control" type="email" name="" value="">
		<div class="error">error_message</div>
	</div>

	<div class="form-group">
		<label for="userEmail">Your E-mail</label>
		<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		<div class="error">error_message</div>
	</div>

	<div class="form-group">
		<label for="taskDescription">Task Description</label>
		<textarea id="taskDescription" class="form-control" name=""></textarea>
		<div class="error">error_message</div>
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>

</form>
