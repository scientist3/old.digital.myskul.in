<?php
defined('BASEPATH') or exit('No direct script access allowed');

function convert_object_to_array($data)
{

	if (is_object($data)) {
		$data = get_object_vars($data);
	}

	if (is_array($data)) {
		return array_map(__FUNCTION__, $data);
	} else {
		return $data;
	}
}
