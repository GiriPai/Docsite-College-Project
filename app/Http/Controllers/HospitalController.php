<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Category;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::with('category')->get();

        return view('hospital.index')->with('hospitals',$hospitals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('hospital.create')->with('categories', $categories);
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
        'rank' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'about' => 'required'
        ]);


        $hospital = new Hospital();
        $hospital->name = $request->name;
        $hospital->category_id = $request->category_id;
        $hospital->rank = $request->rank;
        $hospital->email = $request->email;
        $hospital->address = $request->address;
        $hospital->phone = $request->phone;
        $hospital->about = $request->about;
        $hospital->save();
        
        if($hospital){
            return redirect()->route('hospitals.index')
                ->with('success','Hospital has been added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        $categories = Category::all();

        return view('hospital.edit',compact('categories', 'hospital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        $this->validate($request,[
        'name' => 'required',
        'category_id' => 'required',
        'rank' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'about' => 'required'
        ]);

        $hospital->name = $request->name;
        $hospital->category_id = $request->category_id;
        $hospital->rank = $request->rank;
        $hospital->email = $request->email;
        $hospital->address = $request->address;
        $hospital->phone = $request->phone;
        $hospital->about = $request->about;
        $hospital->save();
        
        if($hospital){
            return redirect()->route('hospitals.index')
                ->with('success','Hospital has been updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
         return redirect()->route('hospitals.index')
                ->with('success','Hospital has been deleted!');
    }

    public function showByCategory(Category $category){
        $hospitals = Hospital::with('category')->where('category_id',$category->id)->get();
        return view('hospital.showByCategory')->with('hospitals',$hospitals);
    }
}
