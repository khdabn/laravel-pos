<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Exceptions\DecoderException;
use Intervention\Image\ImageManager;
use Throwable;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->safe()->only([
            'username',
            'full_name',
        ]);

        $oldAvatar = $user->avatar;
        $newAvatar = null;
        $disk = Storage::disk('public');

        if ($request->hasFile('avatar')) {
            $manager = new ImageManager(new Driver());

            try {
                $image = $manager
                    ->read($request->file('avatar')->getRealPath())
                    ->cover(200, 200)
                    ->toJpeg(quality: 85);
            } catch (DecoderException $exception) {
                throw ValidationException::withMessages([
                    'avatar' => 'The uploaded image could not be read.',
                ]);
            }

            $newAvatar = 'avatars/' . Str::uuid() . '.jpg';

            if (!$disk->put($newAvatar, (string) $image)) {
                throw ValidationException::withMessages([
                    'avatar' => 'The avatar could not be saved. Please try again.',
                ]);
            }

            $data['avatar'] = $newAvatar;
        }

        try {
            $user->update($data);
        } catch (Throwable $exception) {
            if ($newAvatar !== null) {
                $disk->delete($newAvatar);
            }

            throw $exception;
        }

        if ($newAvatar !== null && $oldAvatar) {
            $disk->delete($oldAvatar);
        }

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }
}