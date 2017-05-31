<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donations')->insert(
            [
                'name' => "ටෙස්ට් donation 1",
                'telephone' => "0700001110000",
                'address' => "address ලයින් one,ටෙස්ට් පාර,ගම 3",
                'city' => "උතුරු කොළඹ 3",
                'donation' => "ෂීට් පැදුරු මදුරු දැල් කොට්ට විදුලි පන්දම් තුවා කුඩ ඉටි පන්දම් ගිනි පෙට්ටි ටොච් සබන් පැනඩොල් සමහන් 3",
                'information' => "අමතර විස්තර ",
            ],
            [
                'name' => "",
                'telephone' => "",
                'address' => "address ලයින් one,ටෙස්ට් පාර,ගම 4",
                'city' => "උතුරු කොළඹ 4",
                'donation' => "තුවා කුඩ ඉටි පන්දම් ගිනි පෙට්ටි ටොච් සබන් පැනඩොල් සමහන් ",
            ]
        );

        DB::table('needs')->insert(
            [
                'name' => "ටෙස්ට් needs 1",
                'telephone' => "0710001110000",
                'address' => "address ලයින් one,ටෙස්ට් පාර,ගම ",
                'city' => "උතුරු කොළඹ ",
                'needs' => "බෙඩ් ෂීට් පැදුරු මදුරු දැල් කොට්ට විදුලි පන්දම් තුවා කුඩ ඉටි පන්දම් ගිනි පෙට්ටි ටොච් සබන් පැනඩොල් සමහන් ",
                'heads' => "12",
            ],
            [
                'name' => "ටෙස්ට් needs 2",
                'telephone' => "0710001110001",
                'address' => "address ලයින් one,ටෙස්ට් පාර,ගම 2",
                'city' => "උතුරු කොළඹ 2",
                'needs' => "විදුලි පන්දම් තුවා කුඩ ඉටි පන්දම් ගිනි පෙට්ටි ටොච් සබන් පැනඩොල් සමහන්",
                'heads' => "23",
            ]
        );


        // $this->call(UsersTableSeeder::class);
    }
}
