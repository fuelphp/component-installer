<?php
/**
 * Part of the FuelPHP framework.
 *
 * @package    FuelPHP\Foundation
 * @version    2.0
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 */

namespace FuelPHP\AppInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

/**
 * Installer
 *
 * Custom composer installer to make sure app's end up in ./application
 *
 * @package  FuelPHP\AppInstaller
 *
 * @since  2.0.0
 */
class Installer extends LibraryInstaller
{
	/**
	 * {@inheritDoc}
	 */
	public function getInstallPath(PackageInterface $package)
	{
		// strip the repo name off it if it's present
		$name = $package->getPrettyName();
		strpos($name, '/') !== false and $name = ltrim(strrchr($name, '/'), '/');

		// and install the application in the application folder...
		return 'application/'.$name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType)
	{
		return 'fuelphp-application' === $packageType;
	}
}
