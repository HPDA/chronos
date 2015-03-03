<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

// get direction
$direction = $this->params->get('direction', 'ltr');

// get scheme option
$schemeoption = $this->params->get('schemeOption', 'lcr');
$currentscheme = $this->params->get('currentScheme');

//check modules
//get logo and site description
$logo = htmlspecialchars($this->params->get('logo'));
$logotext = htmlspecialchars($this->params->get('logoText'));
$sitedescription = htmlspecialchars($this->params->get('siteDescription'));

if($this->countModules('top-menu-nav') or $this->countModules('top-mod1') or $this->countModules('top-mod2')) { $nomiddlebar=' middlebar'; } else { $nomiddlebar=''; }
if (($logo != '') or ($logotext != '') or ($sitedescription != '') or $this->countModules('top-bar')) { $notopbar=' topbar'; } else { $notopbar=''; }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $direction; ?>">
	<?php $this->renderBlock('head'); ?>
	<body>
        <div id="jm-allpage" class="<?php echo $currentscheme.' '.$schemeoption.' '.$notopbar.' '.$nomiddlebar; ?>">
            <?php $this->renderBlock('topbar'); ?>
            <?php $this->renderBlock('header'); ?>
            <?php $this->renderBlock('middlebar'); ?>
            <?php $this->renderBlock('content'); ?>
            <?php $this->renderBlock('bottom1'); ?>
            <?php $this->renderBlock('bottom2'); ?>
            <?php $this->renderBlock('bottom3'); ?>
            <?php $this->renderBlock('footermod'); ?>
    	    <?php $this->renderBlock('footer'); ?>
		</div>
	</body>
</html>