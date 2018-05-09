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
              'name' => '2250-1号助燃风机',
              'slug' => '2250-1',
              'description' => '2250-1号助燃风机设备描述',
              'cover' => 'http://phphub5.app/assets/images/machines/1zhuran.jpg',
              'user_id' => 1,
              'data_count' => 1,
              'subscriber_count' => 0,
              'is_recommended' => 0,
              'is_blocked' => 0,
              'created_at' => '2017-01-17 14:35:47',
              'updated_at' => '2017-01-17 14:35:47',
              'image' => 'http://phphub5.app/assets/images/machines/1zhuran.jpg',
          ),
          1 =>
          array (
              'id' => 2,
              'name' => '2250-2号助燃风机',
              'slug' => '2250-2',
              'description' => '2250-1号助燃风机设备描述',
              'cover' => 'http://phphub5.app/assets/images/machines/2zhuran.jpg',
              'user_id' => 2,
              'data_count' => 0,
              'subscriber_count' => 0,
              'is_recommended' => 0,
              'is_blocked' => 0,
              'created_at' => '2017-01-17 14:35:47',
              'updated_at' => '2017-01-17 14:35:47',
              'image' => 'http://phphub5.app/assets/images/machines/2zhuran.jpg',
          ),
          2 =>
          array (
              'id' => 3,
              'name' => 'BNA-F4机架',
              'slug' => 'BNA-F4',
              'description' => 'BNA-F4机架的设备描述',
              'cover' => 'http://phphub5.app/assets/images/machines/F4.jpg',
              'user_id' => 3,
              'data_count' => 0,
              'subscriber_count' => 0,
              'is_recommended' => 0,
              'is_blocked' => 0,
              'created_at' => '2017-01-17 14:35:47',
              'updated_at' => '2017-01-17 14:35:47',
              'image' => 'http://phphub5.app/assets/images/machines/F4.jpg',
          ),
          3 =>
          array (
              'id' => 4,
              'name' => 'BNA-F5机架',
              'slug' => 'BNA-F5',
              'description' => 'BNA-F5机架的设备描述',
              'cover' => 'http://phphub5.app/assets/images/machines/F5.jpg',
              'user_id' => 4,
              'data_count' => 0,
              'subscriber_count' => 0,
              'is_recommended' => 0,
              'is_blocked' => 0,
              'created_at' => '2017-01-17 14:35:47',
              'updated_at' => '2017-01-17 14:35:47',
              'image' => 'http://phphub5.app/assets/images/machines/F5.jpg',
          ),
      ));

  }

}
