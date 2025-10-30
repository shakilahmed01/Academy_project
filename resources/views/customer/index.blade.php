@extends('layouts.app')
@section('content')
@section('title','Add Customer')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>Add Customer.....{{ $pageTitle }}</h3>
                    @foreach($customers as $cus)
                    {{$cus->name}}
                    @endforeach
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-label">Name</div>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="form-group">
                            <div class="form-label">Email</div>
                            <input
                                type="text"
                                class="form-control"
                                name="email"
                                placeholder="Enter email"
                            />
                        </div>
                        <div class="form-group">
                            <div class="form-label">Phone</div>
                            <input
                                type="text"
                                class="form-control"
                                name="phone"
                                placeholder="Enter phone"
                            />
                        </div>
                        <div class="form-group">
                            <div class="form-label">Address</div>
                            <textarea
                                type="text"
                                class="form-control"
                                name="address"
                            ></textarea>
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
