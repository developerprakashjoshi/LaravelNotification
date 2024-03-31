<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Notifications\WelcomeNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user=new User();
        $user->fill($request->all());
        $result=$user->save();
        // Notification::send($user,new WelcomeNotification);
        $user->notify(new WelcomeNotification);
        return "User register successfully!";
    }
    public function notify(Request $request)
    {
        $user=new User();
        $user->fill($request->all());
        $result=$user->save();
        // Notification::send($user,new WelcomeNotification);
        $user->notify(new DatabaseNotification($user));
        return "User register successfully!";
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
