<?php

namespace App\Http\ApiControllers;

use App\Transformers\MachineTransformer;
use App\Models\Machine;

class MachinesController extends Controller
{
    public function index()
    {
        $data = Machine::all();
        return $this->response()->collection($data, new MachineTransformer());
    }

    public function show($id)
    {
       $machine = Machine::find($id);
       return $this->response()->item($machine, new MachineTransformer());
    }
}
