<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\CopyBook;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CopyBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function createcopy(){



    return    CopyBook::create([
            'book_id'=>2,
            'user_id'=>2,
            'borrow_date'=>(new DateTime(now())),
            'return_date'=>now()->add((new DateInterval("P10D"))),
        ]);
        DB::table('users')->where('id',2)->increment('borrowing_times');
        return'sending book is done';



     }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CopyBook  $copyBook
     * @return \Illuminate\Http\Response
     */
    public function show(CopyBook $copyBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CopyBook  $copyBook
     * @return \Illuminate\Http\Response
     */
    public function edit(CopyBook $copyBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CopyBook  $copyBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CopyBook $copyBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CopyBook  $copyBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(CopyBook $copyBook)
    {
        //
    }
}
