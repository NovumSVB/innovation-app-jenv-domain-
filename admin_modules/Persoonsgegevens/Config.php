<?php
namespace AdminModules\Custom\NovumJenv\Persoonsgegevens;

use AdminModules\ModuleConfig;
use Core\Translate;

final class Config extends ModuleConfig
{
	public function isEnabelable(): bool
	{
		return true;
	}


	public function getModuleTitle(): string
	{
		return Translate::fromCode("Persoonsgegevens");
	}
}
