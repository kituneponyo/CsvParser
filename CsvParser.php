<?php

class CsvParser
{
	var $data;
	var $l; // length of data;
	var $i = 0; // index

	public function load ($filePath) {
		$this->i = 0;
		$this->data = mb_ereg_replace("\r\n", "\n", mb_convert_encoding(file_get_contents($filePath), 'UTF-8', 'sjis-win'), 'UTF-8');
		$this->l = mb_strlen($this->data, 'UTF-8');
	}

	public function getRows () {
		for ($rows = []; $this->i < $this->l;) { $rows[] = $this->getRow(); }
		return $rows;
	}

	public function getRow () {
		for ($row = []; empty($nl) && $this->i < $this->l; $row[] = $c) { [$c, $nl] = $this->getCell(); }
		return $row;
	}

	public function getCell () {
		$q = $e = 0; // isQuoted, isEscaped
		for ($l = 0; strlen($ch = mb_substr($this->data, $this->i + $l, 1, 'UTF-8')) != 0; $l++) {
			$ch == '"' && ($q ? $e = !$e : $q = 1); // check mode
			if ((!$q || $e) && ($ch == ',' || $ch == "\n")) { break; }
		}
		$cell = mb_substr($this->data, $this->i + $q, $l - ($q * 2), 'UTF-8'); // slice cell and strip outer double quote
		$q && ($cell = mb_ereg_replace('""', '"', $cell, 'UTF-8')); // replace escaped double quote
		$this->i += ($l + 1);
		return [$cell, $ch != ',']; // return cell text and new line info
	}
}