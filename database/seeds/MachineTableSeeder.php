<?php

use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory as TestDummy;

class MachineTableSeeder extends Seeder
{
  public function run()
  {
      \DB::table('machines')->delete();

      \DB::table('machines')->insert(array (
          0 =>
          array (
              'id' => 1,
              'name' => '设备1',
              'slug' => 'machine1',
              'description' => '设备1描述',
              'cover' => 'https://dn-phphub.qbox.me/uploads/images/201701/16/1/9Il9wyivOg.png',
              'user_id' => 1,
              'data_count' => 1,
              'subscriber_count' => 0,
              'is_recommended' => 0,
              'is_blocked' => 0,
              'created_at' => '2017-01-17 14:35:47',
              'updated_at' => '2017-01-17 14:35:47',
              'image' => '',
          ),
          1 =>
          array (
              'id' => 2,
              'name' => '设备2',
              'slug' => 'machine2',
              'description' => '设备2描述',
              'cover' => 'https://dn-phphub.qbox.me/uploads/images/201701/16/1/9Il9wyivOg.png',
              'user_id' => 2,
              'data_count' => 0,
              'subscriber_count' => 0,
              'is_recommended' => 0,
              'is_blocked' => 0,
              'created_at' => '2017-01-17 14:35:47',
              'updated_at' => '2017-01-17 14:35:47',
              'image' => '',
          ),
          2 =>
          array (
              'id' => 3,
              'name' => '设备3',
              'slug' => 'machine3',
              'description' => '设备3描述',
              'cover' => 'https://dn-phphub.qbox.me/uploads/images/201701/16/1/9Il9wyivOg.png',
              'user_id' => 3,
              'data_count' => 0,
              'subscriber_count' => 0,
              'is_recommended' => 0,
              'is_blocked' => 0,
              'created_at' => '2017-01-17 14:35:47',
              'updated_at' => '2017-01-17 14:35:47',
              'image' => '',
          ),
          3 =>
          array (
              'id' => 4,
              'name' => '设备4',
              'slug' => 'machine4',
              'description' => '设备4描述',
              'cover' => 'https://dn-phphub.qbox.me/uploads/images/201701/16/1/9Il9wyivOg.png',
              'user_id' => 4,
              'data_count' => 0,
              'subscriber_count' => 0,
              'is_recommended' => 0,
              'is_blocked' => 0,
              'created_at' => '2017-01-17 14:35:47',
              'updated_at' => '2017-01-17 14:35:47',
              'image' => '',
          ),
          4 =>
          array (
              'id' => 5,
              'name' => 'C1C2',
              'slug' => 'C1C2',
              'description' => '设备C1C2描述',
              'cover' => 'http://phphub5.app/favicon1.png',
              'user_id' => 5,
              'data_count' => 0,
              'subscriber_count' => 0,
              'is_recommended' => 0,
              'is_blocked' => 0,
              'created_at' => '2017-01-17 14:35:47',
              'updated_at' => '2017-01-17 14:35:47',
              'image' => 'http://phphub5.app/assets/images/machines/C1C2.jpg',
          ),
      ));

  }

}
