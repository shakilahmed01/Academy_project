@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
       {{ session('sucess') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul style="margin: 0;">
            @foreach($errors->all() as $error)
                <li>{{$errror}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>Edit Customer</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$edit->id}}">
                        <div class="form-group">
                            <div class="form-label">Name</div>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                value="{{$edit->name}}"
                            />
                        </div>
                        <div class="form-group">
                            <div class="form-label">Email</div>
                            <input
                                type="text"
                                class="form-control"
                                name="email"
                                value="{{$edit->email}}"
                            />
                        </div>
                        <div class="form-group">
                            <div class="form-label">Phone</div>
                            <input
                                type="text"
                                class="form-control"
                                name="phone"
                                value="{{$edit->phone}}"
                            />
                        </div>
                        <div class="form-group">
                            <div class="form-label">Address</div>
                            <textarea
                                type="text"
                                class="form-control"
                                name="address"
                            >{{$edit->address}}</textarea>
                        </div>
                        <button
                            type="submit"
                            class="btn btn-primary w-100 mt-3"
                        >
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
