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
        $task = $this->taskModel->find($id);
        return view('tasks/show', ['task' => $task]);
    }
    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $description = $this->request->getPost('description');
        $data = [
            'description' => $description
        ];
        $store = $this->taskModel->insert($data);
        if($store === false){
            return redirect()->back()->with('errors', $this->taskModel->errors());
        }else{
            return redirect()->to('tasks/show/'.$store)->with('success', 'Thêm task thành công');
        }
    }
    public function edit($id)
    {
        $task = $this->taskModel->find($id);
        if(!$task){
           throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('tasks/edit', ['task' => $task]);
    }
    public function update($id)
    {
        $task = $this->taskModel->find($id);
        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
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
}
