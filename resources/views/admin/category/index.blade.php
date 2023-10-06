@extends('layouts.app')

@section('content')

{{-- <div class="content-wrapper">
<h1>Mostofa Kamal</h1>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Category') }}</div>

                <div class="card-body">
                    <a href="{{route('category.create')}}" class="btn btn-info">Add Catagories</a>
                   <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>SI.</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key => $row)
                            
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->category_name}}</td>
                            <td>{{$row->category_slug}}</td>
                            <td>
                                <a href="{{route('category.edit',$row->id)}}" class="btn btn-sm btn-info">edit</a>
                                <a href="{{route('category.delete',$row->id)}}" class="btn btn-sm btn-danger">delete</a>
                            </td>

                        </tr>
                    </tbody>
                    @endforeach

                   </table>
                </div>
            </div>
        </div>
    </div>
 </div>  --}}




 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>SI.</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                        
                    </tr>
                  </thead>
                <tbody>
                 
                    <tbody>
                        @foreach ($category as $key => $row)
                            
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->category_name}}</td>
                            <td>{{$row->category_slug}}</td>
                            <td>
                                <a href="{{route('category.edit',$row->id)}}" class="btn btn-sm btn-info">edit</a>
                                <a href="{{route('category.delete',$row->id)}}" class="btn btn-sm btn-danger">delete</a>
                            </td>

                        </tr>
                    </tbody>
                    @endforeach
                    
                </table>
              </div>
              <!-- /.card-body -->
          </div>
        </div>
     </div> 
    </section>


@endsection
