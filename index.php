<?php
include("includes/database.php");
session_start();
include("includes/login.php"); 
include("includes/register.php")
?>



<!DOCTYPE html>
<html>
    <?php $page_title = "Home Page";    include("includes/head.php");?>
    <body class="bodyChange">
        
        <div class="containerIndex">
            <div class="title"></div>
        </div>
        
    
        
    <div class="containerIndex">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
							    
							    <div id="info"></div>
							    <!--login-->
								<form id="login-form" name="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input class="form-control" type="text" id="user" placeholder="user name or email" name="user">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" id="password" placeholder="your password" name="password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
								
								<!--register-->
								<form id="register-form" action="<?php echo $currentpage; ?>" method="post" role="form" style="display: none;">
									<!--Username-->
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="8 characters minimum" value="">
									</div>
            						
            						<!--Email-->
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									
									<!--Password1-->
									<div class="form-group">
										<input type="password" name="password1" id="password1" tabindex="2" class="form-control" placeholder="Password">
									</div>
									
									<!--Confirm Password-->
									<div class="form-group">
										<input type="password" name="password2" id="password2" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

            <ul class="bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            
            
        <script>
        
        //Ajax for login
        $(document).ready(function(){
        	$("#login-form").validate({
        		rules:	{
        			user:	{
        				required:	true
        			},
        			password:	{
        				required:	true
        			}
        			
        		},
        		messages:{
        			user:	{
        				required:	"Username Required"
        			},
        			password:	{
        				required:	"Password Required"
        			}
        			
        		},
        		submitHandler: subform
        	})
        	
        	function subform(){
	        	// var data = $("login-form").serialize();
	        	// $.ajax({
	        	// 	type:	'POST',
	        	// 	url:	'login.php',
	        	// 	data: data,
	        		
	        	// 	beforeSend: function(){
	        	// 		$("#info").fadeOut();
	        	// 		$("login-submit").html("Sending...");
	        	// 	},
	        	// 	success: function(resp){
	        	// 		if(resp=="ok"){
	        	// 			$("#login-submit").html("<img src='ajax-loader.gif' width='15'/> &nbsp; Log In");
	        	// 			setTimeout('window.location.href = "userPage.php;',4000);
	        	// 		} else{
	        	// 			$("#info").fadeIn(1000, function(){
	        	// 				$("#info").html("<div class='alert alert-danger'>"+resp+"</div>");
	        	// 				$("#login-submit").html('Log in');
	        	// 			})
	        	// 		}
	        	// 	}
	        	// })
	        	login-form.submit;
        	}
        	
        })	
        
        
        
        </script>
        
    </body>
</html>