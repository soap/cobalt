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

class CobaltViewProfileHtml extends JViewHtml
{
	function render()
	{
	    //javascript
	    $document =& JFactory::getDocument();
        $document->addScript( JURI::base().'libraries/crm/media/js/profile_manager.js' );
        
        //get user data and pass to view
        $this->user = CobaltHelperUsers::getLoggedInUser();
        $this->user_id = CobaltHelperUsers::getUserId();
        
        //display
		return parent::render();
	}
	
}