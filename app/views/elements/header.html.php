<?php
use lithium\storage\Session;
use app\extensions\action\Functions;
?>
<?php $user = Session::read('member'); ?>
<div class="navbar-wrapper">
	<div class="container">
		<div class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">...</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/"><img src="/img/MultiSigX.png" alt="MultiSigX"><sup><small><strong style="color:red">beta</strong></small></sup></a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="/company/how">How it works?</a></li>
						<li><a href="/company/FAQ">FAQ</a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
					<?php if($user!=""){ ?>
						<li><a href="/ex/dashboard" class=" tooltip-x" rel="tooltip-x" data-placement="bottom" title="Dashboard "><i class="icon-dashboard icon-large"></i></a></li>
						<li><a href="/ex/settings" class=" tooltip-x" rel="tooltip-x" data-placement="bottom" title="Settings "><i class="icon-gears icon-large"></i></a></li>								
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-user"></i> &nbsp;<?=$user['username']?>&nbsp;<i class="caret"></i></a>
							
							<ul class="dropdown-menu" style="width:200px">
								<!-- User image -->
								<li class="user-header bg-light-blue text-center"><br>
												<img src="../img/avatar3.png" class="img-circle" alt="<?=$user['firstname']?> <?=$user['lastname']?>" width="150" />
												<p>
															<?=$user['firstname']?> <?=$user['lastname']?><br>
															<small>Member since <?=gmdate('d M Y',$user['created'])?></small>
												</p>
								</li>
								<!-- Menu Body -->
								<li class="user-body">
												<div class="col-xs-6 text-center">
																
												</div>
												<div class="col-xs-6 text-center">
																
												</div>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
												<div class="pull-left">
																<a href="#" class="btn btn-primary btn-sm btn-flat">Friends</a>
												</div>
												<div class="pull-right">
																<a href="/logout" class="btn btn-danger btn-sm btn-flat">Sign out</a>
												</div>
								</li>
							</ul>
							
 					</li>
						<li><a href="/logout" class=" tooltip-x" rel="tooltip-x" data-placement="bottom" title="Sign Out "><i class="icon-power-off icon-large"></i></a></li>
						<li><a href="#" class='dropdown-toggle tooltip-x' data-toggle='dropdown'  rel="tooltip-x" data-placement="bottom" title="Themes "><i class="icon-th icon-large"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#" onClick="ChangeTheme('chrome','<?=str_replace("/","_",$_SERVER['REQUEST_URI'])?>');"><i class="icon-heart-empty"></i> Chrome</a></li>			
								<li><a href="#" onClick="ChangeTheme('flaty','<?=str_replace("/","_",$_SERVER['REQUEST_URI'])?>');"><i class="icon-heart-empty"></i> Flaty</a></li>			
								<li><a href="#" onClick="ChangeTheme('lumen','<?=str_replace("/","_",$_SERVER['REQUEST_URI'])?>');"><i class="icon-heart-empty"></i> Lumen</a></li>			
								<li><a href="#" onClick="ChangeTheme('readable','<?=str_replace("/","_",$_SERVER['REQUEST_URI'])?>');"><i class="icon-heart-empty"></i> Readable</a></li>			
								<li><a href="#" onClick="ChangeTheme('dynamic','<?=str_replace("/","_",$_SERVER['REQUEST_URI'])?>');"><i class="icon-heart-empty"></i> Dynamic</a></li>			
								<li><a href="#" onClick="ChangeTheme('united','<?=str_replace("/","_",$_SERVER['REQUEST_URI'])?>');"><i class="icon-heart-empty"></i> United</a></li>			
								<li><a href="#" onClick="ChangeTheme('yeti','<?=str_replace("/","_",$_SERVER['REQUEST_URI'])?>');"><i class="icon-heart-empty"></i> Yeti</a></li>			
								<li><a href="#" onClick="ChangeTheme('amelia','<?=str_replace("/","_",$_SERVER['REQUEST_URI'])?>');"><i class="icon-heart-empty"></i> Amelia</a></li>			
								<li class="divider"></li>
								<li><a href="#" onClick="ChangeTheme('default','<?=str_replace("/","_",$_SERVER['REQUEST_URI'])?>');"><i class="icon-heart"></i> Default</a></li>										
							</ul>					
						</li>								
						
					<?php }else{?>					
						<li><a href="/signin">Sign In</a></li>
						<li><a href="/signup">Sign Up</a></li>
					<?php }?>				
					
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

