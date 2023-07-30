@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new subCategory') }}</div>
                <div class="card-body">                
                    <form method="post" action="{{route('subcategory.store')}}">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">coose Category</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $row)
                                    <option value="{{$row->id}}">{{$row->category_name}}</option>
                                @endforeach
                            </select>

                            {{-- <input type="text" class="form-control  @error('category_name') is-invalid @enderror"  name="category_name" value="{{ old('category_name') }}" required 
                            placeholder="Enter Category Name">
                            @error('category_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror --}}
                          </div>
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1">subCategory Name</label>
                          <br>
                          <input type="text" class="form-control  @error('subcategory_name') is-invalid @enderror"  name="subcategory_name" value="{{ old('subcategory_name') }}" required 
                          placeholder="Enter Category Name">
                          @error('subcategory_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
