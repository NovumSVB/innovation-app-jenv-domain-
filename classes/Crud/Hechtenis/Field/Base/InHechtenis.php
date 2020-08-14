<?php
namespace Crud\Custom\NovumJenv\Hechtenis\Field\Base;

use Crud\Generic\Field\GenericBoolean;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'in_hechtenis' crud field from the 'hechtenis' table.
 * This class is auto generated and should not be modified.
 */
abstract class InHechtenis extends GenericBoolean implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'in_hechtenis';

	protected $sFieldLabel = 'In hechtenis';

	protected $sIcon = 'tag';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getInHechtenis';

	protected $sFqModelClassname = '\Model\Custom\NovumJenv\Hechtenis';


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


		if(!isset($aPostedData['in_hechtenis']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "In hechtenis" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
