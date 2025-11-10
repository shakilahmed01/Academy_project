@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session('success')) 
                <p class="alert alert-success"> 
                    <p class="text-black">{{ session('success') }}</p> 
                </div> 
                @endif
                <div class="card-header bg-success">
                    <h3>Customer List</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <th scope="row">{{$customer->id}}</th>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->address}}</td>
                                <td><a class="btn btn-primary" href="{{route('customer.edit',$customer->id)}}">Edit</a>
                                    <a class="btn btn-danger mx-2" href="{{route('customer.delete',$customer->id)}}">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        {{$customers->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection