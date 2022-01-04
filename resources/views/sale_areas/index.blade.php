@extends('layouts.app')
@section('content')
    {{-- sale_areas with breadscrumb --}}
    {{-- has name, location, size, price --}}
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sale Areas</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Sale Areas
                                <a href="{{ route('sale_areas.create') }}" class="btn btn-primary float-right">Add Sale
                                    Area</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            {{-- if success --}}
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Location</th>
                                                    <th>Size</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sale_areas as $sale_area)
                                                    <tr>
                                                        <td>{{ $sale_area->name }}</td>
                                                        <td>{{ $sale_area->location }}</td>
                                                        <td>{{ $sale_area->size }}</td>
                                                        <td>{{ $sale_area->price }}</td>
                                                        <td>
                                                            <a href="{{ route('sale_areas.edit', $sale_area->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                            <form
                                                                action="{{ route('sale_areas.destroy', $sale_area->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
