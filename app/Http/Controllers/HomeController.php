<?php

namespace App\Http\Controllers;

use App\EditTicket;
use Illuminate\Http\Request;
use App\Register_ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view( 'home' );
    }
    public function view_ticket(){

        $register_tickets =  Register_ticket::orderBy( 'id' , request( 'sort' , 'desc' )) -> paginate( 7 );

        /* pagination sort  in ascending order
                $register_tickets = Register_ticket::paginate(10);*/

        return view( 'home' , compact( 'register_tickets' ) );
    }



}

