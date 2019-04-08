<?php
/**
 * Created by PhpStorm.
 * User: infec
 * Date: 07.04.2019
 * Time: 03:49
 */

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('customer.dashboard');
