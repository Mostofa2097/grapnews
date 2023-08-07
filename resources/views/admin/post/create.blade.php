@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add New Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Post Title</label>
                      <input type="text" class="form-control" name="title"  placeholder="Post Title" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Category</label>
                       <select name="subcategory_id" class="form-control">
                        <option disabled selected>Choose Category</option>
                        @foreach ($category as $cat)
                        @php
                            $subcategories = DB::table('subcategories')->where('category_id',$cat->id)->get();
                        @endphp
                            <option value="">{{$cat->category_name}}</option>
                            @foreach ($subcategories as $sub)
                                <option value="{{$sub->id}}">---{{$sub->subcategory_name}}</option>
                            @endforeach
                        @endforeach
                       </select>
                    </div>
                    {{-- <div class="form-group">
                      <label for="exampleInputPassword1">SubCategory</label>
                       <select name="subcategory_id" class="form-control">
                        <option value="">Examole one</option>
                       </select>
                    </div> --}}

                    <div class="form-group">
                      <label for="exampleInputEmail1">Post Date</label>
                      <input type="date" class="form-control" name="post_date" >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Tags</label>
                      <input type="text" class="form-control" name="tags" >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea name="description" class="form-control" rows="4"></textarea>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="status" value="1">
                      <label class="form-check-label" for="exampleCheck1">published now</label>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div> 
        </div>
    </div>
</div>
@endsection
