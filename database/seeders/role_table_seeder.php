<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\role
;

class role_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role=new role();
        $role->role_name='admin';
        $role->role_code='admin';
        $role->save();
        $role1=new role();
        $role1->role_name='Content writer';
        $role1->role_code='cw';
        $role1->save();

    }
}
