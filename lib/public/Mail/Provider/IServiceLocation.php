<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2024 Sebastian Krupinski <krupinski01@gmail.com>
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
 * Mail Service Location Interface
 *
 * This interface is a base requirement of methods and functionality used to construct a mail service location.
 *
 * @since 30.0.0
 *
 */
interface IServiceLocation {

	/**
	 * A string identifiing this location type
	 *
	 * @since 30.0.0
	 *
	 * @return string
	 */
	public function type(): string;

}
