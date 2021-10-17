@extends('layouts.main')

@section('content')


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Users  </h1><br/><br/>
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
                <form method="GET" action="{{ route('users.index') }}">
                        <div class="form-row align-items-center">
                        <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Name</label>
                        <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
                        </div>

                        <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </div>
                        </div>
                        </form>
                        </div>
                        <div>
                        <a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Create</a>
                        </div>
                        </div>
                        </div>

                <div class="card-body">
                <table class="table">
                         <thead>
                                <tr>
                                <th scope="col">#id</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Manage</th>
                                </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                                        
                        <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                             <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success"><i class="far fa-edit"></i>
                        </td>
                        <td>
                        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
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