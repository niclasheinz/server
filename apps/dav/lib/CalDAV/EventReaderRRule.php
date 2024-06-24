<?php

declare(strict_types=1);

/**
 * SPDX-FileCopyrightText: 2024 Nextcloud GmbH and Nextcloud contributors
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OCA\DAV\CalDAV;

class EventReaderRRule extends \Sabre\VObject\Recur\RRuleIterator {

	public function precision(): string {
		return $this->frequency;
	}

	public function interval(): int {
		return $this->interval;
	}

	public function concludes(): \DateTime | null {
		if (isset($this->until)) {
			return \DateTime::createFromInterface($this->until);
		} elseif ($this->count > 0) {
			// temporarly store current reccurance date and counter
			$currentReccuranceDate = $this->currentDate;
			$currentCounter = $this->counter;
			// iterate over occurances until last one (subtract 2 from count for start and end occurance)
			while ($this->counter <= ($this->count - 2)) {
				$this->next();
			}
			// temporarly store last reccurance date
			$lastReccuranceDate = $this->currentDate;
			// restore current reccurance date and counter
			$this->currentDate = $currentReccuranceDate;
			$this->counter = $currentCounter;
			// return last recurrence date
			return \DateTime::createFromInterface($lastReccuranceDate);
		} else {
			return null;
		}
	}

	public function concludesAfter(): int | null {
		return !empty($this->count) ? $this->count : null;
	}

	public function concludesOn(): \DateTime | null {
		return isset($this->until) ? \DateTime::createFromImmutable($this->until) : null;
	}

	public function daysOfWeek(): array {
		return $this->byDay;
	}

	public function daysOfMonth(): array {
		return $this->byMonthDay;
	}

	public function daysOfYear(): array {
		return $this->byYearDay;
	}

	public function weeksOfYear(): array {
		return $this->byWeekNo;
	}

	public function monthsOfYear(): array {
		return $this->byMonth;
	}

	public function isRelative(): bool {
		return isset($this->bySetPos);
	}

	public function relativePosition(): array {
		return $this->bySetPos;
	}

}
