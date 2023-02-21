<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portal extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];
    protected $fillable=[
        'id', 'nama','link', 'isi', 'parent_id', 'status', 'kategori', 'halaman_id'
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
        return $this->belongsTo('App\Model\Halaman', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Model\Halaman','parent_id','id');
    }
}
