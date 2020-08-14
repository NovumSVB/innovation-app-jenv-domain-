<?php
namespace Crud\Custom\NovumJenv\VoorlopigeHechtenis\Field\Base;

use Crud\Generic\Field\GenericDate;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'eind_datum' crud field from the 'voorlopige_hechtenis' table.
 * This class is auto generated and should not be modified.
 */
abstract class EindDatum extends GenericDate implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'eind_datum';

	protected $sFieldLabel = 'Eind datum';

	protected $sIcon = 'calendar';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getEindDatum';

	protected $sFqModelClassname = '\Model\Custom\NovumJenv\VoorlopigeHechtenis';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['eind_datum']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Eind datum" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
