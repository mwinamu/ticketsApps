<?php
/**
 * Created by PhpStorm.
 * User: mwinamu
 * Date: 6/16/2017
 * Time: 11:52 AM
 */
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;



class RegisterTicketSeeder extends Seeder
{

    public function run()
    {


        DB::table('register_tickets')->insert([

            'username' => 'hmwinamu',
            'issue' => 'qcs',
            'description' => 'Loading but no response',
            'status' => 'pending',
            'it_person' => 'hmwinamu',


        ]);
    }

}