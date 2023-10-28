<?php

namespace App\Http\Controllers;

use App\Models\Author;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $authors = author::all();
        return view('author.index', [
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = $request->validate([
            'name' => 'required|unique:authors'
        ]);
        Author::create($author);
        return redirect('authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $books=$author->books;

        return view('author.show',[
            'books'=>$books,
            'author'=>$author->name

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {

        return view('author.edit', [
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $auther = author::find($id);
        $auther->update($request->all());
        return  redirect('authors')->with('message', 'author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        /* Make sure logged in user is owner
          if($author->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
*/
        $author->delete();
        return redirect('authors')->with('message', 'author deleted successfully');


        /*
        author::findorfail($id)->truncate();
        return Author::all();
     return redirect()->route('authors');
*/
    }
}
