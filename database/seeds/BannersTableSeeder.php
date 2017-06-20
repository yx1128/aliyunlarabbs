<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('banners')->delete();

        \DB::table('banners')->insert(array (
            0 =>
            array (
                'id' => 1,
                'position' => 'website_top',
                'order' => 1,
                'image_url' => 'http://phphub5.app/uploads/banners/banners.jpg',
                'title' => 'banners1',
                'link' => 'https://www.baidu.com/',
                'target' => '_blank',
                'description' => 'banners1简介',
                'created_at' => '2016-07-12 11:31:36',
                'updated_at' => '2016-07-12 11:31:36',
            ),
            1 =>
            array (
                'id' => 3,
                'position' => 'website_top',
                'order' => 3,
                'image_url' => 'http://phphub5.app/uploads/banners/banners.jpg',
                'title' => 'banners2',
                'link' => 'https://www.baidu,com/',
                'target' => '_blank',
                'description' => 'banners2简介',
                'created_at' => '2016-07-12 11:32:25',
                'updated_at' => '2016-07-12 11:32:25',
            ),
            2 =>
            array (
                'id' => 4,
                'position' => 'website_top',
                'order' => 2,
                'image_url' => 'http://phphub5.app/uploads/banners/banners.jpg',
                'title' => 'banners3',
                'link' => 'https://www.baidu.com/',
                'target' => '_self',
                'description' => 'banners3简介',
                'created_at' => '2016-07-12 11:33:05',
                'updated_at' => '2016-07-12 15:03:56',
            ),
            3 =>
            array (
                'id' => 5,
                'position' => 'website_top',
                'order' => 4,
                'image_url' => 'http://phphub5.app/uploads/banners/banners.jpg',
                'title' => 'banners4',
                'link' => 'https://www.baidu.com/',
                'target' => '_blank',
                'description' => 'banners4简介',
                'created_at' => '2016-07-12 11:33:40',
                'updated_at' => '2016-07-12 11:33:40',
            ),
            4 =>
            array (
                'id' => 6,
                'position' => 'website_top',
                'order' => 6,
                'image_url' => 'http://phphub5.app/uploads/banners/banners.jpg',
                'title' => 'banners5',
                'link' => 'https://www.baidu.com/',
                'target' => '_blank',
                'description' => 'banners5简介',
                'created_at' => '2016-07-12 11:34:07',
                'updated_at' => '2016-07-12 11:34:07',
            ),
            5 =>
            array (
                'id' => 7,
                'position' => 'website_top',
                'order' => 5,
                'image_url' => 'http://phphub5.app/uploads/banners/banners.jpg',
                'title' => 'banners6',
                'link' => 'https://www.baidu.com/',
                'target' => '_blank',
                'description' => 'banners6简介',
                'created_at' => '2016-07-12 11:34:36',
                'updated_at' => '2016-07-12 15:05:09',
            ),
            6 =>
            array (
                'id' => 8,
                'position' => 'sidebar-resources',
                'order' => 5,
                'image_url' => 'http://phphub5.app/uploads/banners/banner.png',
                'title' => 'banners7',
                'link' => 'https://www.baidu.com/',
                'target' => '_blank',
                'description' => 'bannners7简介',
                'created_at' => '2016-07-12 11:34:36',
                'updated_at' => '2016-07-12 15:05:09',
            ),
            7 =>
            array (
                'id' => 9,
                'position' => 'sidebar-resources',
                'order' => 6,
                'image_url' => 'http://phphub5.app/uploads/banners/banner.png',
                'title' => 'banners8',
                'link' => 'https://www.baidu.com/',
                'target' => '_blank',
                'description' => 'banners8简介',
                'created_at' => '2016-07-12 11:34:07',
                'updated_at' => '2016-07-12 11:34:07',
            ),
        ));


    }
}
