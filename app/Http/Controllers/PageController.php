<?php
// app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use App\Models\Position;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    // Публичные страницы
    public function index()
    {
        $doctors = Doctor::where('is_active', true)->get();
        $departments = Position::getDepartments();
        return view('pages.main', compact('doctors', 'departments'));
    }

    public function services()
    {
        return view('pages.services');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function promotions()
    {
        return view('pages.promotions');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    // Пример для хирургии
    public function hirurgiya()
    {
        $categories = $this->getServicesForDepartment('Хирургия');
        return view('pages.dept_hirurgiya', compact('categories'));
    }

    // Пример для терапии
    public function terapiya()
    {
        $categories = $this->getServicesForDepartment('Терапия');
        return view('pages.dept_terapiya', compact('categories'));
    }

    // Пример для диагностики
    public function diagnostika()
    {
        $categories = $this->getServicesForDepartment('Диагностика');
        return view('pages.dept_diagnostika', compact('categories'));
    }

    // Пример для неврологии
    public function neurologiya()
    {
        $categories = $this->getServicesForDepartment('Неврология');
        return view('pages.dept_vakcinaciya', compact('categories'));
    }

    // Пример для стоматологии
    public function stomatologiya()
    {
        $categories = $this->getServicesForDepartment('Стоматология');
        return view('pages.dept_stomatologiya', compact('categories'));
    }

    // Пример для онкологии
    public function onkologiya()
    {
        $categories = $this->getServicesForDepartment('Онкология');
        return view('pages.dept_onkologiya', compact('categories'));
    }

    // Пример для дерматологии
    public function dermatologia()
    {
        $categories = $this->getServicesForDepartment('Дерматология');
        return view('pages.dept_dermatologiya', compact('categories'));
    }

    // Пример для офтальмологии
    public function oftalmologiya()
    {
        $categories = $this->getServicesForDepartment('Офтальмология');
        return view('pages.dept_oftalmologiya', compact('categories'));
    }

    // Пример для травматологии
    public function travmatologiya()
    {
        $categories = $this->getServicesForDepartment('Травматология');
        return view('pages.dept_travmatologiya', compact('categories'));
    }

    // Пример для кардиологии
    public function kardiologiya()
    {
        $categories = $this->getServicesForDepartment('Кардиология');
        return view('pages.dept_kardiologiya', compact('categories'));
    }

    // Админ панель
    public function admin()
    {
        $users = User::all();
        $positions = Position::orderBy('department')->orderBy('name')->get();
        $departments = Position::getDepartments();
        $doctors = Doctor::with('position')->orderBy('department')->get();

        return view('pages.admin', compact('users', 'positions', 'departments', 'doctors'));
    }

    // Профиль пользователя
    public function profile()
    {
        $user = auth()->user();
        return view('pages.profile', compact('user'));
    }

    // Кабинет врача
    public function doctor()
    {
        return view('pages.doctor_profile');
    }

    // Публичная страница врача
    public function doctorProfile($id)
    {
        $doctor = Doctor::with('position')->findOrFail($id);
        return view('pages.doctor_public', compact('doctor'));
    }

    // ==================== УПРАВЛЕНИЕ ДОЛЖНОСТЯМИ ====================

    // Сохранение новой должности
    public function storePosition(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:positions,name',
            'department' => ['required', 'string', Rule::in(Position::getDepartments())],
            'description' => 'nullable|string|max:1000',
        ]);

        Position::create($validated);

        return redirect()->route('admin_page')
            ->with('success', 'Должность успешно создана!');
    }

    // Обновление должности
    public function updatePosition(Request $request, $id)
    {
        $position = Position::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:positions,name,' . $position->id,
            'department' => ['required', 'string', Rule::in(Position::getDepartments())],
            'description' => 'nullable|string|max:1000',
        ]);

        $position->update($validated);

        return redirect()->route('admin_page')
            ->with('success', 'Должность успешно обновлена!');
    }

    // Удаление должности
    public function destroyPosition($id)
    {
        $position = Position::findOrFail($id);

        // Проверяем, есть ли врачи с этой должностью
        if ($position->doctors()->count() > 0) {
            return redirect()->route('admin_page')
                ->with('error', 'Невозможно удалить должность, так как есть врачи, занимающие эту позицию!');
        }

        $position->delete();

        return redirect()->route('admin_page')
            ->with('success', 'Должность успешно удалена!');
    }

    // Получить должности по отделению (для AJAX)
    public function getPositionsByDepartment(Request $request)
    {
        $department = $request->get('department');
        $positions = Position::where('department', $department)->get();
        return response()->json($positions);
    }

    // Получить данные врача в JSON формате
    public function getDoctorJson($id)
    {
        $doctor = Doctor::with('position')->findOrFail($id);
        return response()->json($doctor);
    }

    // ==================== УПРАВЛЕНИЕ ВРАЧАМИ ====================

    // Сохранение врача
    public function storeDoctor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'department' => ['required', 'string', Rule::in(Position::getDepartments())],
            'position_id' => 'nullable|exists:positions,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'nullable|string|max:20',
            'experience' => 'nullable|integer|min:0',
            'education' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Обработка фото
        if ($request->hasFile('photo')) {
            // Стало (сохраняем прямо в assets/images):
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('assets/images'), $filename);
            $validated['photo'] = $filename;
        }

        Doctor::create($validated);

        return redirect()->route('admin_page')
            ->with('success', 'Врач успешно добавлен!');
    }

    // Обновление врача
    public function updateDoctor(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'department' => ['required', 'string', Rule::in(Position::getDepartments())],
            'position_id' => 'nullable|exists:positions,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'nullable|string|max:20',
            'experience' => 'nullable|integer|min:0',
            'education' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'sometimes|boolean',
        ]);

        // Обработка фото
        if ($request->hasFile('photo')) {
            // Удаляем старое фото
            if ($doctor->photo && Storage::disk('public')->exists($doctor->photo)) {
                Storage::disk('public')->delete($doctor->photo);
            }
            $path = $request->file('photo')->store('doctors', 'public');
            $validated['photo'] = $path;
        }

        $doctor->update($validated);

        return redirect()->route('admin_page')
            ->with('success', 'Врач успешно обновлен!');
    }

    // Удаление врача
    public function destroyDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);

        // Удаляем фото
        if ($doctor->photo && Storage::disk('public')->exists($doctor->photo)) {
            Storage::disk('public')->delete($doctor->photo);
        }

        $doctor->delete();

        return redirect()->route('admin_page')
            ->with('success', 'Врач успешно удален!');
    }
    public function getServiceCategories(Request $request)
    {
        $department = $request->get('department');
        $categories = ServiceCategory::where('department', $department)
            ->orderBy('sort_order')
            ->get();
        return response()->json($categories);
    }

    // Сохранение категории услуги
    public function storeServiceCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department' => ['required', 'string', Rule::in(ServiceCategory::getDepartments())],
            'sort_order' => 'nullable|integer|min:0',
        ]);

        ServiceCategory::create($validated);

        return redirect()->route('admin_page')
            ->with('success', 'Категория услуги успешно создана!');
    }

    // Обновление категории услуги
    public function updateServiceCategory(Request $request, $id)
    {
        $category = ServiceCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department' => ['required', 'string', Rule::in(ServiceCategory::getDepartments())],
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'sometimes|boolean',
        ]);

        $category->update($validated);

        return redirect()->route('admin_page')
            ->with('success', 'Категория услуги успешно обновлена!');
    }

    // Удаление категории услуги
    public function destroyServiceCategory($id)
    {
        $category = ServiceCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin_page')
            ->with('success', 'Категория услуги успешно удалена!');
    }

    // Получить данные категории в JSON формате
    public function getServiceCategoryJson($id)
    {
        $category = ServiceCategory::findOrFail($id);
        return response()->json($category);
    }
    // ==================== УПРАВЛЕНИЕ УСЛУГАМИ ====================

    // Получить услуги по категории (AJAX)
    public function getServicesByCategory(Request $request)
    {
        $categoryId = $request->get('category_id');
        $services = Service::where('category_id', $categoryId)
            ->orderBy('sort_order')
            ->get();
        return response()->json($services);
    }

    // Получить категории по отделению (AJAX)
    public function getCategoriesByDepartment(Request $request)
    {
        $department = $request->get('department');
        $categories = ServiceCategory::where('department', $department)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        return response()->json($categories);
    }

    // Сохранение услуги
    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        Service::create($validated);

        return redirect()->route('admin_page')
            ->with('success', 'Услуга успешно создана!');
    }

    // Обновление услуги
    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'sometimes|boolean',
        ]);

        $service->update($validated);

        return redirect()->route('admin_page')
            ->with('success', 'Услуга успешно обновлена!');
    }

    // Удаление услуги
    public function destroyService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin_page')
            ->with('success', 'Услуга успешно удалена!');
    }

    // Получить данные услуги в JSON формате
    public function getServiceJson($id)
    {
        $service = Service::with('category')->findOrFail($id);
        return response()->json($service);
    }
    // Получить услуги для отделения (для публичных страниц)
    private function getServicesForDepartment($department)
    {
        $categories = ServiceCategory::where('department', $department)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        foreach ($categories as $category) {
            $category->services = $category->services()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        }

        return $categories;
    }
    public function getPets()
    {
        $user = auth()->user();
        $pets = Pet::where('user_id', $user->id)->where('is_active', true)->get();
        return response()->json($pets);
    }

    // Сохранение питомца
    public function storePet(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'emoji' => 'nullable|string|max:10',
            'type' => 'required|in:cat,dog,rabbit,rodent,bird,reptile,fish,other',
            'breed' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:50',
            'birth_date' => 'nullable|date|before:today',
            'weight' => 'nullable|numeric|min:0|max:200',
            'color' => 'nullable|string|max:100',
            'chip_number' => 'nullable|string|max:50|unique:pets,chip_number',
            'notes' => 'nullable|string|max:1000',
        ]);

        $validated['user_id'] = auth()->id();

        Pet::create($validated);

        return redirect()->route('profile')->with('success', 'Питомец успешно добавлен!');
    }

    // Обновление питомца
    public function updatePet(Request $request, $id)
    {
        $pet = Pet::where('user_id', auth()->id())->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'emoji' => 'nullable|string|max:10',
            'type' => 'required|in:cat,dog,rabbit,rodent,bird,reptile,fish,other',
            'breed' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:50',
            'birth_date' => 'nullable|date|before:today',
            'weight' => 'nullable|numeric|min:0|max:200',
            'color' => 'nullable|string|max:100',
            'chip_number' => 'nullable|string|max:50|unique:pets,chip_number,' . $pet->id,
            'notes' => 'nullable|string|max:1000',
            'is_active' => 'sometimes|boolean',
        ]);

        $pet->update($validated);

        return redirect()->route('profile')->with('success', 'Питомец успешно обновлен!');
    }

    // Удаление питомца
    public function destroyPet($id)
    {
        $pet = Pet::where('user_id', auth()->id())->findOrFail($id);
        $pet->delete();

        return redirect()->route('profile')->with('success', 'Питомец удален');
    }

    // Страница редактирования питомца
    public function editPet($id)
    {
        $pet = Pet::where('user_id', auth()->id())->findOrFail($id);
        return view('pages.profile_pet_edit', compact('pet'));
    }

    // Страница создания питомца
    public function createPet()
    {
        return view('pages.profile_pet_create');
    }
    // Публичная страница профиля питомца (только для владельца)
    public function petProfile($id)
    {
        $user = auth()->user();
        $pet = Pet::where('user_id', $user->id)->where('id', $id)->firstOrFail();

        return view('pages.profile_pet', compact('user', 'pet'));
    }
}
