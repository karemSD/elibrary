<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show all books

        return view('book.index', [
            'books' => book::latest()->filter(request(['search']))->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }



        $authors = Author::all();
        $categorys = Category::all();
        $publishers = Publisher::all();
        return view('book.create', [
            'authors' => $authors,
            'categorys' => $categorys,
            'publishers' => $publishers,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }
        $image = $request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('books', $image, 'Images');
        $author = Author::firstWhere('name', $request->author);
        $category = Category::firstWhere('name', $request->category);
        $publisher = Publisher::firstWhere('name', $request->publisher);



        $request->validate([
            'title' => 'required|unique:books'
        ]);

        book::create([
            'title' => $request->title,
            'category_id' => $category->id,
            'publisher_id' => $publisher->id,
            'author_id' => $author->id,
            'price' => $request->price,
            'pathImage' => $path,
            'description' => $request->description,
            'publish_year' => $request->publish_year
        ]);
        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {


        return view('book.show', [
            'listing' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {

        $authors = Author::all();
        $categorys = Category::all();
        $publishers = Publisher::all();

        return view('book.edit', [
            'book' => $book,
            'authors' => $authors,
            'categorys' => $categorys,
            'publishers' => $publishers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {

        $author = Author::firstWhere('name', $request->author);
        $category = Category::firstWhere('name', $request->category);
        $publisher = Publisher::firstWhere('name', $request->publisher);
        $book->update([
            'title' => $request->title,
            'category_id' => $category->id,
            'publisher_id' => $publisher->id,
            'author_id' => $author->id,
            'price' => $request->price,
            'description' => $request->description,
            'publish_year' => $request->publish_year
        ]);
        if ($request->hasFile('picture')) {
            $image = $request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('books', $image, 'Images');
            $book->update([
                'pathImage' => $path,
            ]);
        }
        return redirect()->route('admin.dashboard')->with('message', 'book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        book::find($id)->delete();
        return redirect()->route('admin.dashboard')->with('message', 'book deleted successfully');
    }
}
