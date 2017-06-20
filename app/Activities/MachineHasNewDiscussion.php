<?php

namespace App\Activities;

use App\Models\Activity;

class BlogHasNewArticle extends BaseActivity
{
    public function generate($user, $topic, $machine)
    {
        $this->addTopicActivity($user, $topic, [
            'machine_link' => $machine->links(),
            'machine_name' => $machine->name,
            'mcahine_cover' => $machine->cover,
        ]);
    }

    public function remove($user, $topic)
    {
        $this->removeBy("u$user->id", "t$topic->id");
    }
}
