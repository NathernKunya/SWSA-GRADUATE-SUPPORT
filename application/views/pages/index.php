<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('templates/head');?>
</head>

<body>
<section>
		<div class="ad-log-main">
			<div class="ad-log-in">
				<div class="ad-log-in-logo">
					<a href="index.html"><img src="assets/images/icon/logo.png" style="height:60px;" alt=""></a>
				</div>
				<div class="ad-log-in-con">
			<div class="log-in-pop-right">
                    <h4>Login</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <?php echo validation_errors(); ?>
                        <?php echo form_open('Admin/login','class=s12', 'method=post');?>
                        <div>
                            <div class="input-field s12">
                                <input type="text" data-ng-model="name" name="username" class="validate">
                                <label class="">User name</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" name="password" class="validate">
                                <label>Password</label>
                            </div>
                        </div>
                        <div>
                            <div class="s12 log-ch-bx">
                                <p>
                                    <input type="checkbox" id="test5">
                                    <label for="test5">Remember me</label>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style="">
                                    <input type="submit" value="Login" class="waves-button-input"></i> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="admin-forgot.html">Forgot password</a> | <a href="admin-login.html#">Create a new account</a> </div>
                        </div>
                    </form>
                </div>
				</div>
			</div>
		</div>
   </section>
</body>

</html>