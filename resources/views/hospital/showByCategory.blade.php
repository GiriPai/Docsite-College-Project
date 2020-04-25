
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
                    <div class ="card-header"> <h4 class="header-title">List of Hospitals

                    </div>
                    <div class="card-body">

                        <table id="key-datatable" class="table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>

                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach($hospitals as $hospital)
                                    <tr>
                                        <td>{{$hospital->rank}}</td>
                                        <td>{{$hospital->name}}</td>
                                        <td>{{$hospital->email}}</td>
                                        <td>{{$hospital->phone}}</td>
                                        <td>{{$hospital->address}}</td>                        
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