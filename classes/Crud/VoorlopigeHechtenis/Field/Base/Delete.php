<?php 
namespace Crud\Custom\NovumJenv\VoorlopigeHechtenis\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumJenv\VoorlopigeHechtenis;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof VoorlopigeHechtenis)
		{
		     return "/custom/novumjenv/hechtenis/voorlopige_hechtenis/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof VoorlopigeHechtenis)
		{
		     return "/custom/novumjenv/voorlopige_hechtenis?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
