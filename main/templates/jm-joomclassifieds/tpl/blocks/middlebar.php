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

if(!$this->countModules('top-mod1') or !$this->countModules('top-mod2')) { $notopmod=' notopmod'; } else { $notopmod=''; }

?>

<?php if($this->countModules('top-menu-nav') OR $this->countModules('top-mod1') OR $this->countModules('top-mod2')) : ?>
<div id="jm-middle-bar">
    <div id="jm-middle-bar-in" class="container<?php echo $fluid ?>">
        <div id="jm-middle-bar-space">
            <?php if($this->countModules('top-menu-nav')) : ?>
            <div id="jm-djmenu" class="clearfix">
                <jdoc:include type="modules" name="top-menu-nav" style="raw"/>
            </div>
            <?php endif; ?> 
            <?php if($this->countModules('top-mod1') OR $this->countModules('top-mod2')) : ?>
            <div id="jm-top-mod" class="<?php echo $notopmod; ?> clearfix">
                <?php if($this->countModules('top-mod1')) : ?>
                <div id="jm-top-mod1" class="pull-left">
                    <div id="jm-top-mod1-in">
                        <jdoc:include type="modules" name="top-mod1" style="jmmodule"/>
                    </div>
                </div>
                <?php endif; ?> 
                <?php if($this->countModules('top-mod2')) : ?>
                <div id="jm-top-mod2" class="pull-right">
                    <div id="jm-top-mod2-in">
                        <jdoc:include type="modules" name="top-mod2" style="jmmodule"/>
                    </div>
                </div>
                <?php endif; ?>
            </div> 
            <?php endif; ?>
        </div>
     </div>   
</div>
<?php endif; ?> 
