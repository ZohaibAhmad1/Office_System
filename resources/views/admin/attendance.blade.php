@extends('layouts.master')
@section('title')

Attendance of web it
@endsection

@section('content')


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      
      </div>
      
        <form action="/save/attendance" method="POST">
        @csrf 
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Employ Name</label>
            <input type="text" name="EName" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Employ ID </label>
            <input type="text" name="EmId" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Employ Status </label>
            <input type="text" name="status" class="form-control" id="recipient-name">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SAVE</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal DElete -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="delete_modal_form" method="POST">
                        @csrf
                        @method('DELETE')
                        
                       
      <div class="modal-body">
        <input type="hidden" id="delete_attendance_id">
        <h5>Are you sure.? You want to delete this data?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">yes. Delete It</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Employee Table
                
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" >ADD</button>

                </h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                      Employ_Id
                      </th>
                      <th >
                      Attendance_Status
                      </th>
                      <th>
                      EDIT
                      </th>
                      <th >
                      DELETE
                      </th>
                    </thead>
                    <tbody>
                    @foreach ($attendance as $data)
                      <tr>
                      <td>
                          {{$data->id}}
                        </td>
                        <td>
                        {{$data->name}}
                        </td>
                        <td>
                        {{$data->EmployId}}
                        </td>
                        <td>
                        {{$data->attendanceStatus}}
                        </td>
                        <td>
                        <a href="{{url('/attendance-us',$data->id)}}" class="btn btn-success">Edit</a>
                        </td>

                        <td>
                        <a href="javascript:void(0)" class="btn btn-danger deletebtn" >Delete</a>

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
<script>
$(document).ready( function () {
    $('#datatable').DataTable();

    $('#datatable').on('click','.deletebtn', function(){
$tr=$(this).closest('tr');
    var data =  $tr.children("td").map(function(){

        return $(this).text();
      }).get();

      console.log(data);
      $('#delete_attendance_id').val(data[0]);
      $('#delete_modal_form').attr('action','/attendance/delete/'+data[0]);
      $('#deletemodalpop').modal('show');



    });


    
});
</script>


@endsection

@section('scripts')

