<?php

namespace App\Http\Controllers;

use App\Models\Craft;
use App\Models\MasterClass;
use Illuminate\Http\Request;

class MasterClassController extends Controller
{
    public function showCraft($id)
    {
        $craft = Craft::findOrFail($id);
        $masterClasses = MasterClass::with(['teacher'])
            ->where('craft_id', $id)
            ->where('date', '>=', now())
            ->orderBy('date')
            ->orderBy('time')
            ->get();
            
        return view('master-classes.craft', compact('craft', 'masterClasses'));
    }

    public function show($id)
    {
        $masterClass = MasterClass::with(['craft', 'teacher'])->findOrFail($id);
        return view('master-classes.show', compact('masterClass'));
    }

    public function create()
    {
        // Проверка что пользователь авторизован и является ведущим
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Войдите в систему');
        }
        
        if (!auth()->user()->isTeacher()) {
            return redirect('/')->with('error', 'Доступ запрещен. Только для ведущих.');
        }
        
        $crafts = Craft::all();
        return view('master-classes.create', compact('crafts'));
    }

    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->isTeacher()) {
            return redirect('/')->with('error', 'Доступ запрещен');
        }

        $validated = $request->validate([
            'craft_id' => 'required|exists:crafts,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date|after:today',
            'time' => 'required',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
        ]);

        MasterClass::create([
            'craft_id' => $validated['craft_id'],
            'teacher_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'max_participants' => $validated['max_participants'],
            'price' => $validated['price'],
            'available_seats' => $validated['max_participants'],
        ]);

        return redirect()->route('profile')->with('success', 'Мастер-класс успешно добавлен!');
    }
}