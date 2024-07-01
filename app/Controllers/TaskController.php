<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class TaskController extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }
    public function index()
    {
        $data = $this->taskModel->findAll();
        return view('tasks/index', ['tasks' => $data]);
    }
    public function show($id)
    {
        $task = $this->getTaskOr404($id);
        return view('tasks/show', ['task' => $task]);
    }
    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $description = $this->request->getPost('description');
        $task = new \App\Entities\Task();
        $task->description = $description;

        if (!$this->taskModel->save($task)) {
            return redirect()->back()->with('errors', $this->taskModel->errors());
        }
        return redirect()->to('tasks/show/' . $this->taskModel->getInsertID())->with('success', 'Thêm task thành công');
    }
    public function edit($id)
    {
        $task = $this->getTaskOr404($id);
        return view('tasks/edit', ['task' => $task]);
    }
    public function update($id)
    {
        $task = $this->getTaskOr404($id);

        $description = $this->request->getPost('description');
        $task->description = $description;
        if(!$task->hasChanged()){
            return redirect()->back()->with('warning', 'Không có gì thay đổi');
        }
        $update = $this->taskModel->save($task);
        if(!$update){
            return redirect()->back()->with('errors', $this->taskModel->errors());
        }else{
            return redirect()->to('tasks/show/'.$id)->with('success', 'Cập nhật tasks thành công');
        }
    }
    public function delete($id)
    {
        $task = $this->getTaskOr404($id);
        if($this->taskModel->delete($id)){
           return redirect()->to('tasks')->with('success', 'Xóa task thành công');
        }
    }
    private function getTaskOr404($id){
        $task = $this->taskModel->find($id);
        if(!$task){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Không tìm thấy id là $id");
        }
        return $task;
    }
}
