<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register_ticket;

class IndexController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function showUserTicket()
    {
        return view('');
    }


}
