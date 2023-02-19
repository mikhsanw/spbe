<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class jsController extends Controller
{
    public function backend($folder, $file)
    {
        $js = str_replace('.js', '', $file);
        return response()->view('backend.'. $folder .'.'. $js, ['kode' => $folder])->header('Content-Type', 'application/javascript');
    }

    public function backendWithId($folder, $id, $file)
    {
        $js = str_replace('.js', '', $file);
        return response()->view('backend.'. $folder .'.'. $js, ['id'=>$id, 'kode'=>$folder])->header('Content-Type', 'application/javascript');
    }

    public function backendWithKode($folder,$link,$kode, $file)
    {
        $js = str_replace('.js', '', $file);
        return response()->view('layouts.backend.'. $folder .'.'. $js, ['kode'=>$kode,'link'=>$link])->header('Content-Type', 'application/javascript');
    }

    public function backendnoauth($folder, $file)
    {
        $allow	= array('login','daftar','reset');
        if (in_array($folder, $allow)) {
            $js = str_replace('.js', '', $file);
            return response()->view('backend.'. $folder .'.'. $js)->header('Content-Type', 'application/javascript');
        }
    }

    public function frontend($folder, $file)
    {
        $js = str_replace('.js', '', $file);
        return response()->view('frontend.'. $folder .'.'. $js)->header('Content-Type', 'application/javascript');
    }
}
