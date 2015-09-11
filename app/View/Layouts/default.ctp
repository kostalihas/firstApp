<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $current_user['username']; ?> &raquo; <?php echo $title_for_layout; ?>  </title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    
   
    
    <link rel="stylesheet" type="text/css" href="/aclbake/css/bootstrap-theme.min.css" />

    <script type="text/javascript" src="/aclbake/app/webroot/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/aclbake/js/bootstrap.min.js"></script>
    
	<?php
		echo $this->Html->meta('icon');

	echo $this->Html->css(array('bootstrap.css','bootstrap-datetimepicker.css','croogo.css','datepicker.css'));
        echo $this->Html->script(array('bootstrap-datepicker.js','bootstrap.js','croogo-bootstrap.js'));
		
		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	  
  
       

	
</head>
<body>

			<div id="wrap">

<?php echo $this->element('menu') ?> 
	
	
	<?php echo $this->element('sidebar') ?>
    <div id="push"></div>
    
	 <div id="content-container" class="container-fluid">
	 	<div class="row-fluid">
	 		<div id="content" class="clearfix">
	<?php echo $this->Session->flash(); ?>

	  <?php echo $this->fetch('content'); ?>
	  </div>
		</div>	
			
	  </div>

</div>


<?php echo $this->element('footer') ?>
	
		
	
</body>
</html>
