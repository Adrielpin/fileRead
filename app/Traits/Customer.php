<?php

namespace App\Traits;

class Customer {
	private $string;
	private $cnpj;
	private $name;
	private $businessArea;

	public function __construct($string){
		$this->string = $string;
	}

	public function parse()
	{
		$strNoSpaces = str_replace(" ", "", $this->string);
		$array = explode(',', $strNoSpaces);
		
		$this->cnpj = $array[1];
		$this->name = $array[2];
		$this->businessArea = $array[3];
	}

	public function getCnpj(){
		return $this->cnpj;
	}
}
