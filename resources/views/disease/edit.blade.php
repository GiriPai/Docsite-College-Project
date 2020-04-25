
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
                        <li class="breadcrumb-item"><a href="{{route('disease.index')}}">Disease</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit disease</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    
    @include('layouts.flash-messages')
   

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
           
            <form role="form" method="post" action="{{route('disease.update',[$disease->id])}}">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id">
                    <option value="">-- Select --</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ ($disease->category_id == $category->id)?'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                </div>
                

                <div class="form-group">
                    <label for="name">Disease Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Disease name" value='{{ $disease->name }}'>
                </div>

               <div class="form-group">
                    <label for="cause">Cause</label>
                    <textarea class="form-control" name="cause" placeholder="Enter cause">
                        {{ $disease->cause }}
                    </textarea>
                </div>
    

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter description">
                        {{ $disease->description }}
                    </textarea>
                </div>



                <div class="form-group">
                    <label for="symptoms">Symptoms</label>
                    <textarea class="form-control" name="symptoms" placeholder="Enter few words about the symptoms">
                        {{ $disease->symptoms }}
                    </textarea>
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