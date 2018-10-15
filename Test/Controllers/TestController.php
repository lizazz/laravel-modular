<?php
/**
 * Created by PhpStorm.
 * User: viacheslavp
 * Date: 15.10.18
 * Time: 13:42
 */

namespace App\Modules\Test\Controllers;
use App\Http\Controllers\Controller;


class TestController extends Controller
{
    public function index()
    {
        return view('Test::index');
    }
}