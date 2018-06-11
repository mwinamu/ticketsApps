<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IssueDropdown;

class DropdownsController extends Controller
{
    //issues dropdown from db to view
    public function issues(){

        $issuedropdowns =  Issuesdropdown::orderBy( 'id' ) ;

        /*return view( 'quest.raiseTicket' , compact( 'issue_dropdowns' ) );*/

        return view( 'quest.raiseTicket' )->with( 'message' , "$issuedropdowns" );

  }
}
