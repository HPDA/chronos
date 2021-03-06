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

//get information about style switcher
$styleswitcher = $this->params->get('styleSwitcher', '1');

//get information about template style
$templatestyle = $this->params->get('templateStyle', '1');

//get information about css compress
$csscompress = $this->params->get('cssCompress', '0');

//get information about responsive layout
$responsivelayout = $this->params->get('responsiveLayout');

// get google web font url for body font
$bodyfonttype = $this->params->get('bodyFontType', '0');
$bodygooglewebfonturl = htmlspecialchars($this->params->get('bodyGoogleWebFontUrl'));

// get google web font url for module headings
$headingsfonttype = $this->params->get('headingsFontType', '0');
$headingsgooglewebfonturl = htmlspecialchars($this->params->get('headingsGoogleWebFontUrl'));

// get google web font url for article headings
$articlesfonttype = $this->params->get('articlesFontType', '0');
$articlesgooglewebfonturl = htmlspecialchars($this->params->get('articlesGoogleWebFontUrl'));

// get google web font url for dj-menu
$djmenufonttype = $this->params->get('djmenuFontType', '0');
$djmenugooglewebfonturl = htmlspecialchars($this->params->get('djmenuGoogleWebFontUrl'));

// get google web font url for advanced selectors
$advancedfonttype = $this->params->get('advancedFontType', '0');
$advancedgooglewebfonturl = htmlspecialchars($this->params->get('advancedGoogleWebFontUrl'));

// get favicon
$faviconimg = $this->params->get('favIconImg');

// get google analytics code
$googleanalytics = $this->params->get('googleAnalytics', '0');
$googleanalyticscode = $this->params->get('googleAnalyticsCode');

$googlewebmaster = @current(explode(';', $this->params->get('googleWebmaster', '0')));
$googlewebmastermeta = ($this->params->get('googleWebmasterMeta'));

?>
<head>
    <!-- viewport fix for devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- load core head -->
    <jdoc:include type="head" />
    
    <?php
    
    $browser = JBrowser::getInstance()->getBrowser();
    
    // load compressed css
    if ($csscompress != '0') {
        $cookiestyle = isset($_COOKIE['jm_joomclassifieds']) ? $_COOKIE['jm_joomclassifieds'] : '';
        $this->addStyleSheet(JMF_TPL_URL.'/'.'css'.'/'.'compressed_css.php?direction='.$direction.'&amp;style='.$templatestyle.'&amp;cookiestyle='.$cookiestyle.'&amp;styleswitcher='.$styleswitcher.'&amp;browser='.htmlspecialchars($browser));
    } else {
                
    // load uncompressed css
    
        // load bootstrap css
        if ($direction == 'rtl') {
            $this->addCompiledStyleSheet(JMF_TPL_PATH.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'bootstrap_rtl.less');
            if ($responsivelayout == "1") {
                $this->addCompiledStyleSheet(JMF_TPL_PATH.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'bootstrap_responsive_rtl.less');
            }
        } else {
            $this->addCompiledStyleSheet(JMF_TPL_PATH.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'bootstrap.less');
            if ($responsivelayout == "1") {
                $this->addCompiledStyleSheet(JMF_TPL_PATH.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'bootstrap_responsive.less');
            }
        }
        
        // load template css
        $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'template.less');
        
        // load extensions css
        $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'extensions.less');
        
        // load animated buttons styles
        if ($browser != 'safari') {
            $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'animated-buttons.less');
        } else {
            $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'animated-buttons_safari.less');
        }

        // load RTL styles
        if ($direction == 'rtl') :
            $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'template_rtl.less');
            $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'extensions_rtl.less');
        endif;
        if ($direction == 'rtl') {
            if ($styleswitcher != '0') {
                $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'style'.(isset($_COOKIE['jm_joomclassifieds']) ? $_COOKIE['jm_joomclassifieds'] : $templatestyle).'_rtl.less');
            } else {
                $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'style'.$templatestyle.'_rtl.less');
            }
        } else {
            if ($styleswitcher != '0') {
                $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'style'.(isset($_COOKIE['jm_joomclassifieds']) ? $_COOKIE['jm_joomclassifieds'] : $templatestyle).'.less');
            } else {
                $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'style'.$templatestyle.'.less');
            }
        }
        
        // load responsive styles
        if ($responsivelayout == "1") {
            $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'template_responsive.less');
        }
		
	    // load custom styles
	    $this->addCompiledStyleSheet(JMF_TPL_URL.DIRECTORY_SEPARATOR.'less'.DIRECTORY_SEPARATOR.'custom.less'); 
    }

    // load google webfont for body font
    if ($bodyfonttype == '2') : 
        $this->addStyleSheet($bodygooglewebfonturl); 
    endif;
    
    // load google webfont for module headings
    if ($headingsfonttype == '2') : 
        $this->addStyleSheet($headingsgooglewebfonturl); 
    endif;
    
    // load google webfont for article headings
    if ($articlesfonttype == '2') : 
        $this->addStyleSheet($articlesgooglewebfonturl); 
    endif;
    
    // load google webfont for dj-menu
    if ($djmenufonttype == '2') : 
        $this->addStyleSheet($djmenugooglewebfonturl); 
    endif;
    
    // load google webfont for advanced selectors
    if ($advancedfonttype == '2') : 
        $this->addStyleSheet($advancedgooglewebfonturl);
    endif;
    
    // load bootstrap scripts
    JHtml::_('bootstrap.framework');
    
    // load template scripts
    if ($direction == 'rtl') { 
        $this->addScript(JMF_TPL_URL.'/'.'js'.'/'.'styleswitcher_rtl.js');
    } else { 
        $this->addScript(JMF_TPL_URL.'/'.'js'.'/'.'styleswitcher.js');
    }
    $this->addScript(JMF_TPL_URL.'/'.'js'.'/'.'scripts.js');
    
    // cache custom css
    if ($url = $this->cacheStyleSheet('custom_css.php')) {
        $this->document->addStyleSheet($url);
    }
    ?>   

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
    <script src="<?php echo JMF_TPL_URL ?>/js/respond.src.js" type="text/javascript"></script>
    <link href="<?php echo JMF_TPL_URL ?>/css/ie8.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!--[if IE 9]>
    <link href="<?php echo JMF_TPL_URL ?>/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    
    <!-- template path for styleswitcher script -->
    <script type="text/javascript">
        $template_path = '<?php echo JMF_TPL_URL ?>';
    </script>
    
    <?php
        
    // load favicon
    if ($faviconimg) { ?>
        <link href="<?php echo JURI::base().$faviconimg; ?>" rel="Shortcut Icon" />
    <?php } else { ?>
        <link href="<?php echo JMF_TPL_URL ?>/images/favicon.ico" rel="Shortcut Icon" />
    <?php } ?>

    <?php 
    
    // load google webmaster metatag
    if ($googlewebmaster == '1' && $googlewebmastermeta != '') : ?>
        <meta name="google-site-verification" content="<?php echo $googlewebmastermeta; ?>" />
    <?php endif; ?>
    
    <?php

    // load google analytics code
    if (($googleanalytics != '0') and ($googleanalyticscode)) { ?>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '<?php echo $googleanalyticscode; ?>']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
    <?php } ?>
</head>