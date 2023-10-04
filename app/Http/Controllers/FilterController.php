<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class FilterController extends Controller
{
    public function filter()
    {
        if (isset($_GET['tag'])) {
            $tagCollection = Tag::with(['todos'])->find($_GET['tag']);
        }
        //dd($tagCollection);
        $allTags = Tag::all();
        return view('todo.filter', compact('allTags', 'tagCollection'));
    }
}
