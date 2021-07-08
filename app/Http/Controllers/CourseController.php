<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    private $htmlSelect;
    public function __construct()
    {
        $this->htmlSelect = '';
    }
    public function Index()
    {
        $data = Course::where('level', 0)
            ->where('parent_id', 0)
            ->paginate(10);
        return view('admin.course.showCourse', ["id" => 0, "data" => $data]);
    }
    public function Show($id)
    {
        $parent = Course::where('id', $id)->first();
        $data = Course::where('level', $parent['level'] + 1)
            ->where('parent_id', $id)
            ->paginate(10);
        return view('admin.course.showCourse', ["id" => $id, "data" => $data]);
    }
    public function Create()
    {
        $htmlOption = $this->courseParent(0);
        return view('admin.course.createCourse', ["htmlOption" => $htmlOption]);
    }
    public function Store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'bail|required',
        ]);
        $level = 0;
        if ($request->parent != 0)  {
            $parent = Course::where('id', $request->parent)->first();
            $level = $parent['level'] + 1;
        }
        $arr = [
            'title' => $request->title,
            'description' => $request->description,
            'level' => $level,
            'parent_id' => $request->parent
        ];
        $data = Course::create($arr);
        return redirect()->route('course.Create')->with(['data' => $data]);
    }
    public function Edit($id)
    {
        $data = Course::where('id', $id)->first();
        if(!$data) return redirect()->route('course.Index');
        return view('admin.course.editCourse', ['data' =>  $data]);
    }
    public function Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'bail|required',
        ]);
        $arr = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        Course::where('id',$id)->update($arr);
        return redirect()->route('course.Edit',['id' => $id])->with(['success' => true]);
    }
    public function Delete($id)
    {
        $data = Course::where('id', $id)->first();
        if(!$data) return redirect()->route('course.Index');
        return view('admin.course.deleteCourse', ['data' =>  $data]);
    }
    public function Destroy($id)
    {
        $response =  Course::where('id', $id)->first();
        Course::where('parent_id',$id)->update([
            'parent_id' => $response['parent_id'],
            'level' => $response['level']
        ]);
        Course::where('id', $id)->delete();
        return redirect()->route('course.Index');
    }
    public function courseParent($id, $text = '', $parent = '')
    {
        $data = Course::where('parent_id', $id)
            ->where('level', '<=', 2)
            ->get();
        foreach ($data as $key => $value) {
            $arrow = $text != '' ? $text . '> ' : $text . ' ';
            $selected = $parent == $value['id'] ? "selected" : "";
            
            $this->htmlSelect .= '<option value="' . $value['id'] . '" ' . $selected . '>' . $arrow . $value['title'] . '</p>';
            $this->courseParent($value['id'], $text . '----', '');
        }
        return $this->htmlSelect;
    }
}
