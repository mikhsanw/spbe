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

    public function parent()
    {
        return $this->belongsTo('App\Model\Halaman', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Model\Halaman','parent_id','id');
    }
}
