<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Student;
use App\Models\Courses;
use App\Models\Registration;
use Validator;

class CourseHandlingController extends Controller {

	public function CoursesList(){
		$courses = Courses::all();

		$courses_array[] = array();
		foreach ($courses as $key => $course) {
			$course_available = $this->CourseAvailablity($course->id);
			$courses_array[$key]['name'] = $course->name; 
			$courses_array[$key]['course_available'] = $course_available; 
		}

		return response()->json(['courses' => $courses_array]);
	}

	public function RegisterUserCourse(Request $request){
		$validator = Validator::make($request->all(), [
            'student_id' =>  'required|exists:students,id',
            'course_id' =>  'required|exists:courses,id',
            'registered_on' =>  'required|date_format:"Y-m-d H:i"',
        ]);
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        } else {
        	$input  =   $request->all();
			$student_id = $request->student_id;
            $course_id = $request->course_id;

            //check if the user is already register with the verry course
            $prev_reg = Registration::where('student_id',$student_id)->where('course_id',$course_id)->first();
            if($prev_reg) {
            	return response()->json(['User is already register with this course'], 200);
            } else {
            	$course = Courses::where('id',$course_id)->first();
            	$course_available = $this->CourseAvailablity($course->id);
            	if($course_available) {
            		$registered_on = $request->registered_on;
					$registeration = Registration::create($input);
					return response()->json(['registeration' => $registeration]);
            	} else {
					return response()->json(['Course is not available for registration'], 200);
            	}
            }
        }
	}

	//check if the course is available for registration
	private function CourseAvailablity($course_id){
		$course = Courses::where('id',$course_id)->with('CourseRegistrations')->first();
		$course_available = false;
		if(count($course->CourseRegistrations)){
			if(count($course->CourseRegistrations) < $course->capacity){
				$course_available = true;
			} else{
				$course_available = false;
			}
		} else {
			$course_available = true;
		}
		return $course_available;
	}
}