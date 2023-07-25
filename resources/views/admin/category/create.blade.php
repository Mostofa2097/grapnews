@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new Category') }}</div>

                <div class="card-body">
                    <a href="{{route('category.index')}}" class="btn btn-info">All Catagories</a>
                    <br><br>


                    <form method="post" action="{{route('category.store')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Name</label>
                          z
                          <input type="text" class="form-control  @error('category_name') is-invalid @enderror"  name="category_name" value="{{ old('category_name') }}" required 
                          placeholder="Enter Category Name">
                          @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
