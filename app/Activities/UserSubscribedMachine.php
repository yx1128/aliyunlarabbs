<?php

namespace App\Activities;

use App\Models\Activity;

class UserSubscribedMachine extends BaseActivity
{
    public function generate($user, $machine)
    {
        $causer      = 'u' . $user->id;
        $indentifier = 'm' . $machine->id;
        $data = array_merge([
            'machine_name' => $machine->name,
            'machine_link' => $machine->links(),
        ]);

        $this->addActivity($causer, $user, $indentifier, $data);
    }

    public function remove($user, $machine)
    {
        $this->removeBy("u$user->id", "m$machine->id");
    }
}
