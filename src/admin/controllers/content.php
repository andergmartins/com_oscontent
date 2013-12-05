<?php
/*
* OSContent for Joomla 1.7.X
* @version 1.5
* @Date 04.10.2009
* @copyright (C) 2007-2009 Johann Eriksen
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Official website: http://www.baticore.com
*/

defined('_JEXEC') or die();

require_once JPATH_ADMINISTRATOR . '/components/com_oscontent/controller.php';

class OSContentControllerContent extends OSController
{

	function __construct()
	{
		parent::__construct();

		 //Register Extra tasks
		// $this->registerTask( 'create'  , 	'newOSContent' );
	}

	/**
	 * display the form
	 * @return void
	 */
	function display($cachable = false, $urlparams = array())
	{
		JRequest::setVar( 'view', 'content' );
		parent::display($cachable, $urlparams);
	}

	/**
	 * save categories
	 */
	function save()
	{
		$model = $this->getModel('content');
		if(!$model->saveOSContent()) {
			$msg = JText::_("ERROR_CONTENT" );
			JRequest::setVar( 'view', 'content' );
			parent::display();
			return;
		} else {
			$msg = JText::_( "SUCCESS_CONTENT" );
		}

		$this->setRedirect( "index.php?option=com_oscontent&view=content",$msg );
	}

}
?>
