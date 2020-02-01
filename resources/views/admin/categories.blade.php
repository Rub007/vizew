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
                        <th scope="col">Color</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
{{--                        <th>{{$loop->index}}</th>--}}
                        <th scope="row">{{$category->id}}</th>
                        <th>{{$category->name}}</th>
                        <th>{{$category->created_at}}</th>
                        <th>{{$category->updated_at}}</th>
                        <th><div style="width: 100px;height: 30px;background-color: {{$category->color}};"></div></th>
                        <th><a href="{{route('categories.edit', $category)}}">Update</a></th>
                        <th>
                            <form action="{{route('categories.destroy',$category)}}" method="post">
                                @csrf
                                {{method_field('delete')}}
                                <input type="submit">
                            </form>
                        </th>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="mt-50">
                    <ul class="pagination justify-content-center">
                        {{$categories->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
