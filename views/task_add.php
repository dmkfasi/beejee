<h3>Add a new Task</h3>

<form method="post" action="<?=url('task.store')?>" class="needs-validation">
    <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
	<p>Please, fill in all the fields.</p>

	<div class="form-group">
		<label for="userName">Your Name</label>
		<input type="text" id="userName" class="form-control" name="username" required="required">
	</div>

	<div class="form-group">
		<label for="userEmail">Your E-mail</label>
		<input type="email" id="userEmail" class="form-control" name="email" required="required">
	</div>

	<div class="form-group">
		<label for="taskDescription">Task Description</label>
		<textarea id="taskDescription" class="form-control" name="description" required="required"></textarea>
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>

</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>