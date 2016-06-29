<?php
namespace Alexspi\Spares\Http\Controllers;


use League\Csv\Reader;
use App\Http\Controllers\Controller;
use Alexspi\Spares\Model\PrsoProduct as Product;
use Alexspi\Spares\Model\PrsoCategory as Category;
use Alexspi\Spares\Http\Controllers\PrsoProductController as PrsoProduct;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class PrsoProductUpdateController extends PrsoProduct
{

//    public function indexUpdate()
//    {
//        return View('admin.update.index');
//    }


    public function createUpdate()
    {
      
        //
    }


    public function storeUpdate(Request $request)
    {
//        dd( $request);
        $update = new Product();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'csv';
            $folderName = '/uploads/update/';
            $fileupdate = str_random(10) . '.' . $extension;
            $destinationPath = public_path() . $folderName;
            $request->file('file')->move($destinationPath, $fileupdate);

            $csv = Reader::createFromPath($destinationPath . '' . $fileupdate);

            $keys = ['category_id', 'position_id', 'artikul', 'number', 'name', 'price', 'ostatok'];
//
            $csv->setDelimiter(';');
            $csv->setOffset(1);
            $results = $csv->fetchAssoc($keys);


            foreach ($results as $row) {
                $number = $row['number'];
                $category_name = $row['category_id'];
                
                $cat_id = Helper::UpdateProductCategori($category_name);

                $row['category_id']=$cat_id;
                


                Product::updateOrCreate(['number' => $number],$row);


            }

//
        }

        return Redirect('admin/spares/product')->with('success','Обновлено успешно');

    }

}
