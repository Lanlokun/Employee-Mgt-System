
@extends('layouts.main')

@section('content')


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"> Countries  </h1><br/><br/>
        </div>


        <div class="row">
        <div class="card mx-auto">

                <div>
                @if (session()->has('message'))
                        <div class="alert alert-success">
                                {{ session ('message')}}
                        </div>
                @endif
                </div>
                <div class="card-header">
                `<div class="row">

                <div class="col">
                <form method="GET" action="{{ route('countries.index') }}">
                        <div class="form-row align-items-center">
                        <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Name</label>
                        <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search">
                        </div>

                        <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </div>
                        </div>
                        </form>
                        </div>
                        <div>
                        <a href="{{ route('countries.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        </div>
                        </div>

                <div class="card-body">
                <table class="table">
                         <thead>
                                <tr>
                                <th scope="col">#id</th>
                                <th scope="col">Country Code</th>
                                <th scope="col">Country Name</th>
                                <th scope="col">Manage</th>
                                </tr>
                        </thead>
                        <tbody>
                        @foreach ($countries as $country)
                                        
                        <tr>
                        <th scope="row">{{ $country->id }}</th>
                        <td>{{ $country->code }}</td>
                        <td>{{ $country->name }}</td>

                        <td>
                                <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-success"><i class="far fa-edit"></i>

                        </a>
                               
                        </td>
                        <td>
                        <form method="POST" action="{{ route('countries.destroy', $country->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>

                                        </button>
                                </form>

                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                                       
         </div>
        </div>
        </div>

@endsection