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
        dd('Đây là hàm create');
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
        $name = $request->get('name');
        $content = $request->get('content');
        $deadline = $request->get('deadline');
        $task = new Task();
        $task->name = $name;
        $task->content = $content;
        $task->deadline = $deadline;
        $task->status = 1;
        $task->updated_at = null;
        $task->save();

       return redirect()->route('task.index'); 
        // $input = $request->only(['name','deadline']);
        // dd($input);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('Show có Id là : '.$id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         dd('Edit có Id là : = '.$id);
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
        $url = $request->fulexUrl();
        dd($url);
        $task = Task::find($id);
        $task->name = 'Học Laravel 3';
        $task->status = 1;
        $task->save();
        // dd('Update có Id là : '.$id);
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
        dd('Complete có Id là : '.$id);
    }
    public function reComplete($id){
        dd('Làm lại có Id là : '.$id);
    }
}