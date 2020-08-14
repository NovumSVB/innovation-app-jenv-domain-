<?php 
namespace Crud\Custom\NovumJenv\Hechtenis\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumJenv\Hechtenis;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Hechtenis)
		{
		     return "/custom/novumjenv/hechtenis/hechtenis/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Hechtenis)
		{
		     return "/custom/novumjenv/hechtenis?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
