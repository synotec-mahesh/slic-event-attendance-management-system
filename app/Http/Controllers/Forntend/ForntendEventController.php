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
use Carbon\Carbon;

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


        $id =  $request->event_id;


        if ($request->category == 'advisor_code') {


            $Attendance = Attendance::where('event_id', $request->event_id)->where('nic', $request->nic)->first();

            if ($Attendance) {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
                return view('frontend.event.response', compact('Attendance'));
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'bancassurance_sales_officer') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('nic', $request->nic)
                ->first();

            if ($Attendance) {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
                return view('frontend.event.response', compact('Attendance'));
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'team_leader') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('nic', $request->nic)
                ->first();

            if ($Attendance) {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
                return view('frontend.event.response', compact('Attendance'));
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'group_leader') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('nic', $request->nic)
                ->first();

            if ($Attendance) {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
                return view('frontend.event.response', compact('Attendance'));
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'marketing_executive') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('nic', $request->nic)
                ->first();

            if ($Attendance) {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
                return view('frontend.event.response', compact('Attendance'));
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'branch_manager') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('nic', $request->nic)
                ->first();

            if ($Attendance) {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
                return view('frontend.event.response', compact('Attendance'));
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'regional_manager') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('nic', $request->nic)
                ->first();

            if ($Attendance) {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
                return view('frontend.event.response', compact('Attendance'));
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'head_office_unit') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('nic', $request->nic)
                ->first();

            if ($Attendance) {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
                return view('frontend.event.response', compact('Attendance'));
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } elseif ($request->category == 'epf') {
            $Attendance = Attendance::where('event_id', $request->event_id)
                ->where('nic', $request->nic)
                ->first();

            if ($Attendance) {
                $Attendance->chek_in_time = date('Y-m-d H:i:s');
                $Attendance->update();
                return view('frontend.event.response', compact('Attendance'));
            } else {
                $error = 'Your Advisor Code Or NIC Invalid!';
                return view('frontend.event.response', compact('error', 'Attendance'));
            }
        } else {
         
            $Attendance = Attendance::find($id);

            $error = 'Your Advisor Code Or NIC Invalid!';
            return view('frontend.event.response', compact('error', 'Attendance'));
        }



        return view('frontend.event.response', compact('Attendance'));
    }
}
