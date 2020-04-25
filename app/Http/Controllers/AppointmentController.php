<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::with('doctor')->where('patient_id',Auth::user()->id)->get();
        // return $appointments;
        return view('appointments.index')->with('appointments',$appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Doctor $doctor)
    {
        return view('appointments.create')->with('doctor',$doctor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'doctor_id' => 'required',
            'time' => 'required',
            'date' => 'required'
        ]);

        $appointment = new Appointment();
        $appointment->patient_id = Auth::user()->id;
        $appointment->doctor_id  = $request->doctor_id;
        $appointment->time = $request->time;
        $appointment->date = $request->date;
        $appointment->save();
        if($appointment){
            return redirect()->route('appointments.index')
                ->with('success','Your appointment has been fixed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')
                ->with('success','Your appointment has been cancelled!');
    }

    public function showAll()
    {
        $appointments = Appointment::with('doctor','patient')->get();
        // return $appointments;
        return view('appointments.showAll')->with('appointments',$appointments);
    }
}
