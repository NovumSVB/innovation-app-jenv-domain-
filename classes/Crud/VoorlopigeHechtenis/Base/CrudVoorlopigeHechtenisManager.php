<?php
namespace Crud\Custom\NovumJenv\VoorlopigeHechtenis\Base;

use Crud\Custom\NovumJenv;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumJenv\Map\VoorlopigeHechtenisTableMap;
use Model\Custom\NovumJenv\VoorlopigeHechtenis;
use Model\Custom\NovumJenv\VoorlopigeHechtenisQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify VoorlopigeHechtenis instead if you need to override or add functionality.
 */
abstract class CrudVoorlopigeHechtenisManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumJenv\CrudTrait;
	use NovumJenv\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return VoorlopigeHechtenisQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumJenv\Map\VoorlopigeHechtenisTableMap();
	}


	public function getShortDescription(): string
	{
		return "In dit endpoint staat geregistreerd welke personen momenteel in voorlopige hechtenis zitten.";
	}


	public function getEntityTitle(): string
	{
		return "VoorlopigeHechtenis";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumjenv/hechtenis/voorlopige_hechtenis/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumjenv/hechtenis/voorlopige_hechtenis/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Voorlopige hechtenis toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Voorlopige hechtenis aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['PersoonId', 'InVoorlopigeHechtenis', 'EindDatum', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['PersoonId', 'InVoorlopigeHechtenis', 'EindDatum'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return VoorlopigeHechtenis
	 */
	public function getModel(array $aData = null): VoorlopigeHechtenis
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oVoorlopigeHechtenisQuery = VoorlopigeHechtenisQuery::create();
		     $oVoorlopigeHechtenis = $oVoorlopigeHechtenisQuery->findOneById($aData['id']);
		     if (!$oVoorlopigeHechtenis instanceof VoorlopigeHechtenis) {
		         throw new LogicException("VoorlopigeHechtenis should be an instance of VoorlopigeHechtenis but got something else." . __METHOD__);
		     }
		     $oVoorlopigeHechtenis = $this->fillVo($aData, $oVoorlopigeHechtenis);
		} else {
		     $oVoorlopigeHechtenis = new VoorlopigeHechtenis();
		     if (!empty($aData)) {
		         $oVoorlopigeHechtenis = $this->fillVo($aData, $oVoorlopigeHechtenis);
		     }
		}
		return $oVoorlopigeHechtenis;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return VoorlopigeHechtenis
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): VoorlopigeHechtenis
	{
		$oVoorlopigeHechtenis = $this->getModel($aData);


		 if(!empty($oVoorlopigeHechtenis))
		 {
		     $oVoorlopigeHechtenis = $this->fillVo($aData, $oVoorlopigeHechtenis);
		     $oVoorlopigeHechtenis->save();
		 }
		return $oVoorlopigeHechtenis;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param VoorlopigeHechtenis $oModel
	 * @return VoorlopigeHechtenis
	 */
	protected function fillVo(array $aData, VoorlopigeHechtenis $oModel): VoorlopigeHechtenis
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['in_voorlopige_hechtenis']) ? $oModel->setInVoorlopigeHechtenis($aData['in_voorlopige_hechtenis']) : null;
		isset($aData['eind_datum']) ? $oModel->setEindDatum($aData['eind_datum']) : null;
		return $oModel;
	}
}
