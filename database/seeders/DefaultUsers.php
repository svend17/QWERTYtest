<?php

namespace Database\Seeders;

use App\Models\BookOfUser;
use Illuminate\Database\Seeder;

class DefaultUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name_user'=>'Victor','group_id'=>1),
            array('name_user'=>'Tom','group_id'=>2),
            array('name_user'=>'John','group_id'=>3)
        );

        BookOfUser::insert($data);
    }
}
