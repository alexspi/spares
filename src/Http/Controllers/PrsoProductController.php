<?php
namespace Alexspi\Spares\Http\Controllers;

use App\Http\Controllers\Controller;
use Alexspi\Spares\Model\PrsoProduct as Product;
use Alexspi\Spares\Model\PrsoCategory as Category;

class PrsoProductController extends Controller
{

    public function show($slug, $categoryid=null)
    {
        if ( $product = Product::where('slug',$slug)->first()) {
            $parentCategores=$product->categories;
            $pathCategory=Category::find($categoryid);
            return view('Spares::product_show', compact('product','parentCategores', 'pathCategory'));
        }
        abort(404);
    }
}
