<?php

namespace App\Http\Controllers;

use App\Imports\CategoryImport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function import(): \Illuminate\Http\JsonResponse
    {
        Excel::import(new CategoryImport(), 'sterling/categories.xlsx');
        Excel::import(new ProductImport(), 'sterling/products.xlsx');

        return response()->json("Importado correctamente", 200);
    }
}
