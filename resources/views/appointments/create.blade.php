
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
                        <li class="breadcrumb-item"><a href="{{route('appointments.index')}}">Appointments</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <h4 class="page-title">Fix an Appointment</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    
    @include('layouts.flash-messages')
   

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
           
            <form role="form" method="post" action="{{route('appointments.store')}}">
                @csrf

                 <div class="form-group">
                    <label for="doctor_id">Doctor</label>
                    <select class="form-control" name="doctor_id" readonly>
                    <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                </select>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>

                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time">
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