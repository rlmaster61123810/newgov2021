@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale_areas.index') }}"></a></li>
            <li class="breadcrumb-item active" aria-current="page">create</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Create Sale Area</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sale_areas.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location"
                                placeholder="Enter location">
                            @error('location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- size --}}
                        <div class="form-group">
                            <label for="size">Size</label>
                            <input type="text" class="form-control" id="size" name="size" placeholder="Enter size">
                            @error('size')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- price --}}
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
