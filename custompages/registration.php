<?php
/* For licensing terms, see /license.txt */
/**
 * This script allows for specific registration rules (see CustomPages feature of Chamilo)
 * Please contact CBlue regarding any licences issues.
 * Author: noel@cblue.be
 * Copyright: CBlue SPRL, 20XX (GNU/GPLv3)
 * @package chamilo.custompages
 **/

require_once api_get_path(SYS_PATH).'main/inc/global.inc.php';
require_once __DIR__.'/language.php';
/**
 * Removes some unwanted elementend of the form object
 */
/* $content['form']->removeElement('extra_mail_notify_invitation');
$content['form']->removeElement('extra_mail_notify_message');
$content['form']->removeElement('extra_mail_notify_group_message');
$content['form']->removeElement('official_code');
$content['form']->removeElement('phone');
$content['form']->removeElement('submit');
if (isset($content['form']->_elementIndex['status'])) {
    $content['form']->removeElement('status');
    $content['form']->removeElement('status');
}*/
$rootWeb = api_get_path('WEB_PATH');

// Deprecated since 2015-03-26
/**
 * Code to change the way QuickForm render html
 */
/*
$renderer = & $content['form']->defaultRenderer();
$form_template = <<<EOT

<form {attributes}>
{content}
  <div class="clear">
    &nbsp;
  </div>
  <p><a href="#" class="btn btn-primary" onclick="$('#registration-form').submit()"><span>S'inscrire</span></a></p>
</form>

EOT;
$renderer->setFormTemplate($form_template);

$element_template = <<<EOT
  <div class="field decalle">
    <label>
      <!-- BEGIN required --><span class="form_required">*</span> <!-- END required -->{label}
    </label>
    <div class="formw">
      <!-- BEGIN error --><span class="form_error">{error}</span><br /><!-- END error --> {element}
    </div>
  </div>

EOT;
$element_template_wimage = <<<EOT
  <div class="field decalle display">
    <label>
      <!-- BEGIN required --><span class="form_required">*</span> <!-- END required -->{label}
    </label>
    <div class="formw">
      <!-- BEGIN error --><span class="form_error">{error}</span><br /><!-- END error --> {element}
      <img src="/custompages/images/perso.jpg" alt="" />
    </div>
  </div>

EOT;
$renderer->setElementTemplate($element_template_wimage,'pass1');
$renderer->setElementTemplate($element_template);

$header_template = <<<EOT
  <div class="row">
    <div class="form_header">{header}</div>
  </div>

EOT;

 */
?>
<html>
<head>
    <title><?php echo custompages_get_lang('Registration'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo $rootWeb ?>web/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $rootWeb ?>web/assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $rootWeb ?>/custompages/style.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo $rootWeb ?>web/assets/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo $rootWeb ?>web/assets/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="page">

    <section id="content-page">
        <div class="container">
            <div class="panel panel-default panel-lost register">
				<center><div class="logo"><img src="custompages/images/continents-academy-logo.png" class="img-responsive"/></div></center> 
                <div class="panel-body">
                    <?php
                        if (isset($content['error']) && !empty($content['error'])) {
                            echo '<div id="registration-form-error" class="alert alert-danger">'.$content['error'].'</div>';
                        }
                    ?>

                    <?php $content['form']->display(); ?>

                    <div id="links">
                        <!--<a href="mailto: support@cblue.be"><?php echo custompages_get_lang('NeedContactAdmin')?></a><br />-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

</body>
</html>
