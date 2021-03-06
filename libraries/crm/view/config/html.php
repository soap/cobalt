<?php
/*------------------------------------------------------------------------
# Cobalt
# ------------------------------------------------------------------------
# @author Cobalt
# @copyright Copyright (C) 2012 cobaltcrm.org All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website: http://www.cobaltcrm.org
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

class CobaltViewConfigHtml extends JViewHtml 
{

    function render($tpl = null)
    {
        //authenticate the current user to make sure they are an admin
        CobaltHelperUsers::authenticateAdmin();
        
        //display toolbar
        CRMToolbarHelper::cancel('cancel');
        CRMToolbarHelper::save('save');

        //document
        $document = JFactory::getDocument();
        $document->addScript(JURI::base()."/libraries/crm/media/js/cobalt-admin.js");

        /* Menu Links **/
        $menu = CobaltHelperMenu::getMenuModules();
        $this->menu = $menu;

        //get model
        $model = new CobaltModelConfig();
        $layout = $this->getLayout();
        $model->set("_layout",$layout);

        //get config
        $config = $model->getConfig();

        //generate timezones
        $list = timezone_identifiers_list();
        $timezones =  array();
        foreach( $list as $zone ){
           $timezones[$zone] = $zone;
        }

        //view references
        $this->imap_found = function_exists('imap_open') ? TRUE : FALSE ;
        $this->config = $config;
        $this->timezones = $timezones;
        $this->time_formats = CobaltHelperDate::getTimeFormats();
        $this->languages = CobaltHelperConfig::getLanguages();
        $this->language = CobaltHelperConfig::getLanguage();
        
        //display
        return parent::render();
    }
}