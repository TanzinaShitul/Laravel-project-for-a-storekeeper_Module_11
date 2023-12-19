<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
//    function home()
//    {
//        return view('layouts.app');
//    }
    public function display()
    {
        $products=  DB::table('products')
            ->get();

        return view("pages.home")->with('products',$products);


    }
    function addProduct()
    {
        return view('pages.addProduct');
    }
    function store(Request $request)
    {
//      validate the form data
        $request->validate([
            'product_name' => 'required|string',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer',
        ]);

//        insert form data
        DB::table('products')->insert(
            [
                'product_name'=> $request->input('product_name'),
                'price'=> $request->input('product_price'),
                'quantity'=> $request->input('product_quantity')
            ]
        );

        return redirect()->route('home');
    }

    function update($id)
    {
        $products=  DB::table('products')
            ->find($id);
        return view('pages.update')->with('product',$products);
    }
    function updateProduct(Request $request, $id)

    {
    // Validate the form data
        $request->validate([
        'product_name' => 'required|string',
        'product_price' => 'required|numeric',
        'product_quantity' => 'required|integer',
        ]);

    // Update the existing product in the database
        DB::table('products')
        ->where('id', $id)
        ->update([
        'product_name' => $request->input('product_name'),
        'price' => $request->input('product_price'),
        'Quantity' => $request->input('product_quantity'),
        ]);

    // Redirect the user to the home page or a confirmation page
   return redirect()->route('home');
    }

    function  delete($id)
    {

        DB::table('products')->where('id','=',$id)->delete();
        return redirect()->route('home');
    }

    function sell($id)
    {
     $product=   DB::table('products')->find($id);

        return view('pages.sellProduct')->with('product',$product);
    }
    function sellProduct(Request $request,$id)
    {
        //validate form data
//        $request->validate([
//        'name' => 'required|string',
//        'price' => 'required|numeric',
//        'quantity' => 'required|integer',
//        ]);
//
//   insert or update sold product in Another table
        DB::table('sold_products')
            ->Insert(
                [
                    'product_name'=>$request->input('product_name'),
                    'price'=>$request->input('product_price'),
                    'Quantity'=>$request->input('product_quantity'),


                ]
            );
        DB::table('products')
            ->where('id','=',$id)
            ->decrement('Quantity',$request->input('product_quantity'));

        DB::table('products')
            ->where('Quantity','=',0)
            ->delete();


        return redirect()->route('home');
    }


function viewDashboard()
{
 $today=   DB::table('sold_products')
        ->whereDate('created_at','=',today())
        ->sum(DB::raw('price * Quantity '));

$yesterday= DB::table('sold_products')
    ->whereDate('created_at','=',today()->subDay())
    ->sum(DB::raw('price * Quantity'));

$thisMonth= DB::table('sold_products')
    ->whereMonth('created_at','=',now()->month)
    ->sum(DB::raw('price * Quantity'));

$lastMonth=DB::table('sold_products')
    ->whereMonth('created_at','=',now()->subMonth()->month)
    ->sum(DB::raw('price * Quantity'));

    return view('pages.dashboard',[

        'today'=>$today,
        'yesterday'=>$yesterday,
        'thisMonth'=> $thisMonth,
        'lastMonth'=>$lastMonth


    ]);
}


function salesReportPage()
{
    $products= DB::table('sold_products')
        ->get();
    return view('pages.salesReportPage')->with(['products'=>$products]);
}
}
