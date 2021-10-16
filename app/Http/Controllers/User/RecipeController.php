<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MaterialCategory;
use App\Material;
use App\RecipeCategory;
use App\Menu;

class RecipeController extends Controller
{
  public function add()
  {
    $materialCategories = MaterialCategory::all(); 
    $materials = Material::all();
    $recipeCategories = RecipeCategory::all();
    $menus = Menu::all();    

    return view('user.recipe.create', compact('materialCategories', 'materials', 'recipeCategories', 'menus'));
  }
  
  public function create(Request $request)
  {
    return redirect('user/recipe/create');
  }
}
