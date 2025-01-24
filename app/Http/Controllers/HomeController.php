<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller  // This extends Controller class
{
    public function __construct()
    {
        $this->middleware('auth');  // Should work without issues
    }

    public function index()
    {
        return view('home');
    }
}
