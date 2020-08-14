<?php
namespace AdminModules\Custom\NovumJenv\Hechtenis\Hechtenis\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumJenv\Hechtenis\CrudHechtenisManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumJenv\Hechtenis\Hechtenis instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudHechtenisManager();
	}


	public function getPageTitle(): string
	{
		return "Hechtenis";
	}
}
