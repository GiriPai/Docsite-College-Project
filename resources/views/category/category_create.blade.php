
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
                        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
                <h4 class="page-title">Add New Category</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    
    @include('layouts.flash-messages')
   

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
           
            <form role="form" method="post" action="{{route('categories.store')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter new category">
                   
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    

                    <textarea class="form-control" name="description" placeholder="Enter description for the category"></textarea>
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