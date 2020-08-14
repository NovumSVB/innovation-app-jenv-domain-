<?php
namespace Crud\Custom\NovumJenv\Hechtenis\Base;

use Crud\Custom\NovumJenv;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumJenv\Hechtenis;
use Model\Custom\NovumJenv\HechtenisQuery;
use Model\Custom\NovumJenv\Map\HechtenisTableMap;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Hechtenis instead if you need to override or add functionality.
 */
abstract class CrudHechtenisManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumJenv\CrudTrait;
	use NovumJenv\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return HechtenisQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumJenv\Map\HechtenisTableMap();
	}


	public function getShortDescription(): string
	{
		return "In dit endpoint staat geregistreerd welke personen momenteel in hechtenis zitten.";
	}


	public function getEntityTitle(): string
	{
		return "Hechtenis";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumjenv/hechtenis/hechtenis/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumjenv/hechtenis/hechtenis/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Hechtenis toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Hechtenis aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['PersoonId', 'InHechtenis', 'EindDatum', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['PersoonId', 'InHechtenis', 'EindDatum'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Hechtenis
	 */
	public function getModel(array $aData = null): Hechtenis
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oHechtenisQuery = HechtenisQuery::create();
		     $oHechtenis = $oHechtenisQuery->findOneById($aData['id']);
		     if (!$oHechtenis instanceof Hechtenis) {
		         throw new LogicException("Hechtenis should be an instance of Hechtenis but got something else." . __METHOD__);
		     }
		     $oHechtenis = $this->fillVo($aData, $oHechtenis);
		} else {
		     $oHechtenis = new Hechtenis();
		     if (!empty($aData)) {
		         $oHechtenis = $this->fillVo($aData, $oHechtenis);
		     }
		}
		return $oHechtenis;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Hechtenis
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Hechtenis
	{
		$oHechtenis = $this->getModel($aData);


		 if(!empty($oHechtenis))
		 {
		     $oHechtenis = $this->fillVo($aData, $oHechtenis);
		     $oHechtenis->save();
		 }
		return $oHechtenis;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Hechtenis $oModel
	 * @return Hechtenis
	 */
	protected function fillVo(array $aData, Hechtenis $oModel): Hechtenis
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['in_hechtenis']) ? $oModel->setInHechtenis($aData['in_hechtenis']) : null;
		isset($aData['eind_datum']) ? $oModel->setEindDatum($aData['eind_datum']) : null;
		return $oModel;
	}
}
