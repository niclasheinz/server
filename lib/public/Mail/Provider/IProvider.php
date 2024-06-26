<?php
declare(strict_types=1);

/**
* @copyright Copyright (c) 2023 Sebastian Krupinski <krupinski01@gmail.com>
*
* @author Sebastian Krupinski <krupinski01@gmail.com>
*
* @license AGPL-3.0-or-later
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Affero General Public License as
* published by the Free Software Foundation, either version 3 of the
* License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU Affero General Public License for more details.
*
* You should have received a copy of the GNU Affero General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*/
namespace OCP\Mail\Provider;

/**
 * @since 30.0.0
 */
interface IProvider {

	/**
	 * An arbitrary unique text string identifying this provider
	 * 
	 * @since 30.0.0
	 */
	public function id(): string;

	/**
	 * The localized human frendly name of this provider
	 * 
	 * @since 30.0.0
	 */
	public function label(): string;

	/**
	 * Determain if any services are configured for a specific user
	 * 
	 * @since 30.0.0
	 */
	public function hasServices(string $uid): bool;

	/**
	 * retrieve collection of services for a specific user
	 * 
	 * @since 30.0.0
	 */
	public function listServices(string $uid): array;

	/**
	 * create a service configuration for a specific user
	 * 
	 * @since 30.0.0
	 */
	public function createService(string $uid, IService $service): string;

	/**
	 * modify a service configuration for a specific user
	 * 
	 * @since 30.0.0
	 */
	public function modifyService(string $uid, IService $service): string;

	/**
	 * delete a service configuration for a specific user
	 * 
	 * @since 30.0.0
	 */
	public function deleteService(string $uid, IService $service): bool;

}
