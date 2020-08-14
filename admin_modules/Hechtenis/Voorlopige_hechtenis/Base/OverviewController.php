<?php
namespace AdminModules\Custom\NovumJenv\Hechtenis\Voorlopige_hechtenis\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumJenv\VoorlopigeHechtenis\CrudVoorlopigeHechtenisManager;
use Crud\FormManager;
use Model\Custom\NovumJenv\VoorlopigeHechtenis;
use Model\Custom\NovumJenv\VoorlopigeHechtenisQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumJenv\Hechtenis\Voorlopige_hechtenis instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Voorlopige hechtenis";
	}


	public function getModule(): string
	{
		return "VoorlopigeHechtenis";
	}


	public function getManager(): FormManager
	{
		return new CrudVoorlopigeHechtenisManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return VoorlopigeHechtenisQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof VoorlopigeHechtenis){
		    LogActivity::register("Hechtenis", "Voorlopige hechtenis verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Voorlopige hechtenis verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Voorlopige hechtenis niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Voorlopige hechtenis item wilt verwijderen?");
		$sTitle = Translate::fromCode("Zeker weten?");
		$sOkUrl = $this->getManager()->getOverviewUrl() . "?id=" . $iId . "&_do=Delete";
		$sNOUrl = $this->getRequestUri();
		$sYes = Translate::fromCode("Ja");
		$sCancel = Translate::fromCode("Annuleren");
		$aButtons  = [
		   new StatusMessageButton($sYes, $sOkUrl, $sYes, "warning"),
		   new StatusMessageButton($sCancel, $sNOUrl, $sCancel, "info"),
		];
		StatusModal::warning($sMessage, $sTitle, $aButtons);
	}
}
