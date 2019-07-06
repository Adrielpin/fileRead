<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\Salesman;
use App\Traits\Customer;
use App\Traits\Sale;

use App\Http\Requests\UploadRequest;
use File;
use Storage;

class FileController extends Controller
{
    
    public function home()
    {
        return view('home');
    }
    
    
    public function upload(Request $request)
    {

        $sales = [];
        $salesman = [];
        $customer = [];

        $bestSale 	= null;
        $worstSalesman 	= null;
        $sumSalary	= 0;

        //get file and basic information
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileName = pathinfo($fileName, PATHINFO_FILENAME);
        
        $contents = file($file);
    
        foreach($contents as $row)
        {
            $row = trim(str_replace(' ', '', $row));
            $values = explode(',', $row);
            
            switch($values[0]) 
            {
                case "001":
                
                $objSalesman = new Salesman($row);
                $objSalesman->parse();

				if (!isset($salesman[$objSalesman->getName()])){
					$salesman[$objSalesman->getName()] = $objSalesman;
					$sumSalary += $objSalesman->getSalary();
                }
                
                break;
                
                case "002":
                $objCustomer = new Customer($row);
                $objCustomer->parse();

				if (!isset($customer[$objCustomer->getCnpj()])){
					$customer[$objCustomer->getCnpj()] = $objCustomer;
				}
                break;
                
                case "003":
                $objSale = new Sale($row);
                $objSale->parse();

				$salesman[$objSale->getSalesman()]->sumSale($objSale->getTotal());
				if (!$bestSale){ // primeira venda
					$bestSale = $objSale;
				}else{ // !primeira venda
					if ($bestSale->getTotal() < $objSale->getTotal()){ //validação de maior valor
						$bestSale = $objSale;
					}
				}
                break;
            }
        }


        $qtdCustomers = count($customer);
        $qtdSalesman = count($salesman);
        $averageSalary = round(($sumSalary / count($salesman)),2);
        $bestSale = $bestSale->getSaleId();
        $worstSalesman = $this->worstSalesman($salesman)->getName();
        
        $header = "[Qtd Customers, Qtd Salesman, Average Salary, Best Sale, Worst seller] \n";
        $result = $header . $qtdCustomers .', '. $qtdSalesman .', '. $averageSalary .', '. $bestSale .', '. $worstSalesman;
        
        $doneFile= base_path('data/out/'. $fileName.'.done.dat');
        
        $file = File::put($doneFile, $result);
                
        return view('home', compact('qtdCustomers','qtdSalesman','averageSalary','bestSale','worstSalesman'));
        
    }
    
    function worstSalesman($salesmanArray){
        $worst = false;
        foreach($salesmanArray as $objSalesman){
            if (!$worst){
                $worst = $objSalesman;		
            }else{
                if ($worst->getTotalSales() > $objSalesman->getTotalSales()){
                    $worst = $objSalesman;
                }
            }
        }
        return $worst;
    }
    
}
