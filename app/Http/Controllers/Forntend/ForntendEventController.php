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
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'bancassurance_sales_officer') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('bancassurance_sales_officer', $request->advisor_code)
                ->where('nic', $request->nic)
                ->first();

            if ($request->event_id == 'event_id' && $request->nic == 'nic' && $request->advisor_code == 'advisor_code') {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'team_leader') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('team_leader', $request->advisor_code)
                ->where('nic', $request->nic)
                ->first();

            if ($request->event_id == 'event_id' && $request->nic == 'nic' && $request->advisor_code == 'advisor_code') {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'group_leader') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('group_leader', $request->advisor_code)
                ->where('nic', $request->nic)
                ->first();

            if ($request->event_id == 'event_id' && $request->nic == 'nic' && $request->advisor_code == 'advisor_code') {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'marketing_executive') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('marketing_executive', $request->advisor_code)
                ->where('nic', $request->nic)
                ->first();

            if ($request->event_id == 'event_id' && $request->nic == 'nic' && $request->advisor_code == 'advisor_code') {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'branch_manager') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('branch_manager', $request->advisor_code)
                ->where('nic', $request->nic)
                ->first();

            if ($request->event_id == 'event_id' && $request->nic == 'nic' && $request->advisor_code == 'advisor_code') {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'regional_manager') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('regional_manager', $request->advisor_code)
                ->where('nic', $request->nic)
                ->first();

            if ($request->event_id == 'event_id' && $request->nic == 'nic' && $request->advisor_code == 'advisor_code') {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'head_office_unit') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('head_office_unit', $request->advisor_code)
                ->where('nic', $request->nic)
                ->first();

            if ($request->event_id == 'event_id' && $request->nic == 'nic' && $request->advisor_code == 'advisor_code') {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } else {

            $error = 'Your Advisor Code Or NIC Invalid!';
            return view('frontend.event.response', compact('error'));
        }



        return view('frontend.event.response', compact('Attendance'));
    }
}
