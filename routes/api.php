<?php

use Illuminate\Http\Request;
use App\Product as Product;
use App\Employee as Employee;
use App\Order as Order;
use App\Stock as Stock;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/products', function(){
    return Product::with('Stock')->get();
});
Route::get('/employees', function(){
    return Employee::all();
});
Route::post('/saveOrder', function(Request $request){
    /*
     * 1-Register Order
     * 2-Add to pivot table
     * 3-Take from stock
     * 4-return response
     */

    /* Register new Order  */
    $order = new Order();
    $order->totalPrice = $request->totalPrice;
    $order->employee_id = $request->selectedEmployee;

    $order->save();

    $selectedProducts = $request->selectedProducts; //Array

    $syncArr = [];
    foreach($selectedProducts as $product){
        $syncArr[$product['id']] = ['quantity' => $product['buyed'], 'prePrice' => $product['prePrice']]; 
    }

    $order->products()->sync($syncArr);

    foreach($selectedProducts as $product){
        $productModel = Product::find($product['id']);
        $productModel->stock->quantity -= $product['buyed'];
        $productModel->stock->save();
    }
    
    return 'saved';

});

Route::get('/productsreview', function(){
    $products = Product::with('Stock')->take(4)->get();

    return $products;
});

Route::get('/sellsReport', function(){
    /*
     *  1- Units Sold (enter in orders then products and loop for units)
     *  2- Units in Stock (enter in products and loop for the number in stock)
     *  3- Earned (enter in orders and loop for totalPrice) done
     *  4- Cost (enter in orders then products then loop for cost x units sold)
     *  5- Profit (earned - cost)
     */

     $orders = Order::all();
     
     $cost = 0;
     $sold = 0;
     $earned = 0;
     for($i = 0; $i < count($orders); $i++){
        $order = $orders[$i];
        $earned += $order->totalPrice;

        $products = $order->products;

        for($a = 0; $a < count($products); $a++){
            $sold += $products[$a]->pivot->quantity;
            $cost += $products[$a]->pivot->quantity * $products[$a]->cost;
        }
     }

     $products = Product::with('Stock')->get();

     $inStock = 0;
     for($i = 0; $i < count($products); $i++){
         $inStock += $products[$i]->stock->quantity;
     }

     $profit = $earned - $cost;

     $response = [
         'sold'     => $sold,
         'inStock'  => $inStock,
         'earned'   => $earned,
         'cost'     => $cost,
         'profit'   => $profit
    ];

     return $response;
});
