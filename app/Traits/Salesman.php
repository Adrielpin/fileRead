<?php

namespace App\Traits;

class Salesman { 

	private $string;
	private $cpf;
	private $name;
	private $salary;
	private $totalSales = 0;
	
	public function __construct($string){
		$this->string = $string;
	}

	public function parse()
	{
		$stringNoSpaces = str_replace(" ", "", $this->string);
		$array = explode(',', $stringNoSpaces);
		
		$this->cpf = $array[1];
		$this->name = $array[2];
		$this->salary = (float)$array[3];
	}
	
	public function getName(){ 
		return $this->name;
	}

	public function getSalary(){
		return $this->salary;
	}

	public function sumSale($val){
		$this->totalSales += $val;
	}

	public function getTotalSales(){
		return $this->totalSales;
	}
}
