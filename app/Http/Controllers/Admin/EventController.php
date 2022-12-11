<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceFormRequest;
use App\Http\Requests\EventFormRequest;
use App\Imports\EventImport;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{
    public function index()
    {

        return view('backend.admin.event.index');
    }

    public function store(EventFormRequest $request)
    {


        $validateData = $request->validated();

        $event = new Event();
        $event->title = $validateData['title'];
        $event->date = $validateData['date'];
        $event->venue = $validateData['venue'];
        $event->message = $validateData['message'];
        $event->input_text = $validateData['input_text'];


        $event->save();

        $eventId =  $event->id;
        Excel::import(new EventImport($eventId), $request->file('attendance_file'));
      

        return redirect()->back()->with('message', 'Successfully!');
    }

    public function view()
    {
        $events = Event::all();
        return view('backend.admin.event.view', compact('events'));
    }


    public function edit($eventId)
    {
        $event = Event::find($eventId);
        return view('backend.admin.event.edit', compact('event'));
    }

    public function update(EventFormRequest $request, $eventId)
    {
        $validateData = $request->validated();

        $event = Event::findOrFail($eventId);
        $event->title = $validateData['title'];
        $event->date = $validateData['date'];
        $event->venue = $validateData['venue'];
        $event->message = $validateData['message'];
        $event->input_text = $validateData['input_text'];

        $event->update();

        return redirect('admin/view-event')->with('message', 'Updated Successfully!');
    }


    public function destroy($eventId)
    {
        Event::where('id', $eventId)->delete();
        return redirect()->back();
    }

    public function attendance($eventId)
    {
        $event = Event::findOrFail($eventId);
        $attendances = $event->attendance;

        return view('backend.admin.event.attendance.view', compact('attendances', 'event'));
    }

    public function attendanceEdit($eventId, $attendanceId)
    {

        $attendance = Attendance::find($attendanceId);
        $event = Event::find($eventId);
        return view('backend.admin.event.attendance.edit', compact('attendance', 'event'));
    }

    public function attendanceUpdate(AttendanceFormRequest $request, $eventId, $attendanceId)
    {
        $validateData = $request->validated();

        $attendances = Attendance::findOrFail($attendanceId);

        $attendances->advisor_code = $validateData['advisor_code'];
        $attendances->team_leader = $validateData['team_leader'];
        $attendances->group_leader = $validateData['group_leader'];
        $attendances->epf = $validateData['epf'];
        $attendances->name = $validateData['name'];
        $attendances->nic = $validateData['nic'];
        $attendances->branch = $validateData['branch'];
        $attendances->region = $validateData['region'];
        $attendances->table_no = $validateData['table_no'];
        $attendances->chek_in_time = $validateData['chek_in_time'];


        $attendances->update();

        return redirect('admin/event/' . $eventId . '/attendance/')->with('message', 'Updated Successfully!');
    }


    public function attendanceDestroy($attendanceId)
    {
        Attendance::where('id', $attendanceId)->delete();
        return redirect()->back();
    }


    public function checkAttendance(Request $request, $eventId)
    {
        $checkTimeAttendances = Attendance::where('event_id',$eventId)->whereNotNull('chek_in_time')->get();
        $categories = Category::all();
      
        return view('backend.admin.event.check-time-attendance',compact('checkTimeAttendances','categories','eventId'));
    }

    public function checkFilter(Request $request,$eventId)
    {
       
        if ($request->filter == 'advisor_code'){
            $checkTimeAttendances = Attendance::where('event_id',$eventId)->whereNotNull('chek_in_time')->whereNotNull('advisor_code')->get();
            $categories = Category::all();
            return view('backend.admin.event.filter',compact('checkTimeAttendances','categories','eventId'));
        }
       
        elseif($request->filter == 'team_leader')
        {
            $checkTimeAttendances = Attendance::where('event_id',$eventId)->whereNotNull('chek_in_time')->whereNotNull('team_leader')->get();
            $categories = Category::all();
            return view('backend.admin.event.filter',compact('checkTimeAttendances','categories','eventId'));
        }
        elseif($request->filter == 'group_leader')
        {
            $checkTimeAttendances = Attendance::where('event_id',$eventId)->whereNotNull('chek_in_time')->whereNotNull('group_leader')->get();
            $categories = Category::all();
            return view('backend.admin.event.filter',compact('checkTimeAttendances','categories','eventId'));
        }
       
        elseif($request->filter == 'epf')
        {
            $checkTimeAttendances = Attendance::where('event_id',$eventId)->whereNotNull('chek_in_time')->whereNotNull('epf')->get();
            $categories = Category::all();
            return view('backend.admin.event.filter',compact('checkTimeAttendances','categories','eventId'));
        }
        elseif($request->filter == 'all')
        {
            $checkTimeAttendances = Attendance::where('event_id',$eventId)->whereNotNull('chek_in_time')->get();
            $categories = Category::all();
            return view('backend.admin.event.filter',compact('checkTimeAttendances','categories','eventId'));
        }
        
    }

}
