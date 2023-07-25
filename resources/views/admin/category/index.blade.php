@extends('layouts.app')

@section('content')
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
</div>
@endsection
