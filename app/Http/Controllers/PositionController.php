<?php
// app/Http/Controllers/PositionController.php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    // Отображение списка должностей
    public function index()
    {
        $positions = Position::orderBy('department')->orderBy('name')->get();
        $departments = Position::getDepartments();

        return view('admin.positions.index', compact('positions', 'departments'));
    }

    // Форма создания должности
    public function create()
    {
        $departments = Position::getDepartments();
        return view('admin.positions.create', compact('departments'));
    }

    // Сохранение новой должности
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:positions,name',
            'department' => ['required', 'string', Rule::in(Position::getDepartments())],
            'description' => 'nullable|string|max:1000',
        ]);

        Position::create($validated);

        return redirect()->route('admin.positions.index')
            ->with('success', 'Должность успешно создана!');
    }

    // Форма редактирования должности
    public function edit(Position $position)
    {
        $departments = Position::getDepartments();
        return view('admin.positions.edit', compact('position', 'departments'));
    }

    // Обновление должности
    public function update(Request $request, Position $position)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:positions,name,' . $position->id,
            'department' => ['required', 'string', Rule::in(Position::getDepartments())],
            'description' => 'nullable|string|max:1000',
        ]);

        $position->update($validated);

        return redirect()->route('admin.positions.index')
            ->with('success', 'Должность успешно обновлена!');
    }

    // Удаление должности
    public function destroy(Position $position)
    {
        // Проверяем, есть ли врачи с этой должностью
        if ($position->doctors()->count() > 0) {
            return redirect()->route('admin.positions.index')
                ->with('error', 'Невозможно удалить должность, так как есть врачи, занимающие эту позицию!');
        }

        $position->delete();

        return redirect()->route('admin.positions.index')
            ->with('success', 'Должность успешно удалена!');
    }
}
