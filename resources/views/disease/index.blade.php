
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
                            
                            <li class="breadcrumb-item active">Disease</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Disease</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        @include('layouts.flash-messages')
        

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class ="card-header"> <h4 class="header-title">List of known diseases
                        @if(Auth::user()->role == 'admin')
                        <a href="{{route('disease.create')}}"><button class="btn btn-primary float-right" >Add New</button></h4> </a>
                        @endif
                    </div>
                    <div class="card-body">

                        <table id="key-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Cause</th>
                                    <th>Specialists</th>
                                    @if(Auth::user()->role == 'admin')
                                    <th>Actions</th>
                                    @endif
                                   
                                </tr>
                            </thead>
                           
                            <tbody>
                                @foreach($diseases as $disease)
                                    <tr>
                                        <td>{{$disease->name}}</td>
                                        <th>{{$disease->category->name}}
                                        <td>{{$disease->cause}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="{{  route('doctors.showByCategory',[$disease->category_id])}}"> <button type="submit" class="btn btn-icon btn-sm waves-effect waves-light btn-primary" > <i class="fas fa-user-md"></i> </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="{{  route('hospitals.showByCategory',[$disease->category_id])}}"> <button type="submit" class="btn btn-icon btn-sm waves-effect waves-light btn-primary" > <i class="fas fa-clinic-medical"></i> </button>
                                                </div>
                                            </div>
                                            
                                        </td>

                                        @if(Auth::user()->role == 'admin')
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="{{  route('disease.edit',[$disease->id])}}"> <button type="submit" class="btn btn-icon btn-sm waves-effect waves-light btn-info" > <i class="fas fa-pen"></i> </button>
                                                </div>

                                                <div class="col-md-3">
                                                    <form method="POST" action="{{route('disease.destroy', [$disease->id])}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        
                                                            <button type="submit" class="btn btn-icon waves-effect waves-light btn-danger btn-sm" > <i class="fas fa-times"></i> </button>
                                                       
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