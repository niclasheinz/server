<?php

declare(strict_types=1);

/**
 * @copyright 2024 Sebastian Krupinski <krupinski01@gmail.com>
 *
 * @author Sebastian Krupinski <krupinski01@gmail.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\DAV\CalDAV;

class EventReaderRDate extends \Sabre\VObject\Recur\RDateIterator {

	public function concludes(): \DateTime | null {
		return $this->concludesOn();
	}

	public function concludesAfter(): int | null {
		return !empty($this->dates) ? count($this->dates) : null;
	}

	public function concludesOn(): \DateTime | null {
		if (count($this->dates) > 0) {
			return new \DateTime(
                $this->dates[array_key_last($this->dates)],
                $this->startDate->getTimezone()
            );
		} else {
			return null;
		}
	}

}
