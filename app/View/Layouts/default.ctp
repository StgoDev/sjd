<?php
$cakeDescription = __d('cake_dev', 'SIS CORREG');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		::<?php echo $cakeDescription ?>::
	</title>
    <meta name="description" content="Corregedoria PMPI">
    <meta name="keywords" content="pmpi corregedoria Teresina Piauí Policia Militar do Piauí"> 	
    <meta name="author" content="Felipe Santiago"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('style','sb-admin-2','bootstrap'));
		echo $this->Html->script(array('sb-admin-2','bootstrap'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Droid+Sans+Mono" />

	</head>
<body>
	<div id="wrapper">
  <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo $this->Html->link('SIS CORREG - 1.0', '/', array('class' => 'navbar-brand')); ?>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                      <?php if($this->Session->read('Auth.User.username')) : ?>
                        <li>
                          <?php echo $this->Html->link('Ficha', '/pms/profile', array('class' => '')); ?>                      
                        </li>
                        <li class="divider"></li>
                        <li>
                           <?php echo $this->Html->link('Sair', '/users/logout', array('class' => '')); ?>  
                        </li>
                       <?php else: ?>
                        <li>
                        <?php echo $this->Html->link('Login', '/users/login', array('class' => '')); ?>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php if (!$authUser):?>
                        <li style="text-transform: uppercase;font-style: oblique;font-weight: 400;text-align:center;background:#fff;"> 
                        <div style="padding:5px;">
                        <?php echo $this->Html->image('correg.png', array('alt' => 'PDF','width' => 120));?>  
                        </div>  
                        <p>Corregedoria da PMPI</p>  
                        <hr>  
                        <p>Olá, <?php echo $this->Session->read("Auth.User.username"); ?>.</p>                
                        </li>
                       
                        <?php if($this->Session->read('Auth.User.group_id') == 3) : ?>
                        <li><?php echo $this->Html->link('Procedimentos', '/subjects', array('class' => 'button')); ?></li> 
                        <li><?php echo $this->Html->link('Encarregados', '/courses', array('class' => 'button')); ?></li>
                        <li><?php echo $this->Html->link('Usuários', '/users', array('class' => 'button')); ?></li>
                        <?php endif; ?>
                        <li><?php echo $this->Html->link('Sair', '/users/logout', array('class' => 'button')); ?></li>
                        
                        <?php endif;?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
        </nav> 

    
			
    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
              <?php echo $this->Session->flash(); ?>
              <?php echo $this->fetch('content'); ?>
          </div>
        </div>
    </div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
