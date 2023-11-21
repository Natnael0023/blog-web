<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    // naty prof update
    public function update(UpdateUserRequest $request,User $user)
    {
        $this->authorize('update',$user);

        $avtrName = null;
        if($request->hasFile('avatar'))
        {
            if($user->avatar != null)
            {
                $oldAvtrPath = 'images/avatar/'.$user->avatar;
                unlink($oldAvtrPath);
            }
            $avtr = $request('avatar');
            $avtrName = 'avtr_'.time().'.'.$request('avatar')->extension();
            $avtr->move(public_path('images/avatar/'),$avtrName);
            $user->avatar = $avtrName;
        }

        $validated = $request->validated();

        $user->update($validated);
 
        return redirect()->back()->with('success','profile updated successfully');
    }
    // end

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show(User $user)
    {
        $postsByUser = Post::where('user_id',$user->id)
        ->orderBy('created_at','desc')
        ->get();

        return view('profile.show-profile',compact('user','postsByUser'));
    }

    public function follow(User $user)
    {
        if(auth()->user()->followings()->where('user_id',$user->id)->exists())
        {
            return $this->unfollow($user);
        }

        auth()->user()->followings()->attach($user->id);
        return redirect()->back()->with('success','you\'ve started following '.$user->name);
    }

    public function unfollow($user)
    {
        auth()->user()->followings()->detach($user->id);
        return redirect()->back()->with('success','You unfollowed '.$user->name);
    }

    public function setLocale(Request $request)
    {
        $locale = $request->input('locale');
        app()->setLocale($locale);
        // You can also store the selected locale in the session or user preferences if needed.
        // ...
    }

}
