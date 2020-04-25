
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
                            
                            <li class="breadcrumb-item active">Doctors</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Doctors</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        @include('layouts.flash-messages')
        

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class ="card-header"> <h4 class="header-title">List of All Doctors
                    @if(Auth::user()->role == 'admin')
                        <a href="{{route('doctors.create')}}"><button class="btn btn-primary float-right" >Add New</button></h4> </a>
                    @endif
                    </div>
                    <div class="card-body">

                        <table id="key-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Specialization</th>
                                    <th>Hospital</th>
                                    <th>Actions</th>
                                   
                                </tr>
                            </thead>
                           
                            <tbody>
                                @foreach($doctors as $doctor)
                                    <tr>
                                        <td>{{$doctor->rank}}</td>
                                        <td>{{$doctor->name}}</td>
                                        <td>{{$doctor->email}}</td>
                                        <td>{{$doctor->phone}}</td>
                                        <td>{{$doctor->category->name}}</td>
                                        <td>{{$doctor->hospital->name}}</td>
                                        @if(Auth::user()->role == 'admin')
                                        <td>
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{  route('doctors.edit',[$doctor->id])}}"> <button type="submit" class="btn btn-icon btn-sm waves-effect waves-light btn-info" > <i class="fas fa-pen"></i> </button>
                                                </div>

                                                <div class="col-md-3">
                                                    <form method="POST" action="{{route('doctors.destroy', [$doctor->id])}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        
                                                            <button type="submit" class="btn btn-icon waves-effect waves-light btn-danger btn-sm" > <i class="fas fa-times"></i> </button>
                                                       
                                                    </form>
                                                </div>
                                            </div>    
                                        </td>  
                                        @endif   

                                        @if(Auth::user()->role == 'patient')
                                        <td>
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{  route('appointments.create',[$doctor->id])}}"> <button type="submit" class="btn btn-icon btn-sm waves-effect waves-light btn-info" > <i class="fas fa-calendar-check"></i> </button>
                                                </div>
                                            </div>    
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