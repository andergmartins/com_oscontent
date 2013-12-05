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

class OSContentControllerCategories extends OSController
{

	function __construct()
	{
		parent::__construct();

		 //Register Extra tasks
		 //$this->registerTask( 'create'  , 	'newOSCategories' );
	}

	/**
	 * display the form
	 * @return void
	 */
	function display($cachable = false, $urlparams = array())
	{
		JRequest::setVar( 'view', 'categories' );
		parent::display($cachable, $urlparams);
	}

	/**
	 * save categories
	 */
	function save()
	{
		$model = $this->getModel('categories');
		if(!$model->saveOSCategories()) {
			$msg = JText::_( "ERROR_CATEGORIES" );
		} else {
			$msg = JText::_( "SUCCESS_CATEGORIES" );
		}

		$this->setRedirect( "index.php?option=com_oscontent&view=categories",$msg );
	}

}
?>
