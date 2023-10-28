<?php

namespace App\Http\Controllers\Admin;

use App\Models\book;
use App\Models\User;
use App\Models\CopyBook;
use Illuminate\Http\Request;
use App\Jobs\SendMailUserStuffJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showBooksOfCustomer($userid)
    {
        // DB::table('users')->where('id',$userid)->increment('borrowing_times');
        //رح استخدمها وقت بيكون عندو كتب بالكارت ويكبس دفع بيقوم بيروحو الكتب عالعنووان وبتزيد مرات الاستعارة
//$results = DB::select('select book_id from copy_books where user_id = :id', ['id' => 1]);

$user=User::find($userid);

$results=CopyBook::where('user_id',$userid)->get();
$n[0]=0;$counter=0;
foreach ($results as  $result) {
 $n[$counter]=$result->book_id;
 $counter++;
}
  $books=book::whereIn('id',$n)->get();
 return view('users.showbooks',[
    'books'=>$books,
    'name'=>$user->first_name .' ' . $user->last_name
]);

    }

    public function sendmail(){

        $users=User::all();
          SendMailUserStuffJob::dispatch($users);
          return redirect()->back()->with('message2', 'Emails is sending');

            }



}
