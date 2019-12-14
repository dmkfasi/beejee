<?php

class TaskController extends Controller
{

    public function index(): string
    {
        // Gets the whole bunch of tasks
        $tasks = $this->db->task->select()->get();

        // Fills task list and pagination data
        $this->view->addData([
            'tasks'     => $tasks,
        ]);

        $this->view->setView('task_list');
        return $this->view->__invoke();
    }

    public function create(): string
    {
        // Shows new task form
        $this->view->setView('task_add');
        
        return $this->view->__invoke();
    }
    
    public function store(): void
    {
        // TODO Extra validation and sanitization
        $values = input()->all([
            'username',
            'email',
            'description'
        ]);

        try {
            // Get new active record object
            $task = $this->db->task->create();
            // Collect inputs for the object
            $task->username     = htmlspecialchars($values['username']);
            $task->email        = htmlspecialchars($values['email']);
            $task->description  = htmlspecialchars($values['description']);

            // Persist object
            $task->save();

            // Send a message with HTTP redirect
            self::setSessionMessage('task_save_message', 'Task saved successfully');
        } catch (\Exception $e) {
            // TODO Handle the error saving
            self::setSessionMessage('task_save_message', "Unable to save new Task: {$e->getMessage()}");
        }

        // Redirect with a message, for a reason unknown, it does not work this way
        redirect(url('task', [ 'message' => 'Data saved successfully' ]), 301);
    }

}
