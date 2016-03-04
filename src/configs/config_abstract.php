<?php
/*
 * PoiXson xBuild - Build and deploy tools
 *
 * @copyright 2015-2016
 * @license GPL-3
 * @author lorenzo at poixson.com
 * @link http://poixson.com/
 */
namespace pxn\xBuild\configs;


abstract class config_abstract {

	public $json;



	public function __construct($json=[]) {
		$this->json = $json;
	}



	public function LoadFile($file) {
		if ( empty($file) || !\file_exists($file) ) {
			return FALSE;
		}
		$data = \file_get_contents($file);
		if (empty($data)) {
			echo "Failed to load file: {$file}\n";
			return FALSE;
		}
		$result = self::LoadString($data);
		if (!$result) {
			echo "Failed to decode json file: {$file}\n";
			return FALSE;
		}
		return TRUE;
	}
	public function LoadString($data) {
		if (empty($data)) {
			return FALSE;
		}
		$json = \json_decode($data, TRUE);
		if ($json == NULL) {
			echo "Failed to decode json data\n";
			return FALSE;
		}
		$this->json = $json;
		return TRUE;
	}



}
