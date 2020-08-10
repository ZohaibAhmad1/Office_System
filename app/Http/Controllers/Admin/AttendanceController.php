<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::all();
        return view('admin.attendance')
         ->with('attendance',$attendance)
        ;
    }
    public function store(Request $request)
    {
        $attendance = new Attendance;


        $attendance->name = $request->input('EName');
        $attendance->EmployId = $request->input('EmId');
        $attendance->attendanceStatus = $request->input('status');
        $attendance->save();


        return redirect('/attendance')->with('status','Data Added for Attendance');
    }
    public function edit($id)
    {
        $attendance=Attendance::findOrFail($id);
        return view('admin.attendance.edit')->with('attendance',$attendance);
    }
    public function update(Request $request,$id){
        $attendance=Attendance::findOrFail($id);
        $attendance->name = $request->input('EName');
        $attendance->EmployId = $request->input('EmId');
        
        $attendance->update();

        return redirect('attendance')->with('status','Data Update for Attendance');
 
    }
    public function delete($id){
        $attendance = Attendance ::findOrFail($id);
        $attendance->delete();
        return redirect('/attendance')->with('status','Data Delete for Attendance');


    }
}
