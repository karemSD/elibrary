<?php

namespace App\Models;


use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author()
    {

        return $this->belongsTo(Author::class);
    }
    public function publisher()
    {

        return $this->belongsTo(Publisher::class);
    }
    public function category()
    {

        return $this->belongsTo(Category::class);
    }
    public function copybooks()
    {

        return $this->hasMany(CopyBook::class);
    }

    public function carts()
    {

        return $this->hasMany(Cart::class);
    }



    public function scopeFilter($query, array $filters)
    {



          if($filters['tag'] ?? false) {
            $author = Author::where('name', 'like', '%' . request('tag') . '%')->first();
            if ($author == null) {
                $author = '';
            } else $author = $author->id;
            $category = Category::where('name', 'like', '%' . request('tag') . '%')->first();
            if ($category == null) {
                $category = '';
            } else $category = $category->id;
            $publisher = Publisher::where('name', 'like', '%' . request('tag') . '%')->first();
            if ($publisher == null) {
                $publisher = '';
            } else $publisher = $publisher->id;
            $query->Where('author_id', $author)
            ->orWhere('category_id', $category)
            ->orWhere('publisher_id', $publisher);
            }


        if ($filters['search2'] ?? false) {
            $author = Author::where('name', 'like', '%' . request('search') . '%')->first();
            if ($author == null) {
                $author = '';
            } else $author = $author->id;
            $category = Category::where('name', 'like', '%' . request('search') . '%')->first();
            if ($category == null) {
                $category = '';
            } else $category = $category->id;
            $publisher = Publisher::where('name', 'like', '%' . request('search') . '%')->first();
            if ($publisher == null) {
                $publisher = '';
            } else $publisher = $publisher->id;
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('author_id', $author)
                ->orWhere('category_id', $category)
                ->orWhere('publisher_id', $publisher)
                ->orWhere('price', 'like', '%' . request('search') . '%')
                ->orWhere('publish_year', 'like', '%' . request('search') . '%');
        }

        if ($filters['search'] ?? false) {
            $author = Author::where('name', 'like', '%' . request('search') . '%')->first();
            if ($author == null) {
                $author = '';
            } else $author = $author->id;
            $category = Category::where('name', 'like', '%' . request('search') . '%')->first();
            if ($category == null) {
                $category = '';
            } else $category = $category->id;
            $publisher = Publisher::where('name', 'like', '%' . request('search') . '%')->first();
            if ($publisher == null) {
                $publisher = '';
            } else $publisher = $publisher->id;
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('author_id', $author)
                ->orWhere('category_id', $category)
                ->orWhere('publisher_id', $publisher)
                ->orWhere('price', 'like', '%' . request('search') . '%')
                ->orWhere('publish_year', 'like', '%' . request('search') . '%');
        }
    }
    // protected function Price() : Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => ucfirst($,
    //     );

    // }
}
