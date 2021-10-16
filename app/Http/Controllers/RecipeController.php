<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Recipe;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Recipe::all();
    }
    
}
