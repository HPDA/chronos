<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

//get template width type
$templatewidthtype = $this->params->get('templateWidthType', '0');
$fluid = ($templatewidthtype != '0') ? '-fluid' : '';

?>

<?php if ($this->countModules('footer-mod')) : ?>
<div id="jm-footer-mod">
    <div id="jm-footer-mod-in" class="jm-footer container<?php echo $fluid ?>">
        <div id="jm-footer-mod-space">
            <?php echo DJModuleHelper::renderModules('footer-mod','jmmodule', $fluid); ?>
        </div>     
    </div>
</div>
<?php endif; ?>  