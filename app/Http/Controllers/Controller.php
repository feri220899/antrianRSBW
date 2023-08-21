<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Encryption\Encrypter;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function Index()
    {
        $pw =DB::table("admin")
        ->select("admin.usere", "admin.passworde")
        ->get();
        $key = aes_decrypt('nur', $pw->usere);
        $crypt=Decrypter($key);


    }
}
