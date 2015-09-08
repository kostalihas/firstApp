<!-- Fixed navbar -->
    <header class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tesla Team</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		
		<ul class="nav pull-right" id="top-right-menu">
		
			<li class=" dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
			 <img src="/aclbake/img/admin.jpg" class="img-rounded"> <?php echo $current_user['username']; ?> 
			<b class="caret"></b></a>
			<ul class="dropdown-menu">
			<li><a href="/aclbake/users/view/<?php echo $current_user['id']; ?>" >
			<i class="icon-user icon-large"></i>Profile</a></li>
			<li class="divider"><li><a href="/aclbake/users/logout" class="menu-logout sidebar-item">
			<i class="icon-off icon-large"></i>Logout</a></li></ul>
		</li>
			
			<li class="dropdown" >
<a href="#" data-type="message"  data-url="<?php echo $this->Html->url(array('controller' =>'notifications', 'action' =>'updateNotif')) ?>
" class="notification" data-toggle="dropdown">
                        <i class="fa fa-comments-o icon-large" ></i> 
                        <span class="badge bg-warning"><?php echo $this->Session->read('notif.nbr') ?></span>
                    </a>
                    <div class="dropdown-menu md arrow pull-right panel panel-default arrow-top-right messages-dropdown">
                        <div class="panel-heading">
                            Messages
                        </div>

                        <div class="list-group">
                            <!--Here we loop the list of notifications if they are not null-->
                            <?php
                           $messages = $this->Session->read('notif.messages');
                            if(!empty($messages)):

                             foreach ($messages as $message): ?>
                            <a href="#" class="list-group-item">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="media-heading"><?php echo $message['Notification']['title'] ?></h5>
                                        <small class="text-muted"><?php echo $message['Notification']['message'] ?></small>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach;?>
                        <!--this part is used when there's no notification to display to the user-->
                       <?php
                       else:?>
                        <a href="#" class="list-group-item">
                            <div class="media-body">
                                <h5 class="media-heading">
                                    <?php
                                    echo "il n y a pas de notification";
                                    ?>
                                </h5>
                            </div>
                        </a>
                        <?php
                       endif;
                        ?> 
                        <!--end else part of no notification-->
                        <a href="/aclbake/notifications" class="btn btn-info btn-flat btn-block">View All Messages</a>
                         <script>
    $(function () {
      $('.notification').click(function(){
    var url_app = $(this).data().url;
    
    
    console.log(url_app);
    $.ajax({
       url: url_app, //i have to change this line to be dynamically calculated
                     // in case if the application been put into producation
       dataType: 'json',
       success: function(data){
                console.log(data);
              },
       error: function(e){
                console.log('erreur dans l\'application ou connexion inexistante');
             }
    });

});
    
  });
    </script>

                    </div>

                </div>
            </li>

		

			</ul>
		
          <ul class="nav navbar-nav">
            
			<li class="active"><a href="/aclbake/pages/home">Home</a></li>
			
            <li class="dropdown clearfix ">
     <a id ="dropdownMenu1" href="#" class="dropdown-toggle" data-toggle="dropdown">User <span class="caret">
          </span></a>
     <ul class="dropdown-menu">
       <li><a <?php echo $this->Html->link("Liste Users", array('controller'=>'users','action'=>'index')); ?></a></li>
       <li><a <?php echo $this->Html->link("Ajouter User", array('controller'=>'users','action'=>'add')); ?></a></li>
     </ul>
</li>
			
			 <li class="dropdown">
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts <span class="caret">
			  </span></a> 
			  <ul class="dropdown-menu">
                <li><?php echo $this->Html->link("Liste Posts", array('controller'=>'posts','action'=>'index')) ?></li>
				<li><?php echo $this->Html->link("Ajouter Posts", array('controller'=>'posts','action'=>'add')) ?></li>
                
              </ul>
            </li>
			
			<li class="dropdown">
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Groups <span class="caret">
			  </span></a> 
			  <ul class="dropdown-menu">
                <li><?php echo $this->Html->link("Liste Groupes", array('controller'=>'groups','action'=>'index')) ?></li>
				<li><?php echo $this->Html->link("Ajouter Groupe", array('controller'=>'groups','action'=>'add')) ?></li>
                
              </ul>
            </li>
			
		
        </div><!--/.nav-collapse -->
      </div>
	  
    </header>
	