@extends('layouts.adminmenu')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>You have {{$count}} new Message(s)</h2>
                <table class="table table-sm table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Change status</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        @if( $message['status'] == 'new')
                            <tr class="green">
                        @else
                            <tr>
                                @endif
                                <th scope="row">{{$message['id']}}</th>
                                <td>{{$message['name']}}</td>
                                <td>{{$message['email']}}</td>
                                <td>{{$message['message']}}</td>
                                <td>{{$message['status']}}</td>
                                <td>{{$message['created_at']}}</td>
                                @if($message['status'] == 'new')
                                    <td><a href="{{route('make.message.seen',$message)}}">Make Seen</a></td>
                                @else
                                    <td><a href="{{route('make.message.new',$message)}}">Make New</a></td>
                                @endif
                                <td><a href="{{route('message.delete',$message)}}">Delete</a></td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
