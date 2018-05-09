<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array(
            0 =>
            array(
                'id'          => 1,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 100,
                'name'        => '新闻',
                'slug'        => 'xin-wen',
                'description' => '可以发布最新的公司新闻动态',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            1 =>
            array(
                'id'          => 3,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 97,
                'name'        => '公告',
                'slug'        => 'gong-gao',
                'description' => '社区公告，小朋友不要做坏事哦。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            2 =>
            array(
                'id'          => 4,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 99,
                'name'        => '问答',
                'slug'        => 'wen-da',
                'description' => '欢迎在这里进行技术上的提问',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            3 =>
            array(
                'id'          => 5,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 98,
                'name'        => '分享',
                'slug'        => 'fen-xiang',
                'description' => '分享创造，分享知识，分享灵感，分享创意，分享美好的东西。排版清晰，内容精良的话，我们会为话题加精，加精后的帖子将会被推荐到网站首页',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            4 =>
            array(
                'id'          => 6,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 98,
                'name'        => '教程',
                'slug'        => 'tutorial',
                'description' => '教程文章请存放在此分类下，转载文章请注明「转载于」声明。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            5 =>
            array(
                'id'          => 8,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 98,
                'name'        => '专栏',
                'slug'        => 'blog',
                'description' => '用户自己创建的专栏信息。',
                'created_at'  => '2016-07-03 10:00:00',
                'updated_at'  => '2016-07-03 10:00:00',
                'deleted_at'  => null,
            ),
            6 =>
            array(
                'id'          => 9,
                'parent_id'   => 0,
                'post_count'  => 0,
                'weight'      => 98,
                'name'        => '设备',
                'slug'        => 'machine',
                'description' => '用户对设备发起讨论。',
                'created_at'  => '2017-05-03 10:00:00',
                'updated_at'  => '2017-05-03 10:00:00',
                'deleted_at'  => null,
            ),
        ));
    }
}
