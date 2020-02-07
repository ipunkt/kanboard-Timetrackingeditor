<?php

namespace Kanboard\Plugin\Timetrackingeditor;

class DateParser extends \Kanboard\Core\DateParser
{
	public function convert(array $values, array $fields, $keep_time = false)
	{
		return parent::convert($this->prepareTimeFormatValues($values), $fields, $keep_time);
	}

	/**
	 * prepares all time format fields
	 *
	 * @param array $values
	 * @return array
	 */
	protected function prepareTimeFormatValues(array $values): array
	{
		$fields = ['time_spent'];

		foreach ($fields as $field) {
			if (array_key_exists($field, $values)) {
				$values[$field] = $this->transformTimeDurationValue($values[$field]);
			}
		}

		return $values;
	}

	/**
	 * transforms the concrete value
	 *
	 * @param mixed $value
	 * @return mixed
	 */
	private function transformTimeDurationValue($value)
	{
		//  convert HH:mm
		if (substr_count($value, ':') === 1) {
			$hm = explode(':', $value, 2);
			$value = $hm[0] + $hm[1]/60;
		}
		//  convert HH:mm:ss
		if (substr_count($value, ':') === 2) {
			$hms = explode(':', $value, 3);
			$value = $hms[0] + $hms[1]/60 + $hms[2]/3600;
		}

		//  convert "," to "."
		if (substr_count($value, ',') === 1) {
			$value = str_replace(',', '.', $value);
		}

		return $value;
	}
}
