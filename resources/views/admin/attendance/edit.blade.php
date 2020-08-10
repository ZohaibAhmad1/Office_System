@extends('layouts.master')
@section('title')

Attendance edit
@endsection

@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<div class="card-title">

<h4>
Attendance - edit data

</h4>
<form action="{{url('attendance/update/'.$attendance->id)}}" method="POST">
        @csrf 
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Employ Name</label>
            <input type="text" name="EName" class="form-control" value="{{$attendance->name}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Employ ID </label>
            <input type="text" name="EmId" class="form-control" value="{{$attendance->EmployId}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Employ Status </label>
            <input type="text" name="status" class="form-control" value="{{$attendance->attendanceStatus}}">
          </div>
          <div class="modal-footer">
        <a href="{{url('attendance')}}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">UPDATE</button>
      </div>
        </form>
</div>

</div>

</div>

</div>
</div>

@endsection