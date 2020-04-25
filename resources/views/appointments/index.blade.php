
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
                            
                            <li class="breadcrumb-item active">My Appointments</li>
                        </ol>
                    </div>
                    <h4 class="page-title">My Appointments</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        @include('layouts.flash-messages')

        <div class="row">
            <div class="col-12">
                <div class="card">
                     
                    {{-- <div class ="card-header"> <h4 class="header-title">List of All Appointments
                        @if(Auth::user()->role == 'admin')
                        <a href="{{route('categories.create')}}"><button class="btn btn-primary float-right" >Add New</button></h4> </a>
                        @endif
                    
                    </div> --}}
                    <div class="card-body">

                        <table id="key-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    @if(Auth::user()->role == 'patient')
                                    <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{$appointment->doctor->name}}</td>
                                    <td>{{$appointment->date}}</td>
                                    <td>{{$appointment->time}}</td>
                                    <td>{!!(\Carbon\Carbon::now() > $appointment->date." ".$appointment->time) ? '<span class="badge badge-danger">Completed</span>' : '<span class="badge badge-success">Open</span>'!!}
                                   </td>
                                    @if(Auth::user()->role == 'patient')
                                    <td>
                                        <form method="POST" action="{{route('appointments.destroy', [$appointment->id])}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-icon waves-effect waves-light btn-danger btn-xs" > <i class="fas fa-times"></i> </button>
                                        </form>
                                    </td>    
                                    @endif                                
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div>

</div> 
@endsection