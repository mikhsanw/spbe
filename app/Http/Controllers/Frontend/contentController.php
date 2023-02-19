<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Halaman;
use App\Model\File;
use App\Model\foto;
use App\Model\Video;
use App\Model\Berita;
use App\Model\Agenda;
use App\Model\JadwalPemilu;
use App\Model\Calon;
use Carbon;
use Yajra\DataTables\Facades\DataTables;

class contentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $arr=array(
        'data' => Halaman::find($id),
        'doc' => File::whereMorphId($id)->orderBy('id','desc')->get(),
        );
        return view('frontend.beranda.halaman',$arr);
    }
    public function galeri($jenis)
    {
        if($jenis==='foto'){
            $arr=array(
                'jenis' => $jenis,
                'data' => foto::where('status',config('master.status_foto.galeri'))->orderBy('id','desc')->simplePaginate(16),
            );
        }elseif($jenis==='video'){
            $arr=array(
                'jenis' => $jenis,
                'data' => video::whereStatus(0)->orderBy('id','desc')->simplePaginate(16),
            );
        }elseif($jenis==='infografis'){
            $arr=array(
                'jenis' => $jenis,
                'data' => foto::where('status',config('master.status_foto.infografis'))->orderBy('id','desc')->simplePaginate(16),
            );
        }
        return view('frontend.beranda.galeri',$arr);
    }
    public function berita()
    {
        $arr=array(
            'data' => Berita::whereStatus(0)->orderBy('tanggal','desc')->paginate(9),
        );
        return view('frontend.beranda.berita',$arr);
    }
    public function artikel()
    {
        $arr=array(
            'data' => Berita::whereStatus(1)->orderBy('tanggal','desc')->paginate(9),
        );
        return view('frontend.beranda.berita',$arr);
    }
    public function beritadetail($id){
        $berita=Berita::find($id);
        Berita::where('id', $berita->id)->update(['view' => $berita->view+1]);

        $arr=array(
            'data' => $berita,
        );

        return view('frontend.beranda.beritadetail',$arr);
    }

    public function informasi($id)
    {
        $Halaman = Halaman::select('id')->where('jenis',$id)->first();
        $arr=array(
            'data' => Halaman::find($Halaman->id),
            'doc' => File::whereMorphId($id)->get(),
            );
        return view('frontend.beranda.Halaman',$arr);
    }

    public function pemilu($jenis)
    {
        $arr=array(
            'jenis' => strtoupper(config('master.pemilu.'.$jenis)),
            'jadwal' => JadwalPemilu::whereJenis($jenis)->whereStatus(1)->whereNull('parent_id')->orderBy('id','desc')->first(),
            'calon' => Calon::whereJenis($jenis)->whereStatus(1)->whereNull('parent_id')->orderBy('id','desc')->first()
        );
        return view('frontend.beranda.pemilu',$arr);
    }

    public function agenda()
    {
        $arr=array(
        'video' => Video::whereStatus(1)->first()
        );
        return view('frontend.beranda.agenda',$arr);
    }
    public function datainternal(Request $request)
    {
        if ($request->ajax()) {
            $data = Agenda::whereJenis(0)->whereDate('created_at',Carbon::today())->get();
            return Datatables::of($data)
            ->addColumn('lokasi', function ($q) {
                return $q->lokasi;
            })
            ->addColumn('keterangan', function ($q) {
                return $q->keterangan;
            })
            ->rawColumns(['keterangan','lokasi'])->addIndexColumn()->make(TRUE);
        }
        else {
            exit("Not an AJAX request -_-");
        }
    }
    public function dataexternal(Request $request)
    {
        if ($request->ajax()) {
            $data = Agenda::whereJenis(1)->whereDate('created_at',Carbon::today())->get();
            return Datatables::of($data)
            ->addColumn('lokasi', function ($q) {
                return $q->lokasi;
            })
            ->addColumn('keterangan', function ($q) {
                return $q->keterangan;
            })
            ->rawColumns(['keterangan','lokasi'])->addIndexColumn()->make(TRUE);
        }
        else {
            exit("Not an AJAX request -_-");
        }
    }
}
