<?php

namespace App\Http\Livewire;

use App\Models\TodoItem;
use Livewire\Component;

class Todo extends Component
{
    public $todos;
    public string $todoText = '';

    public function  mount()
    {
        $this->selectTodos();
    }
    public function render()
    {
        return view('livewire.todo');
    }

    public function addTodo()
    {
        $todo= new TodoItem();
        $todo->todo = $this->todoText;
        $todo->completed = false;
        $todo->save();

        $this->todoText = '';
        $this->selectTodos();
    }
    public function toggleTodo($id)
    {
        $todos = TodoItem::where('id', $id)->first();
        if (!$todos) 
        {
            return;
        }
        $todos->completed = !$todos->completed;
        $todos->save();
        $this->selectTodos();
    }

    public function deleteTodo($id)
    {
        $todos = TodoItem::where('id', $id)->first();
        if (!$todos) 
        {
            return;
        }
        $todos->delete();
        $this->selectTodos();
    }

    public function selectTodos()
    {
        $this->todos = TodoItem::orderBy('created_at', 'DESC')->get();
    }
}
