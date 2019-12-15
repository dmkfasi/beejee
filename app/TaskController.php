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
            'description',
        ]);

        $username       = $values['username'];
        $email          = $values['email'];
        $description    = $values['description'];

        // Save only tasks with proper data handed over
        if (isset($username) && isset($email)) {
            try {
                // Get new active record object
                $task = $this->db->task->create();
                // Collect inputs for the object
                $task->username     = htmlspecialchars($username);
                $task->email        = htmlspecialchars($email);
                $task->description  = htmlspecialchars($description);

                // Persist object
                // TODO Handle errors
                $task->save();

                // Send a message with HTTP redirect
                self::setSessionMessage('task_save_message', 'Task saved successfully');
            } catch (\Exception $e) {
                // TODO Handle the error saving
                self::setSessionMessage('task_save_message', "Unable to save new Task: {$e->getMessage()}");
            }
        }

        // Redirect with a message, for a reason unknown, it does not work this way
        redirect(url('task', [ 'message' => 'Data saved successfully' ]), 301);
    }

    public function setDone() {
        // Do not allow unauthenticated user update Task's status
        if ($this->auth->isValid()) {
            // Find the Task in question
            $id = input()->find('id')->getValue();
            $task = $this->db->task[$id];

            // Update its status
            $task->isDone = 1;
            // TODO Handle errors
            $task->save();
        } else {
            throw new \Exception('Unauthenticated');
        }
    }
}
