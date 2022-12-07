<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Event;
use Illuminate\Http\Request;
use Response;

class ForntendEventController extends Controller
{
    public function index($eventId)
    {

        $events = Event::find($eventId);
        return view('frontend.event.index', compact('events'));

        // return Response::json(array(
        //     'events' => $events,
        // ));
    }



    // public function checkUser($eventId)
    // {
    //     $events = Event::find($eventId);
    //     $attendances= $events->attendance;
    // }


    public function checkUser(Request $request, $eventId)
    {
        dd($eventId);
        //     $events = Event::where('id',$eventId)->first();
        //     $attendance= $events->attendance;

        //     // $attendance->advisor_code = $request->advisor_code;
        //     // $attendance->nic = $request->nic;


        //    $request->validate([
        //         'advisor_code' => 'required',
        //         'nic' => 'required',
        //     ]);

        //     $attendances = $request->only('advisor_code', 'nic');

        //     if ($attendance->attempt($attendances)) {
        //         return redirect()->back()->with('message','Successfully');
        //     }

        //     return redirect()->back()->with('message','Oppes! You have entered invalid');


        // this will automatically return a 422 error response when request is invalid

        $this->validate($request, ['advisor_code' => 'required']);

        // below is executed when request is valid
        $advisor_code = $request->advisor_code;

        return response()->json([
            'message' => "Welcome $advisor_code"
        ]);
    }
}
