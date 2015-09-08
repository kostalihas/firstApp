
<p>Dear <?php echo $username; ?>,</p>

<p>You may change your password using the link below.</p>
<?php $url = 'http://' . env('SERVER_NAME') . '/aclbake/users/reset_password_token/' .$reset_password_token; ?>
<p><?php echo $this->html->link($url, $url); ?></p>

<p>Your password won't change until you access the link above and create a new one.</p>
<p>Thanks and have a nice day!</p>
