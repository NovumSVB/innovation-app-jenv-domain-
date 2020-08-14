<?php 
namespace Crud\Custom\NovumJenv\Persoon\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumJenv\Persoon;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Persoon)
		{
		     return "/custom/novumjenv/persoonsgegevens/persoon/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Persoon)
		{
		     return "/custom/novumjenv/persoon?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
