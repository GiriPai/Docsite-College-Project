
@extends('layouts.master')

@section('content')
<div class="content">

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('doctors.index')}}">Doctors</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <h4 class="page-title">Add New Doctor</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    
    @include('layouts.flash-messages')
   

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
           
            <form role="form" method="post" action="{{route('doctors.store')}}">
                @csrf
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id">
                    <option value="">-- Select --</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
                </div>

                 <div class="form-group">
                    <label for="hospital_id">Hospital</label>
                    <select class="form-control" name="hospital_id">
                    <option value="">-- Select --</option>
                    @foreach($hospitals as $hospital)
                        <option value="{{$hospital->id}}">{{ $hospital->name }}</option>
                    @endforeach
                </select>
                </div>
                

                <div class="form-group">
                    <label for="name">Doctor Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Doctor name">
                </div>

                <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Doctor's Designation">
                </div>

                <div class="form-group">
                    <label for="rank">Rank</label>
                    <input type="number" class="form-control" id="rank" name="rank" placeholder="Enter Doctor's Rank">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" name="address" placeholder="Enter address"></textarea>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                </div>

                <div class="form-group">
                    <label for="about">About</label>
                    <textarea class="form-control" name="about" placeholder="Enter few words about the doctor"></textarea>
                </div>


            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- end col -->

</div>

   
    
</div>

</div> 
@endsection