
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
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-md-4">
            <a href="{{route('hospitals.index')}}">
                <div class="card">
                    <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Hospitals</h5>
                        <p class="card-text">Check here to see the list of top Hospitals</p>
                        
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{route('doctors.index')}}">
                <div class="card">
                    <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Doctors</h5>
                        <p class="card-text">Check here to see the list of top Doctors</p>
                        
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{route('disease.index')}}">
                <div class="card">
                    <img class="card-img-top img-fluid" src="assets/images/small/img-4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Diseases</h5>
                        <p class="card-text">Check here to see the list of all Diseases</p>
                      
                    </div>
                </div>
            </a>
        </div>

    </div>

   
    
</div>

</div> 
@endsection