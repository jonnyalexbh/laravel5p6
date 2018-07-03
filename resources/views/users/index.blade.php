@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">Users</div>

          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Birth</td>
                  <td>Gender</td>
                  <td>Email</td>
                  <td>Phone</td>
                  <td>Active</td>
                </tr>
              </thead>
              @foreach ($users as $user)
                <tbody>
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->dt_birth }}</td>
                    <td>{{ $user->gender->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->admin }}</td>
                  </tr>
                </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
