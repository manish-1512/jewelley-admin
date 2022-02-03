<?php

namespace App\Imports;

use App\Models\ProductModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ProductImport implements ToModel ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   

               


        return new ProductModel([

            'title' => $row['title'],
            'description' => $row['description'],
            'price' => $row['price'],
            'weight' => $row['weight'],
            'discount' => $row['discount'],
            'product_category' => $row['product_category'],
            'product_type' => $row['product_type'],
            'product_matrial' => $row['product_matrial'],
            'is_active' => $row['is_active'],
            'is_new' => $row['is_new'],
            'is_popular' => $row['is_popular'],
            'is_best_seller' => $row['is_best_seller'],
            'created_at' => time(),
            'updated_at' => time(),

        ]);
    }


}
