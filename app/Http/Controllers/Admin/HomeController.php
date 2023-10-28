<?php

namespace App\Http\Controllers\Admin;

use App\Models\book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

    return view('admin.dashboard',[
        'books'=> book::latest()->filter(request(['search']))->get()
    ]);
 }

}
