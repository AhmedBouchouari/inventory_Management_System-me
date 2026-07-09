@extends('layouts.admin_master')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h1 class="text-center font-weight-light my-4"><b>Edit Customer</b></h1>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ url('/update-customer/' . $customer->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Customer Name</label>
                                            <input class="form-control py-4" name="name" type="text"
                                                value="{{ $customer->name }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Customer Email</label>
                                            <input class="form-control py-4" name="email" type="email"
                                                value="{{ $customer->email }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Company</label>
                                            <input class="form-control py-4" name="company" type="text"
                                                value="{{ $customer->company }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Address</label>
                                            <input class="form-control py-4" name="address" type="text"
                                                value="{{ $customer->address }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1">Phone</label>
                                            <input class="form-control py-4" name="phone" type="text"
                                                value="{{ $customer->phone }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">Update Customer</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
