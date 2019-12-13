<?php

class TaskController extends Controller {

    public function index(): string {
        // Gets task list for the page number in question
        $query = $this->db->task->select()
        ->page(1)
        ->perPage(3)
        ->orderBy('id DESC');

        $tasks = $query->get();
        $pagination = $query->getPageInfo();
        
        // Fills task list and pagination data
        $this->view->addData([
            'tasks' => $tasks,
            'pagination' => $pagination,
        ]);

        $this->view->setView('task_list');
        return $this->view->__invoke();
    }

    public function create(): string {
        // Shows new task form
        $this->view->setView('task_add');
        
        return $this->view->__invoke();
    }
    
    public function store(): void {
        // TODO Extra validation and sanitization
        $values = input()->all([
            'username',
            'email',
            'description'
        ]);

        // Get new active record object
        $task = $this->db->task->create();
        // Collect inputs for the object
        $task->username     = htmlspecialchars($values['username']);
        $task->email        = htmlspecialchars($values['email']);
        $task->description  = htmlspecialchars($values['description']);

        // Persist object
        $task->save();

        redirect(url('task'));
    }

}
