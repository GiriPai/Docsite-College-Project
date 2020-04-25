
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
                            
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Categories</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        @include('layouts.flash-messages')

        <div class="row">
            <div class="col-12">
                <div class="card">
                     
                    <div class ="card-header"> <h4 class="header-title">List of All Categories
                        @if(Auth::user()->role == 'admin')
                        <a href="{{route('categories.create')}}"><button class="btn btn-primary float-right" >Add New</button></h4> </a>
                        @endif
                    
                    </div>
                    <div class="card-body">

                        <table id="key-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                   
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>

                                        <td>
                                            <form method="POST" action="{{route('categories.destroy', [$category->id])}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                
                                                    <button type="submit" class="btn btn-icon waves-effect waves-light btn-danger" > <i class="fas fa-times"></i> </button>
                                               
                                            </form>
                                        </td>                                    
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