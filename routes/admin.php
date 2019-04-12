<?php
/**
* Created by PhpStorm.
 * User: infec
* Date: 07.04.2019
* Time: 03:49
*/

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('admin.dashboard');

Route::prefix('/instance')->namespace('Instance')->group(function () {
    Route::get('/', 'InstanceController@index')->name('admin.instance.index');
    Route::any('/creation', 'InstanceController@creation')->name('admin.instance.creation');
//    Route::get('/delete', 'InstanceSingleController@delete')->name('admin.instance.delete');
    Route::prefix('{instance}')->namespace('Single')->group(function () {
        Route::get('/', 'InstanceSingleController@index')->name('admin.instance.single.index');
    });
});
