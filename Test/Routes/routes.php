<?php
/**
 * Created by PhpStorm.
 * User: viacheslavp
 * Date: 15.10.18
 * Time: 14:26
 */
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Tsnmedia\Modules\Test\Controllers',
        'as' => 'test.',
    ],
    function ()
    {
        Route::get('/test', ['uses' => 'TestController@index']);
    });
