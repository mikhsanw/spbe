<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Helpers\Help;
use App\Model\aplikasi;
use App\Model\Kontak;
use App\Model\Halaman;
use View;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $model,$kode;

    public function __construct()
    {
        $this->kode = Help::menu()['kode'] ?? null;
        $this->model = Help::menu()['model'] ?? null;

        //menu awal
        $halamans = Halaman::whereNull('parent_id')->get();
        $menu=[
            'Beranda'        => url('/'),
        ];
        //menu halaman
        foreach($halamans as $halaman){
            if($halaman->status == 4){
                $menu[$halaman->nama] = url('/company/page/'.$halaman->id.'/'.Help::generateSeoURL($halaman->nama));
            }else{
                $menu[$halaman->nama]=($halaman->children->count() > 0) ? $halaman->children : url('/company/page/'.$halaman->id.'/'.Help::generateSeoURL($halaman->nama));
            }
        }
        //menu akhir
        // $menu=[
        //     'kontak'        => url('#kontak'),
        // ];

        View::share([
            'aplikasi'      => aplikasi::first(),
            'kontak'      => new Kontak,
            'menu' => $menu,
        ]);
    }
}
