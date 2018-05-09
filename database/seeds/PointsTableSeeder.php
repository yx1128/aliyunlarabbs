<?php

use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory as TestDummy;

class PointsTableSeeder extends Seeder
{

    public function run()
    {
      \DB::table('points')->delete();

      \DB::table('points')->insert(array (
          0 =>
          array (
            'id' => 1,
            'machine_id' => 1,
            'name' => '1#助燃风机-电机DS-R-D',
          ),
          1 =>
          array (
            'id' => 2,
            'machine_id' => 1,
            'name' => '1#助燃风机-电机WS-A-D',
          ),
          2 =>
          array (
            'id' => 3,
            'machine_id' => 1,
            'name' => '1#助燃风机-电机WS-R-D',
          ),
          3 =>
          array (
            'id' => 4,
            'machine_id' => 2,
            'name' => '2#助燃风机-电机DS-R-D',
          ),
          4 =>
          array (
            'id' => 5,
            'machine_id' => 2,
            'name' => '2#助燃风机-电机WS-A-D',
          ),
          5 =>
          array (
            'id' => 6,
            'machine_id' => 2,
            'name' => '2#助燃风机-电机WS-R-D',
          ),
          6 =>
          array (
            'id' => 7,
            'machine_id' => 3,
            'name' => '轧机F4-电机DS-A-G',
          ),
          7 =>
          array (
            'id' => 8,
            'machine_id' => 3,
            'name' => '轧机F4-电机DS-A-DG',
          ),
          8 =>
          array (
            'id' => 9,
            'machine_id' => 3,
            'name' => '轧机F4-电机DS-R-G',
          ),
          9 =>
          array (
            'id' => 10,
            'machine_id' => 3,
            'name' => '轧机F4-电机DS-R-DG',
          ),
          10 =>
          array (
            'id' => 11,
            'machine_id' => 3,
            'name' => '轧机F4-电机WS-R-G',
          ),
          11 =>
          array (
            'id' => 12,
            'machine_id' => 3,
            'name' => '轧机F4-分配箱-R-G',
          ),
          12 =>
          array (
            'id' => 13,
            'machine_id' => 4,
            'name' => '轧机F5-电机DS-A-G',
          ),
          13 =>
          array (
            'id' => 14,
            'machine_id' => 4,
            'name' => '轧机F5-电机DS-R-G',
          ),
          14 =>
          array (
            'id' => 15,
            'machine_id' => 4,
            'name' => '轧机F5-电机WS-R-G',
          ),
        ));
    }
}
