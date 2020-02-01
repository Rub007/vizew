@extends('layouts.adminmenu')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('categories.create')}}">Add Category</a>
                <table class="table table-sm table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <th>{{$category->name}}</th>
                            <th>{{$category->created_at}}</th>
                            <th>{{$category->updated_at}}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
