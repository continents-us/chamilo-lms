<?php
/* For licensing terms, see /license.txt */
/**
 * Redirect script
 * @package chamilo.custompages
 */

require_once api_get_path(SYS_PATH).'main/inc/global.inc.php';
require_once __DIR__.'/language.php';

/**
 * Homemade micro-controller
 */
if (isset($_GET['loginFailed'])) {
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case 'account_expired':
                $error_message = custompages_get_lang('AccountExpired');
                break;
            case 'account_inactive':
                $error_message = custompages_get_lang('AccountInactive');
                break;
            case 'user_password_incorrect':
                $error_message = custompages_get_lang('InvalidId');
                break;
            case 'access_url_inactive':
                $error_message = custompages_get_lang('AccountURLInactive');
                break;
            default:
                $error_message = custompages_get_lang('InvalidId');
        }
    } else {
        $error_message = get_lang('InvalidId');
    }
}

$rootWeb = api_get_path('WEB_PATH');

/**
 * HTML output
 */
?>
<html>
<head>
	<title>Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo $rootWeb ?>web/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $rootWeb ?>web/assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $rootWeb ?>/custompages/style.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo $rootWeb ?>web/assets/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo $rootWeb ?>web/assets/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			if (top.location != location) {
                top.location.href = document.location.href;
            }

			// Handler pour la touche retour
			/* $('input').keyup(function(e) {
				if (e.keyCode == 13) {
					$('#login-form').submit();
				}
			}); */
		});
	</script>
</head>
<body>

<div class="page">
        <section id="content-page">
            <div class="container">                   
			     <center>
				 			            <br> 
                        <p>
                 <a href="https://www.continents.us/" target="_blank">
                    <img  src="custompages/images/seal.png" alt="Continents Academy Seal" width="200" height="200">
                 </a>
				        </p>
                    <h2>
                        CONTINENTS ACADEMY ONLINE<br />
                        STUDENT PORTAL
                    </h2>
					</center> 
                        <div class="row">
                            <div class="col-md-6">

                                <?php
                                    if (isset($content['info']) && !empty($content['info'])) {
                                        echo $content['info'];
                                    }
                                ?>

                                <?php
                                    if (isset($error_message)) {
                                        echo '<div id="login-form-info" class="form-error">'.$error_message.'</div>';
                                    }
                                ?>

                                <form id="login-form" class="form"  action="<?php echo api_get_path(WEB_PATH)?>index.php" method="post">
                                    <h2 class="form-signin-heading">Please Sign In</h2>
                                    <label for="username" ><?php echo custompages_get_lang('Student ID'); ?></label>
                                    <input type="text" name="login" id="username" class="form-control text-login"  required autofocus>
                                    <label for="password" ><?php echo custompages_get_lang('Password'); ?></label>
                                    <input type="password" name="password" id="password" class="form-control text-login"  required>
                                    <div class="form-submit">
                                        <button class="btn btn-lg btn-primary btn-block"  type="submit">
                                            <i class="fa fa-sign-in fa-lg" aria-hidden="true"></i>
                                            <?php echo custompages_get_lang('LoginEnter'); ?>
                                        </button>
                                    </div>

                                </form>


                            </div>
                            <div class="col-md-6">
                                <div class="options">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="<?php echo $rootWeb ?>custompages/images/padlock.png" alt="<?php echo custompages_get_lang('LostPassword')?>">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Forgot your Username/Password?</h4>
                                            <p><a href="<?php echo api_get_path(WEB_CODE_PATH); ?>auth/lostPassword.php?language=<?php echo api_get_interface_language(); ?>"><?php echo custompages_get_lang('LostPassword')?></a></p>
                                        </div>
                                    </div>
                                    <?php if (api_get_setting('allow_registration') === 'true') { ?>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="<?php echo $rootWeb ?>/custompages/images/user.png" alt="<?php echo custompages_get_lang('Registration')?>">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Not a Student Yet?</h4>
                                                <p><a href="<?php echo api_get_path(WEB_CODE_PATH); ?>auth/inscription.php?language=<?php echo api_get_interface_language(); ?>"><?php echo custompages_get_lang('Registration')?></a></p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
<div class="footer">
	<center>
	    <p>
            &copy; 2018 Continents Academy - All rights reserved. +1 (614) 769-7478
        </p>		
		</center>				
</div>

            </div> 
        </section>
		<!-- /container -->
</body>
</html>
