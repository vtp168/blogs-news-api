<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = User::latest()->get();
        return response()->json($users);

    }

    // Store new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            '_id'=>uniqid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'author_name'=>$request->author_name,
            'author_bio'=>$request->author_bio,
            'author_phone'=>$request->author_phone,
            'photo'=>$request->author_photo,
            'author_email' => $request->author_email
        ]);

        //$token = $user->createToken($user->name)->plainTextToken;

        return response()->json([
            'user' => $user
        ], 201);
    }

    // Show single user
    public function show($userId)
    {
        $user = User::where(['_id'=>$userId])->first();
        return response()->json($user);
    }

    // Show form to edit user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request,$userId)
    {
        $user = User::where(['_id'=>$userId])->first();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'author_name' => 'required|string|max:255',
            'author_bio' => 'nullable|string|max:255',
            'author_phone' => 'nullable|string|max:255',
            'author_email' => 'nullable|max:255',
            'photo' => 'nullable|image|max:10000',
        ]);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $validated['photo'] = $photo->store('users', 'public'); // stored as 'image' field
        }

        if(!$user->_id)
        {
            $validated['_id'] = uniqid();
        }

        $user->update($validated);

        return response()->json([
            'user' => $user
        ], 201);

    }

    // Delete user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
