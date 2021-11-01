<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseDisplayPage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Course $course
     * @return View
     */
    public function __invoke(Course $course)
    {
        return view('courses.show', compact('course'));
    }
}
