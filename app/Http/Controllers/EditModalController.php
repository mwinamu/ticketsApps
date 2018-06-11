<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register_ticket;

class EditModalController extends Controller
{
//    show editTicket modal
    public function showEditModal(){

        return view('contents.editModal');
    }

}
