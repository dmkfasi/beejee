<?php

use Zend\Diactoros\ServerRequest;
use Aura\Router\Route;

class TaskController extends Controller {

    public function list(Route $r): string {
        // Gets task list for the page number in question
        $tasks = $this->db->task->select()
            ->page($r->attributes['id'])
            ->perPage(3);
        
        // Fills and displays task list
        $this->view->setView('task_list', $tasks);
        
        return $this->view->__invoke();
    }
    
    public function add(): string {
        // Shows new task form
        $this->view->setView('task_add');
        
        return $this->view->__invoke();
    }
    
    public function save(Route $r): string {
        // Fill and display task list
        $this->view->setView('task_add');
        
        return $this->view->__invoke();
    }
    
}
