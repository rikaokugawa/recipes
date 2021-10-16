<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
   protected $guarded = array('id');
    //
    public static $rules = array(
        'name' => 'required',
        'sub_material_id' => 'required',
    );
        // 以下を追記
    // MenunModelに関連付けを行う
    public function seasonings() {
        return $this->hasMany('App\Recipe');
    }
    
    public function materials() {
        return $this->hasMany('App\Material');
    }
    
    public function menu() {
        return $this->belongsTo('App\Menu');
    } 
}

?>

    