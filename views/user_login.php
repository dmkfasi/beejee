<h3>Please login here</h3>

<div class="alert alert-primary" role="alert"><?=Controller::getSessionMessage('user_login_message')?></div>

<form method="post" action="<?=url('user.auth')?>" class="needs-validation">
    <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">

	<div class="form-group">
		<label for="userName">Your Name</label>
		<input type="text" id="userName" class="form-control" name="username" required="required">
	</div>

	<div class="form-group">
		<label for="userPassword">Your Password</label>
		<input type="password" id="userPassword" class="form-control" name="password" required="required">
	</div>

	<button type="submit" class="btn btn-primary">Authenticate</button>

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