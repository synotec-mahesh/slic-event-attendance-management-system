<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventFormRequest;
use App\Imports\EventImport;
use App\Models\Event;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{
    public function index(){

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

        return redirect()->back()->with('message', 'Added Successfully');
    }

    public function view(){
        $events = Event::all();
        return view('backend.admin.event.view',compact('events'));
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

        return redirect()->back()->with('message', 'Updated Successfully'); 
    }

    
    public function destroy($eventId)
    {
        Event::where('id', $eventId)->delete();
        return redirect()->back();
    }
}
