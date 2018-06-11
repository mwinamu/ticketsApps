<?php

namespace App\Http\Controllers;

use App\ItPerson;
use Illuminate\Http\Request;
use App\Register_ticket;
use Illuminate\Mail\Mailer;
use App\Mail\TicketsMail;
use Mail;
use App\IssueDropdown;
use App\Status;
use App\Jobs;


class TicketsController extends Controller
{

  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function __construct()
    {
       /* $this->middleware('guest');*/
    }
    protected function guard()
    {
        return Auth::guard();
    }
/*
 * to show ticket.blade.php
 *
 * with tickets
 * */


     public function view_ticket(){


         $register_tickets =  Register_ticket::orderBy( 'id' , request( 'sort' , 'desc' )) -> paginate( 7 );
         return view( 'quest.ticket' , compact( 'register_tickets' ) );


    }
    /*to show register ticket form*/
    public function showTicketForm(){

        $issuesdropdowns = IssueDropdown::pluck('issue');

        return view( 'quest.raiseTicket' , compact( 'issuesdropdowns' ) );
    }
    /*
     * insert to db in table register_tickets
     * */
    public function raiseTicket( Request $request ){


        $this->validate( $request, [
            'username' => 'required||string|max:255',
            'issue' => 'required||string|max:255',
            'description' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'ticket_status' => 'string|max:255',
            'it_person' => 'string|max:255',

        ]);

        $data = $request->all();


        $register_ticket = Register_ticket::create([
            'username' => $data[ 'username' ],
            'issue' => $data[ 'issue' ],
            'description' => $data[ 'description' ],
            'email' => $data[ 'email' ],
            'ticket_status' => $data[ 'ticket_status'],
            'it_person' => $data[ 'it_person']
        ]);

        if(  $register_ticket != "" ){
            $id = $register_ticket -> id;
            $username = $register_ticket -> username;
            $email = $register_ticket -> email;

            $receiverAddress = $email;
            /*
        * contents should remain the same or if changed
        * change in public function done() ,
        * public function assign() and
        * public function raise()..
        *
        * reason is re usability of the tickets.blade.php
        *
        * */


            $content = [
                'title'=> 'TICKET',
                'body2'=>  $username,
                'body3'=> 'Ticket raised succesfully your ticket number is',
                'body4'=> $id,
                'body5'=> '',
                'body6'=> '',
                'body7'=> '',
                'body8'=> '',
                'button' => 'Check ticket ',
            ];
            /* sending mail
            using  Ticketsmail class
             * */
         Mail::to( $receiverAddress )->send( new TicketsMail( $content ) );



            return redirect()->back()->with( 'message' , "$username, your ticket number is
            $id click on Tickets to view status or check your email " );

        }
        else{

            return redirect()->back()->with( 'message' , "Ticket not raised" );
        }

    }
    /*
     * finds id and then displays content on form
     * */
    public function edit( $id ){


        $register_ticket = Register_ticket::find( $id );
        $it_persons = ItPerson::pluck('name');
        $status = Status::pluck('status');



        return view( 'editTicket.editForm' , compact( 'register_ticket', 'it_persons', 'status' ));

    }
// updates entry when update button pressed

    public function update( Request $request  )
    {
        /*
         * request validation
         * */
    $this->validate($request, [
        'id' => 'required|max:255',
        'username' => 'required|max:255',
        'issue' => 'required|max:255',
        'description' => 'required',
        'ticket_status' => 'required|max:255',
        'it_person' => 'required|max:255',

    ]);
        /*`
         * updating to db
         * */

        $id = $request->get( 'id' );

        $register_ticket = Register_ticket::find( $request->get( 'id' ) );
        $register_ticket-> username = $request->get( 'username' );
        $register_ticket -> issue = $request->get( 'issue' );
        $register_ticket -> description = $request->get( 'description' );
        $register_ticket -> ticket_status = $request->get( 'ticket_status' );
        $register_ticket -> it_person = $request->get( 'it_person' );
        $register_ticket -> save();
        return redirect()->back()->with( 'message', "Ticket $id Updated Succesfully"  );
    }
    /*
     * self assighning tickets when take button is pressed
     * @param $id
     * @param $name
     * @return \Illuminate\Http\RedirectResponse
     * */
    public function assign( $id , $name ){

        $register_ticket = Register_ticket::find( $id );

        if( $register_ticket != "" ){

            $register_ticket -> ticket_status = 'ongoing';
            $register_ticket -> it_person = $name;
            $register_ticket -> save();

            $username = $register_ticket -> username;
            $id = $register_ticket -> id;
            $it_person = $register_ticket -> it_person;
            $status = $register_ticket -> ticket_status;
            $email = $register_ticket -> email;

            $receiverAddress = $email;


            /*
                    * contents should remain the same or if changed
                    * change in public function done() ,
                    * public function assign() and
                    * public function raise()..
                    *
                    * reason is re usability of the tickets.blade.php
                    *
                    * */
           $content = [
                'title'=> 'it@questholdings.biz',
                'body2'=>  $username,
                'body3'=> 'Your ticket ',
                'body4'=> $id,
                'body5'=> 'is assigned to',
                'body6'=> $it_person,
                'body7'=> 'and is being worked on.',
                'body8'=> '',
                'button' => 'Check ticket ',
            ];
            /* sending mail
            using  Ticketsmail class
             * */

            Mail::to( $receiverAddress )->send( new TicketsMail( $content ) );


            return redirect()->back()->with( 'message' , "  You have assigned ticket $id  to $name and
            email sent to $username with $status as status  " );

        }else{

            return redirect()->back()->with( 'message' , "Ticket not assigned try again" );
        }


    }
    /*
     * when done button pressed
     * */
    /**
     * @param $id
     * @param $name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function done( $id , $name ){

        $register_ticket = Register_ticket::find( $id );

        if( $register_ticket != "" ){

            $register_ticket -> ticket_status = 'done';
            $register_ticket -> it_person = $name;
            $register_ticket -> save();


            $username = $register_ticket -> username;
            $id = $register_ticket -> id;
            $it_person = $register_ticket -> it_person;
            $status = $register_ticket -> ticket_status;
            $email = $register_ticket -> email;

            $receiverAddress = $email;
            /*
             * contents should remain the same or if changed
             * change in public function done() ,
             * public function assign() and
             * public function raise()..
             *
             * reason is re usability of the tickets.blade.php
             *
             * */

            $content = [
                'title'=> 'it@questholdings.biz',
                'body2'=>  $username,
                'body3'=> 'Your ticket ',
                'body4'=> $id,
                'body5'=> 'your ticket is confirmed',
                'body6'=> $status,
                'body7'=> 'for further inquiries contact',
                'body8'=> $it_person,
                'button' => 'Check ticket ',
            ];
            /* sending mail
            using  Ticketsmail class
             * */
          Mail::to( $receiverAddress )->send( new TicketsMail( $content ) );

            return redirect()->back()->with( 'message' , "Ticket $id status changed to done
            and email sent to $username with  $status as status" );
        } else{

            return redirect()->back()->with( 'message' , "Ticket status not changed to done , try again" );
        }

     }
     public function search($s){


     }
     public function autocomplete(Request $request){

         $term = $request->term;//from jquery
         $register_ticket = Register_ticket::where('name','LIKE','%'.$term.'%')->get();

     }
    /**
     * Fetch the particular company details
     * @return json response
     */





}
