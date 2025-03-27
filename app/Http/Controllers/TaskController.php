<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:pendente,em andamento,concluído',
            'due_date' => 'nullable|date',
        ]);
        return new TaskResource(Task::create($validated));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        if ($task->status !== 'pendente') {
            return response()->json(['error' => 'Somente tarefas pendentes podem ser editadas.'], 403);
        }
        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:pendente,em andamento,concluído',
            'due_date' => 'nullable|date',
        ]);
        $task->update($validated);
        return new TaskResource($task);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        if ($task->status !== 'pendente') {
            return response()->json(['error' => 'Somente tarefas pendentes podem ser deletadas.'], 403);
        }
        $task->delete();
        return response()->json(['message' => 'Tarefa deletada com sucesso.']);
    }
}