<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class DefaultGroups extends Seeder
{
    public function run()
    {
        $data = array(
            array('nameOfGroup'=>'Admins'),
            array('nameOfGroup'=>'Guests'),
            array('nameOfGroup'=>'Supports')
        );

        Group::insert($data);
    }
}
