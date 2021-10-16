<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\RecipeCategory;
use App\Difficulty;
use App\Feeling;
use App\Howto;
use App\Material;
use App\Menu;
use App\Nutrient;
use App\NutrientMaterial;
use App\Taste;


class TopPageController extends Controller
{
  public function index(Request $request){
    $keyword = $request->keyword;
    $keywords = array();
    $recipes = array();
    $recipe_categories = array();
    $difficulties = array();
    $feelings = array();
    $how_tos = array();
    $materials = array();
    $menus = array();
    $nutrients = array();
    $nutrient_materials = array();
    $tastes = array();
    return view('toppage', compact('keywords','keyword','recipes','recipe_categories', 'difficulties', 'feelings', 'how_tos', 'materials', 'menus', 'nutrients', 'nutrient_materials','tastes'));
  }
	
}
