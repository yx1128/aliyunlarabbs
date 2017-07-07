<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Value;
use App\Models\Machine;
use App\Models\Topic;
use App\Models\User;
use Charts;
use Auth;
use Flash;
use Carbon\Carbon;

class ValuesController extends Controller
{

  public function show($id)
  {
    $value = Value::findOrFail($id);
    $warntime = $value->created_at;
    $start = $value->created_at->subDays(1);
    $end = $value->created_at->addDays(1);
    $point = $value->point;
    $machine = $point->machine;
    $values = Value::where('point_id', $point->id )->whereBetween('created_at', [$start , $end])->get();
    $data = $values->lists('value')->toArray();
    $time = $values->lists('created_at')->toArray();
    $chart = Charts::create('line', 'highcharts')
        //->view('custom.line.chart.view') // Use this if you want to use your own template
        ->title($machine->name)
        ->ElementLabel($point->name)
        ->labels($time)
        ->values($data)
        ->dimensions(1100,600)
        ->responsive(false);

     $user = Auth::user();
     $topic = new Topic;

    return view('machines.warnshow',compact('point','values','machine','chart','warntime','start','end','user','topic'));
  }

}
