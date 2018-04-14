<?php
/* For licensing terms, see /license.txt */
/**
 * Quick form to ask for password reminder.
 * @package chamilo.custompages
 */

require_once api_get_path(SYS_PATH).'main/inc/global.inc.php';
require_once __DIR__.'/language.php';

$rootWeb = api_get_path('WEB_PATH');
?>
<html>
<head>
	<title><?php echo custompages_get_lang('LostPassword'); ?></title>
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
			// Handler pour la touche retour
			$('input').keyup(function(e) {
				if (e.keyCode == 13) {
					$('#lostpassword-form').submit();
				}
			});
		});
	</script>
</head>
<body>
        <section id="content-page">
            <div class="container">
                <div class="panel panel-default panel-lost ">
					<center><div class="logo"><img src="custompages/images/continents-academy-logo.png" class="img-responsive"/></div></center> 
                    <div class="panel-body">
                        <div id="lostpassword-form-box" class="form-box">
                            <?php
                            if (isset($content['info']) && !empty($content['info'])) {
                                echo '<div id="registration-form-error" class="form-error"><ul>'.$content['info'].'</ul></div>';
                            }

                            echo isset($content['form']) ? $content['form'] : ''
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
