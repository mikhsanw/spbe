<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Model\Profil;

class portalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function data(Request $request, $id)
    {
        if ($request->ajax()) {
            $data= $this->model::where('parent_id',$id)->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('kelola', function($q){
                if($q->status==0){
                    $kelola = '<div style="text-align: center;">
                        <a class="create" data-toggle="tooltip" data-placement="top" title="Tambah" '.$this->kode.'-id="'.$q->id.'" href="#create-'.$q->id.'">
                            <i class="fas fa-plus text-info"></i>
                        </a>
                    </div>';
                }elseif($q->status==1){
                    $kelola = '<div style="text-align: center;">
                        <a href="'.url($this->kode.'/'.$q->id).'" class="text-info">
                            <i class="fas fa-share text-info"></i>
                        </a>
                    </div>';
                }elseif($q->status==2){
                    $kelola = '<div style="text-align: center;">
                        <a class="link" data-toggle="tooltip" data-placement="top" title="Tambah" '.$this->kode.'-id="'.$q->id.'" href="#link-'.$q->id.'">
                        <i class="fas fa-link"></i>
                        </a>
                    </div>';
                }elseif($q->status==3){
                    $kelola = '<div style="text-align: center;">
                        <a data-toggle="tooltip" data-placement="top" title="Tambah" href="'.url('upload/'.$q->id).'">
                            <i class="fas fa-upload text-info"></i>
                        </a>
                    </div>';
                }elseif($q->status==4){
                    $kelola = '<div style="text-align: center;">
                        <a data-toggle="tooltip" data-placement="top" title="Tambah" href="'.url('portal/'.$q->id).'">
                            <i class="fas fa-upload text-info"></i>
                        </a>
                    </div>';
                }elseif($q->status==5){
                    $kelola = '<div style="text-align: center;">
                        <a class="upload" data-toggle="tooltip" data-placement="top" title="Tambah" '.$this->kode.'-id="'.$q->id.'" href="#upload-'.$q->id.'">
                            <i class="fas fa-file-upload"></i>
                        </a>
                    </div>';
                }
                
                return $kelola ?? NULL;
            })
            ->addColumn('action', '<div style="text-align: center;">
               <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" '.$this->kode.'-id="{{ $id }}" href="#edit-{{ $id }}">
                   <i class="fa fa-edit text-warning"></i>
               </a>&nbsp; &nbsp;
               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" href="#hapus-{{ $id }}" '.$this->kode.'-id="{{ $id }}">
                   <i class="fa fa-trash text-danger"></i>
               </a>
           </div>')->rawColumns(['action', 'kelola'])->toJson();
        }
        else {
            exit("Not an AJAX request -_-");
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function create_child($id)
    {
        return view('backend.'.$this->kode.'.tambah-detail', ['id'=>$id]);
    }

    public function save($id)
    {
        $data=[
            'data'    => $this->model::find($id)
        ];
        return view('backend.'.$this->kode.'.save', $data);
    }

    public function link($id)
    {
        $data=[
            'data'    => $this->model::find($id)
        ];
        return view('backend.'.$this->kode.'.link', $data);
    }
    public function upload($id)
    {
        $data=[
            'data'    => $this->model::find($id)
        ];
        return view('backend.'.$this->kode.'.upload', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                'nama'                  => 'required|'.config('master.regex.json'),
                'status'                => 'required|'.config('master.regex.json')
                ]);
            if ($validator->fails()) {
                $respon=['status'=>false, 'pesan'=>$validator->messages()];
            }
            else {
                $data = $this->model::create($request->all());
                if ($request->hasFile('file_logo')) {
                    $data->file()->create([
                        'name'                  => 'file_logo',
                        'data'                      =>  [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/file_logo/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file_logo')),
                        ]
                    ]);
                }
                if ($request->hasFile('file_pendukung')) {
                    $data->file()->create([
                        'name'                  => 'file_pendukung',
                        'data'                      =>  [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/file_portal/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file_pendukung')),
                        ]
                    ]);
                }
                $respon=['status'=>true, 'pesan'=>'Data berhasil disimpan'];
            }
            return $respon;
        }
        else {
            exit('Ops, an Ajax request');
        }
    }
    
    
    public function store_halaman(Request $request)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                'isi'       => 'required'
                ]);
            if ($validator->fails()) {
                $respon=['status'=>false, 'pesan'=>$validator->messages()];
            }
            else {
                $this->model::whereId($request->id)->first()->update($request->all());
                $respon=['status'=>true, 'pesan'=>'Data berhasil disimpan'];
            }
            return $respon;
        }
        else {
            exit('Ops, an Ajax request');
        }
    }

    public function store_upload(Request $request)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                'file'                  => $request->hasFile('file') ? 'required|mimes:pdf,rar,zip,jpg,png' : ''
            ]);
            if ($validator->fails()) {
                $response=['status'=>FALSE, 'pesan'=>$validator->messages()];
            }
            else {
                $data = $this->model::find($request->id);
                if ($request->hasFile('file')) {
                    $data->file()->updateOrCreate(['morph_id'=>$data->id],[
                        'morph_id'                  => $data->id,
                        'data'                  =>  [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/file/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file')),
                        ]
                    ]);
                }
                $respon=['status'=>true, 'pesan'=>'Data berhasil disimpan'];
            }
            return $response ?? ['status'=>TRUE, 'pesan'=>['msg'=>'Data berhasil diubah']];
        }
        else {
            exit('Ops, an Ajax request');
        }
    }
    
    public function store_link(Request $request)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                'link'       => 'required'
                ]);
            if ($validator->fails()) {
                $respon=['status'=>false, 'pesan'=>$validator->messages()];
            }
            else {
                $this->model::whereId($request->id)->first()->update($request->all());
                $respon=['status'=>true, 'pesan'=>'Data berhasil disimpan'];
            }
            return $respon;
        }
        else {
            exit('Ops, an Ajax request');
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=[
            'id'    => $id,
            'data'    => $this->model::find($id)
        ];
        return view('backend.'.$this->kode.'.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'data'    => $this->model::find($id)
        ];
        return view('backend.'.$this->kode.'.ubah', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $validator=Validator::make($request->all(), [
                'nama'                  => 'required|'.config('master.regex.json'),
                'status'                => 'required|'.config('master.regex.json'),
            ]);
            if ($validator->fails()) {
                $response=['status'=>FALSE, 'pesan'=>$validator->messages()];
            }
            else {
                $this->model::find($id)->update($request->all());
                $data = $this->model::find($id);
                if ($request->hasFile('file_logo')) {
                    $data->file_logo()->updateOrCreate(['name' => 'file_logo'],[
                        'name'                  => 'file_logo',
                        'data'                      =>  [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/file_logo/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file_logo')),
                        ]
                    ]);
                }
                if ($request->hasFile('file_pendukung')) {
                    $data->file_pendukung()->updateOrCreate(['name' => 'file_pendukung'],[
                        'name'                  => 'file_pendukung',
                        'data'                      =>  [
                            'disk'      => config('filesystems.default'),
                            'target'    => Storage::putFile($this->kode.'/file_portal/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('file_pendukung')),
                        ]
                    ]);
                }
                $respon=['status'=>true, 'pesan'=>'Data berhasil diubah'];
            }
            return $response ?? ['status'=>TRUE, 'pesan'=>['msg'=>'Data berhasil diubah']];
        }
        else {
            exit('Ops, an Ajax request');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $data=$this->model::find($id);
        return view('backend.'.$this->kode.'.hapus', ['data'=>$data]);
    }

    public function destroy($id)
    {
        $data=$this->model::find($id);
        if ($data->delete()) {
            $response=['status'=>TRUE, 'pesan'=>['msg'=>'Data berhasil dihapus']];
        }
        else {
            $response=['status'=>FALSE, 'pesan'=>['msg'=>'Data gagal dihapus']];
        }
        return response()->json($response);
    }
}
