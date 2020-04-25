
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
                            
                            <li class="breadcrumb-item active">Hospitals</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Hospitals</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        @include('layouts.flash-messages')
        

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class ="card-header"> <h4 class="header-title">List of All Hospitals
                    @if(Auth::user()->role == 'admin')
                        <a href="{{route('hospitals.create')}}"><button class="btn btn-primary float-right" >Add New</button></h4> </a>
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
                                    @if(Auth::user()->role == 'admin')
                                    <th>Actions</th>
                                    @endif
                                   
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach($hospitals as $hospital)
                                    <tr>
                                        <td>{{$hospital->rank}}</td>
                                        <td>{{$hospital->name}}</td>
                                        <td>{{$hospital->email}}</td>
                                        <td>{{$hospital->phone}}</td>
                                        <td>{{$hospital->category->name}}</td>
                                        @if(Auth::user()->role == 'admin')
                                        <td>
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{  route('hospitals.edit',[$hospital->id])}}"> <button type="submit" class="btn btn-icon waves-effect waves-light btn-info" > <i class="fas fa-pen"></i> </button></a>
                                                </div>

                                                <div class="col-md-3">
                                                    <form method="POST" action="{{route('hospitals.destroy', [$hospital->id])}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        
                                                            <button type="submit" class="btn btn-icon waves-effect waves-light btn-danger" > <i class="fas fa-times"></i> </button>
                                                       
                                                    </form>
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