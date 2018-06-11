<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = new User();
        $administrator->name =  'Wycliffe Nyachiro';
        $administrator->username =  'wnyachiro';
        $administrator->email = 'wnyachiro@questholdings.biz';
        $administrator->password = bcrypt( 'Password.' );
        $administrator->save();

    }
}
