<?php

// Custom authentication adapter for this very project to avoid PDO adaptor creation
$adapter = new AuraCustomAdapter();

$auth_factory = new \Aura\Auth\AuthFactory($_COOKIE);
$auth = $auth_factory->newInstance();

$login_service = $auth_factory->newLoginService($adapter);
$logout_service = $auth_factory->newLogoutService($adapter);
// $resume_service = $auth_factory->newResumeService($adapter);

registry::addService('auth', $auth);
registry::addService('auth_login', $login_service);
registry::addService('auth_logout', $logout_service);
// registry::addService('auth_resume', $resume_service);
