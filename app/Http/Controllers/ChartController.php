<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class ChartController extends Controller
{
    //
    public function view_chart(){

        return view( 'quest.chart');
    }

    public function chart()
    {
        $result = \DB::table('register_tickets')
            ->where('issue','=','MAIL')
            /*->where('issue','=','QCS')*/
            /*->orderBy('STATUS', 'DONE')*/
            ->orderBy('it_person' , 'DONE')
            ->get();

        return response()->json($result);
    }


}
