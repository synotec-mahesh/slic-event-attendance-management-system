<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerFormRequest;
use App\Models\Attendance;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Event;
use Illuminate\Http\Request;
use Response;

class ForntendEventController extends Controller
{
    public function index($eventId)
    {
        $events = Event::find($eventId);
        $categories = Category::all();
        return view('frontend.event.index', compact('events', 'categories'));
    }

    public function checkIn(Request $request)
    {
        if ($request->category == 'advisor_code') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('advisor_code', $request->advisor_code)
                ->where('nic', $request->nic)
                ->first();

            if ($request->event_id == 'event_id' && $request->nic == 'nic' && $request->advisor_code == 'advisor_code') {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error','Attendance'));
            }

        } elseif ($request->category == 'team_leader_code') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('team_leader_code', $request->advisor_code)
                ->where('nic', $request->nic)
                ->first();

            if ($request->event_id == 'event_id' && $request->nic == 'nic' && $request->advisor_code == 'advisor_code') {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error','Attendance'));
            }

        } elseif ($request->category == 'group_leader_code') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('group_leader_code', $request->advisor_code)
                ->where('nic', $request->nic)
                ->first();

            if ($request->event_id == 'event_id' && $request->nic == 'nic' && $request->advisor_code == 'advisor_code') {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error','Attendance'));
            }

        } else {

            $error = 'Your Advisor Code Or NIC Invalid!';
            return view('frontend.event.response', compact('error','Attendance'));
        }



        return view('frontend.event.response', compact('Attendance'));
    }


   
}
