<?php

namespace App\Traits;

class Sale {
	private $string;
	private $saleId;
	private $salesman;
	private $total = 0;

	public function __construct($string){
		$this->string = $string;
	}

	public function parse()
	{
		$stringNoSpaces = str_replace(' ', '', $this->string);
		$tmp = explode("[", $stringNoSpaces);
		$tmp2 = explode("]", $tmp[1]);
		$stringItens = $tmp2[0];
		$stringData = $tmp[0].$tmp2[1];
		$stringData = str_replace(",,", ",", $stringData);	
		$array = explode(',', $stringData);

		$this->saleId = $array[1];
		$this->salesman = $array[2];
		$strItens = $stringItens;
		$arrItens = explode (",", $strItens);
		foreach($arrItens as $strItem){
			$arrItem = explode("-", $strItem);
			$this->total += ((float)$arrItem[1]*(float)$arrItem[2]);
		}
	}

	public function getTotal(){
		return $this->total;
	}

	public function getSalesman(){
		return $this->salesman;
	}

	public function getSaleId(){
		return $this->saleId;
	}
}
