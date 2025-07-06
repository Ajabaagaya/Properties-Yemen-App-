<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\View\View;

use Illuminate\Http\Request;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $users = User::getAll();

        return view("components/welcome",[
            'users'=>$users
        ]);
        
        
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
