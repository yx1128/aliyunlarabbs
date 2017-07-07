<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Machine;
use App\Models\Topic;
use App\Models\User;
use App\Models\Notification;
use App\Models\Point;
use App\Models\Value;
use Auth;
use Flash;
use Charts;
use App\Activities\UserSubscribedMachine;
use Carbon\Carbon;


class MachinesController extends Controller
{

    public function __construct()
      {
        $this->middleware('auth', ['except' => ['index', 'show']]);
      }

    public function index()
       {
         $machines = Machine::all();
         return view('machines.index', compact('machines'));
       }

    public function show($id)
       {
         $machine = Machine::findOrFail($id);
         $value = Value::where('is_warned', 1)->first();
         $user   = $machine->user;
         $points =  $machine->points;
         $topics = $machine->topics()->withoutDraft()->recent()->paginate(28);
         $authors = $machine->authors;
         return view('machines.show', compact('machine','topics','authors','points','users'));
       }

    public function search(Request $request)
      {
         $num =$request->input('point');
         $start = $request->input('startTime');
         $end = $request->input('endTime');
         if($num != null){
         $id = $request->input('machineid');
         if($start != null && $end != null){
         $values = Value::where('point_id', $num )->whereBetween('created_at', [$start, $end])->get();
       }else{
         $values = Value::where('point_id', $num )->get();
       }
         $points = Point::findOrFail($num);

         $data = $values->lists('value')->toArray();
         $time = $values->lists('created_at')->toArray();
         $machine = Machine::findOrFail($id);
         $chart = Charts::create('line', 'highcharts')
             //->view('custom.line.chart.view') // Use this if you want to use your own template
             ->title( $machine->name )
             ->ElementLabel($points->name)
             ->labels($time)
             ->values($data)
             ->dimensions(1100,600)
             ->responsive(false);
         $user = Auth::user();
         $topic = new Topic;

         return view('machines.search',compact('num','values','id','machine','chart','topic','user','points','start','end'));
       }
       else{
         Flash::error("请选择测点信息");
         return redirect()->back();
       }
      }

      public function warn()
      {
          $values = Value::where('is_warned', 1)->get();
          foreach ($values as $value ){

          $users = $value->point->machine->subscribers;
          Notification::notified('machine_warned', $users, $value);
        }

          return redirect()->back();

      }

    public function subscribe($id)
       {
          $machine = Machine::findOrFail($id);
          Auth::user()->subscriber()->attach($machine->id);
          $machine->increment('subscriber_count', 1);
          Flash::success("关注成功");
          app(UserSubscribedMachine::class)->generate(Auth::user(), $machine);
          return redirect()->back();
       }

     public function unsubscribe($id)
       {
          $machine = Machine::findOrFail($id);
          Auth::user()->subscriber()->detach($machine->id);
          $machine->decrement('subscriber_count', 1);
          Flash::success("成功取消关注");
          app(UserSubscribedMachine::class)->remove(Auth::user(), $machine);
          return redirect()->back();
       }
}
