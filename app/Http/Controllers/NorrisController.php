<?php

namespace App\Http\Controllers;

use App\Jobs\CallApi;
use App\Models\Values;
use Illuminate\Http\Request;

class NorrisController extends Controller
{
    function read(){

        $values = new Values();
        $val = $values->setConnection('mysql')->allI();
        CallApi::dispatch();

        return view('norris.norris',compact('val'));
    }
}
