<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    
    {$this->middleware('auth')->execpt(['index' , 'show']);
$this->middleware('check.age')->only(['create' , 'store']);}
        

    public function index()
    {
        return "user index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "create user form (checkage)";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "show user $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "edit user $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "update user $id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "destroy user $id";
    }
}
