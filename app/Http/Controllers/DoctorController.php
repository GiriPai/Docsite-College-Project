<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Category;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::with('category','hospital')->get();
        return view('doctor.index')->with('doctors',$doctors);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $hospitals = Hospital::all();
        return view('doctor.create',compact('categories','hospitals'));
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
        'name' => 'required',
        'category_id' => 'required',
        'hospital_id' => 'required',
        'designation' => 'required',
        'rank' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'about' => 'required'
        ]);


        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->category_id = $request->category_id;
        $doctor->hospital_id = $request->hospital_id;
        $doctor->designation = $request->designation;
        $doctor->rank = $request->rank;
        $doctor->email = $request->email;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->about = $request->about;
        $doctor->save();
        
        if($doctor){
            return redirect()->route('doctors.index')
                ->with('success','Doctor has been added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $categories = Category::all();
        $hospitals = Hospital::all();
        return view('doctor.edit',compact('categories', 'hospitals', 'doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $this->validate($request,[
        'name' => 'required',
        'category_id' => 'required',
        'hospital_id' => 'required',
        'designation' => 'required',
        'rank' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'about' => 'required'
        ]);


        $doctor->name = $request->name;
        $doctor->category_id = $request->category_id;
        $doctor->hospital_id = $request->hospital_id;
        $doctor->designation = $request->designation;
        $doctor->rank = $request->rank;
        $doctor->email = $request->email;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->about = $request->about;
        $doctor->save();
        
        if($doctor){
            return redirect()->route('doctors.index')
                ->with('success','Doctor has been updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')
                ->with('success','Doctor has been deleted!');

    }

    public function showByCategory(Category $category){
        $doctors = Doctor::with('hospital')->where('category_id',$category->id)->get();
        return view('doctor.showByCategory')->with('doctors',$doctors);
    }
}
