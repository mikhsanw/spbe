<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Halaman extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];
    protected $fillable=[
        'id', 'nama', 'isi', 'jenis', 'parent_id', 'status', 'link'
    ];

    public function file()
    {
        return $this->morphOne(File::class, 'morph');
    }

    public function file_logo()
    {
        return $this->morphOne(File::class, 'morph')->where('name', '=', 'file_logo');
    }

    public function file_pendukung()
    {
        return $this->morphOne(File::class, 'morph')->where('name', '=', 'file_pendukung');
    }
    
    public function parent()
    {
        return $this->belongsTo('App\Model\Halaman', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Model\Halaman','parent_id','id');
    }

    public static function tree() 
    { 
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', null)->get(); 
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
            echo "<li>" . $item->nama."</li>";
        } else {
            echo "<li>" . $item->nama . "</li>";
        }
    }
    function createHeaderTree($item) {
        
        if ($item->parentRecursive) {
            $this->createHeaderTree($item->parentRecursive);
            echo '<a href="'.url('halaman/'.$item->id).'">'.$item->nama."</a> > ";
        } else {
            echo '<a href="'.url('halaman/'.$item->id).'">'.$item->nama."</a> > ";
        }
    }
}
