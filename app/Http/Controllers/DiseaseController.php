<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Category;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases = Disease::with('category')->get();
        return view('disease.index')->with('diseases',$diseases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('disease.create')->with('categories', $categories);
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
        'cause' => 'required',
        'description' => 'required',
        'symptoms' => 'required'
        ]);


        $disease = new Disease();
        $disease->name = $request->name;
        $disease->category_id = $request->category_id;
        $disease->cause = $request->cause;
        $disease->description = $request->description;
        $disease->symptoms = $request->symptoms;
        $disease->save();
        
        if($disease){
            return redirect()->route('disease.index')
                ->with('success','Disease has been added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Disease $disease)
    {
        $categories = Category::all();
        return view('disease.edit',compact('categories','disease'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disease $disease)
    {
        $this->validate($request,[
        'name' => 'required',
        'category_id' => 'required',
        'cause' => 'required',
        'description' => 'required',
        'symptoms' => 'required'
        ]);

        $disease->name = $request->name;
        $disease->category_id = $request->category_id;
        $disease->cause = $request->cause;
        $disease->description = $request->description;
        $disease->symptoms = $request->symptoms;
        $disease->save();
        
        if($disease){
            return redirect()->route('disease.index')
                ->with('success','Disease has been updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disease $disease)
    {
        $disease->delete();
        return redirect()->route('disease.index')
                ->with('success','Disease has been deleted!');
    }
}
