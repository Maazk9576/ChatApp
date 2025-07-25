<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::where('id', '!=', Auth::id())->withCount(['unreadMessages' ])
            ->orderBy('created_at', 'desc')
            ->get();
            // dd($users->toArray());
        return view('dashboard', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userChat($uid) : View
    {
        $user = User::findOrFail($uid);
        return view('userChat', compact('user' ,'uid'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
