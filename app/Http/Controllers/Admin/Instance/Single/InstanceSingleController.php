<?php


namespace App\Http\Controllers\Admin\Instance\Single;


use App\Http\Controllers\Controller;
use App\Models\Instance;

class InstanceSingleController extends Controller
{

    public function index(Instance $instance)
    {
        return dd($instance);
//        return view('admin.instance.single.index');
    }

}
