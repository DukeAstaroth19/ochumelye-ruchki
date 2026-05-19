<?php

namespace App\Http\Controllers;

use App\Models\MasterClass;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->isTeacher()) {
            $masterClasses = MasterClass::with(['craft', 'participants'])
                ->where('teacher_id', $user->id)
                ->orderBy('date', 'desc')
                ->get();
                
            return view('profile.teacher', compact('user', 'masterClasses'));
        }
        
        $bookings = $user->bookings()->with('masterClass.craft', 'masterClass.teacher')->get();
        return view('profile.visitor', compact('user', 'bookings'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('avatars', 'public');
            $validated['photo'] = $path;
        }

        $user->update($validated);

        return back()->with('success', 'Профиль успешно обновлен');
    }
    
    // Добавьте этот метод для повышения роли до ведущего (только для админа)
    public function makeTeacher($id)
    {
        if (auth()->user()->role !== 'admin') {
            return back()->with('error', 'Доступ запрещен');
        }
        
        $user = User::findOrFail($id);
        $user->role = 'teacher';
        $user->save();
        
        return back()->with('success', 'Пользователь стал ведущим!');
    }
}