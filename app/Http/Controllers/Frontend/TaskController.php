<?php
namespace App\Http\Controllers\Frontend;
use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        // dd('dfghj');
        $tasks = Task::all();
        $tasks = Task::orderBy('name','desc')->get();
        // where('status',1)
        // ->orderBy('name','desc')
        // ->take(1)
        // ->get();
        return view('home')->with([
            'tasks' =>$tasks]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('Đây là hàm create');
         return view('create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $task->name = 'Học Laravel';
        // $task->status = 1;
        // $task->deadline = '2019-12-17 23:00:00';
       //  $name = $request->get('name');
       //  $content = $request->get('content');
       //  $deadline = $request->get('deadline');
       //  $task = new Task();
       //  $task->name = $name;
       //  $task->content = $content;
       //  $task->deadline = $deadline;
       //  $task->status = 1;
       //  $task->updated_at = null;
       //  $task->save();

       // return redirect()->route('task.index'); 
        // $input = $request->only(['name','deadline']);
        // dd($input);
         // Lấy dữ liệu từ Form
        $name = $request->get('name');
        $deadline = $request->get('deadline');
        $content = $request->get('content');
        $status = $request->get('status');
        $prioritize = $request->get('prioritize');
        // Tạo dữ liệu mới 
        $task = new Task();
        $task->name = $name;
        $task->status = $status;
        $task->content = $content;
        $task->deadline = $deadline;
        $task->prioritize = $prioritize;
        $task->updated_at = null;
        $task->save();

        return redirect()->route('task.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('Đây là phần detail');
        $task = Task::find($id);
        return view('show')->with([
            'task' => $task
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // dd('Edit có Id là : = '.$id);
              $tasks = Task::all();
         $task = Task::find($id);
         return view('edit')->with([
            'tasks' => $tasks,
            'task' => $task
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd('aaa');
        // $url = $request->fulexUrl();
        // dd($url);
        // $task = Task::find($id);
        // $task->name = 'Học Laravel 3';
        // $task->status = 1;
        // $task->save();
        // dd('Update có Id là : '.$id);
        
        // Lấy dữ liệu từ Form
        $name = $request->get('name');
        $deadline = $request->get('deadline');
        $content = $request->get('content');
        $status = $request->get('status');
        $prioritize = $request->get('prioritize');
        // Cập nhật
        $task = Task::find($id);
        $task->name = $name;
        $task->status = $prioritize;
        $task->content = $content;
        $task->deadline = $deadline;
        $task->prioritize = $prioritize;
        $task->save();

        return redirect()->route('task.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.index');
        // dd('Xóa có Id là : '.$id);
    }
    public function complete($id){
        // dd('Complete có Id là : '.$id);
         $task = Task::find($id);
        $task->status = 2;
        $task->save();
        return redirect()->route('task.index');
    }
    public function reComplete($id){
        // dd('Làm lại có Id là : '.$id);
         $task = Task::find($id);
        $task->status = 1;
        $task->save();
        return redirect()->route('task.index');
    }
}