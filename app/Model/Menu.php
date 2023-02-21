<?php

namespace App\Model;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Route;

class Menu extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes=['aksesmenu'];

    protected $dates=['deleted_at'];
    protected $casts=['detail'=>'array'];
    protected $fillable=['id','nama', 'kode', 'link', 'icon', 'status','urut', 'tampil', 'detail','parent_id'];

    public function aksesmenu()
    {
        return $this->hasMany('App\Model\Aksesmenu');
    }

    public function parent()
    {
        return $this->belongsTo('App\Model\Menu','parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Model\Menu','parent_id','id')->sort();
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function parentRecursive()
    {
        return $this->parent()->with('parentRecursive');
    }
    
    function createMenuTree($item) {
        
        if ($item->parentRecursive) {
            $this->createMenuTree($item->parentRecursive);
            echo '<li class="breadcrumb-item" aria-current="page">' . $item->nama."</li>";
        } else {
            echo '<li class="breadcrumb-item" aria-current="page">' . $item->nama."</li>";
        }
    }

    public function checkAksesmenu($aksesgrup_id)
    {
        $aksesmenu=Aksesmenu::where('menu_id', $this->id)->where('aksesgrup_id', $aksesgrup_id);
        return $aksesmenu->first() ? true : null;
    }

    public function active($kode)
    {
        $current	=	explode(".", Route::currentRouteName());
        if($menus	=	$this->whereKode($current[0])->first()) {
            $response= $kode == $current[0] ? 'active' : $this->getParent($this->id,$menus);
        }
        return $response ?? '';
    }

    private function getParent($id,$menus)
    {
        if ($id == $menus->parent_id) {
            return 'active open';
        }else{
            return $menus->parent_id ? $this->getParent($id,$menus->parent) : '';
        }
    }

    public function generate($menu, $submenu)
    {
        return ['nama'=>$menu->nama, 'url'=>null, 'route'=>null, 'icon'=>'fa '.$menu->icon, 'submenu'=>$submenu];
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama']=ucwords(trim($value));
    }

    public function scopeSort($query)
    {
        $query->orderBy('urut', 'asc');
    }
}
