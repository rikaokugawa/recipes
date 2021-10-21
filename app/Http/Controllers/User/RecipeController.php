<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MaterialCategory;
use App\Material;
use App\RecipeCategory;
use App\Menu;

use App\Recipe;

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
  
    public function index(Request $request)
  {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          // 検索されたら検索結果を取得する
          $posts = Recipe::where('name', $cond_name)->get();
      } else {
          // それ以外はすべてのニュースを取得する

          $posts = Recipe::all();
      }
      return view('user.recipe.index', ['posts' => $posts, 'cond_name' => $cond_name]);
  }
  
    public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $recipe = Recipe::find($request->id);
      if (empty($menu)) {
        abort(404);    
      }
      return view('user.recipe.edit', ['recipe_form' => $recipe]);
  }


  public function update(Request $request)
  { 
      // Validationをかける
      $this->validate($request, Recipe::$rules);
      // News Modelからデータを取得する
      $menu = Recipe::find($request->id);
      // 送信されてきたフォームデータを格納する
      $recipe_form = $request->all();
      if ($request->remove == 'true') {
          $recipe_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $recipe_form['image_path'] = basename($path);
      } else {
          $recipe_form['image_path'] = $recipe->image_path;
      }

      unset($recipe_form['image']);
      unset($recipe_form['remove']);
      unset($recipe_form['_token']);
      // 該当するデータを上書きして保存する
      $recipe->fill($recipe_form)->save();
      return redirect('user/recipe');
  }
  
    // 以下を追記　　
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $menu = Recipe::find($request->id);
      // 削除する
      $recipe->delete();
      return redirect('User/recipe/');
  }

}
