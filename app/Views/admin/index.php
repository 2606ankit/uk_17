<?= $this->extend('admin/layout/login_default');  ?>

<?= $this->section('content') ?>

<div id="page-container" class="fade">
		<!-- begin login -->
		<div class="login login-with-news-feed">
			<!-- begin news-feed -->
			<div class="news-feed">
				<div class="news-image" style="background-image: url(<?php echo base_url();?>assets/img/login-bg/login-bg-11.jpg)"></div>
				<div class="news-caption">
					<h4 class="caption-title"><b></h4>
					<!--<p>
						Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					</p>-->
				</div>
			</div>
			<!-- end news-feed -->
			<!-- begin right-content -->
			<div class="right-content">
				<!-- begin login-header -->
				<div class="login-header">
					<div class="brand">
						<span class="logo"></span> <b><?= $data['site_title'];?></b>
						<small>You command our life</small>
					</div>
					<div class="icon">
						<i class="fa fa-sign-in-alt"></i>
					</div>
				</div>
				<!-- end login-header -->
				<!-- begin login-content -->
				<div class="login-content">
                    <?php 
                            if (!empty($_SESSION['login_error']))
                            {
                                echo '<div class="col-m-12" style="margin-bottom:10px;width:100%;"><span class="btn btn-danger">'.$_SESSION['login_error'].'</span></div>';
                            } 
                         ?>
					<form method="POST" action="<?php echo base_url();?>userlogin" class="margin-bottom-0">
						<div class="form-group m-b-15">
							<input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username or Email-Id" required />
						</div>
						<div class="form-group m-b-15">
							<input type="password" name="userpass" id="userpass" class="form-control form-control-lg" placeholder="Password" required />
						</div>
						<div class="checkbox checkbox-css m-b-30">
							<input type="checkbox" id="remember_me_checkbox" value="" />
							<label for="remember_me_checkbox">
							Remember Me
							</label>
						</div>
                        <?= csrf_field() ?>
						<div class="login-buttons">
							<button type="submit"  name="btnsub" id="btnsub" class="btn btn-success btn-block btn-lg">Sign me in</button>
						</div>
						
						<hr />
						<p class="text-center text-grey-darker mb-0">
							&copy; Color Admin All Right Reserved 2019
						</p>
					</form>
				</div>
				<!-- end login-content -->
			</div>
			<!-- end right-container -->
		</div>
		<!-- end login -->
 
	</div>
<?= $this->endSection() ?>