<?php
/**
 * Created by PhpStorm.
 * User: infec
 * Date: 07.04.2019
 * Time: 23:38
 */

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        return view('customer.dashboard');
    }

}
