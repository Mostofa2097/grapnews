@extends('layouts.app')

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>manege post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Posts</li>
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
                        <th>category</th>
                        <th>subcategory</th>
                        <th>Athor</th>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                    </tr>
                  </thead>
                <tbody>
                 
                    <tbody>
                        @foreach ($posts as $key => $row)
                            
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->category_name}}</td>
                            <td>{{$row->subcategory_name}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->post_date}}</td>
                            <td>
                                @if ($row->status==1)
                                    <span class="badge badge-success"> Active</span>
                                    @else
                                    <span class="badge badge-denger">Inactive</span>
                                @endif
                            </td>
                         
                            <td>
                                <a href="{{route('subcategory.edit',$row->id)}}" class="btn btn-sm btn-info">edit</a>
                                <a href="{{route('subcategory.delete',$row->id)}}" class="btn btn-sm btn-danger">delete</a>
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
