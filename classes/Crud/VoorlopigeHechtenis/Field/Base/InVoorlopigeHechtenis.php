<?php
namespace Crud\Custom\NovumJenv\VoorlopigeHechtenis\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'in_voorlopige_hechtenis' crud field from the 'voorlopige_hechtenis' table.
 * This class is auto generated and should not be modified.
 */
abstract class InVoorlopigeHechtenis extends GenericBoolean implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'in_voorlopige_hechtenis';

	protected $sFieldLabel = 'In voorlopige hechtenis';

	protected $sIcon = 'tag';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getInVoorlopigeHechtenis';

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


		if(!isset($aPostedData['in_voorlopige_hechtenis']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "In voorlopige hechtenis" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
