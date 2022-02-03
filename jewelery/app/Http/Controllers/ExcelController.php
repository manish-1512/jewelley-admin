<?php
     
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;

use App\Exports\ProductExport;
use App\Imports\ProductImport;

use Maatwebsite\Excel\Facades\Excel;
    
class ExcelController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ProductImport,request()->file('file'));
             
        return back()->with('success', 'Product  uploaded');
    }
}