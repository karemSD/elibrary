<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Cart;
use App\Models\User;
use App\Models\CopyBook;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('cart.index',[
            'books'=>book::all()->sortBy('price')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addtocart($idbook,$iduser){

          Cart::create([
            'user_id'=>$iduser,
            'book_id'=>$idbook,
        ]);
        return redirect()->route('mycart',['id'=>$iduser])->with('message2', 'added to cart successfully');
       // return redirect()->back()->with('message', 'added to cart successfully');

    }

    public function mycart($userid){
        $user=User::find($userid);
$results=$user->carts;
$n[0]=0;$counter=0;
foreach ($results as  $result) {
 $books[$counter]=$result->book;
 $counter++;
}

//   $books=book::whereIn('id',$n)->get();
   return view('cart.index',[
    'carts'=>$results
]);

    }
    public function store()
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->with('message', 'deleted from your cart successfully');
    }
}
