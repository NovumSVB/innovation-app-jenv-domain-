<?php
namespace AdminModules\Custom\NovumJenv\Hechtenis\Voorlopige_hechtenis\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumJenv\VoorlopigeHechtenis\CrudVoorlopigeHechtenisManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumJenv\Hechtenis\Voorlopige_hechtenis instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudVoorlopigeHechtenisManager();
	}


	public function getPageTitle(): string
	{
		return "Voorlopige hechtenis";
	}
}
