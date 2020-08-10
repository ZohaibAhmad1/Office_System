@extends('layouts.master')
@section('title')

Register of web it
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Register Roles</h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Usertype
                      </th>
                      <th>
                        Edit
                      </th>
                      <th >
                        delete
                      </th>
                    </thead>
                    <tbody>
                    @foreach($users as $row)


                    
                      <tr>
                      <td>
                          {{$row->id}}
                        </td>
                      <td>
                          {{$row->name}}
                        </td>
                        
                        <td>
                          {{$row->email}}
                        </td>
                        <td>
                          -{{$row->usertype}}
                        </td>
                        <td>
                          <a href="/role-edit/{{$row->id}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                        <form action="/role-delete/{{$row->id}}" method="post">
                       {{csrf_field()}}
                        @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
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


@endsection

@section('scripts')


@endsection