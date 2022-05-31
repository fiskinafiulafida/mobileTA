<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAdmin;

class AdminController extends Controller
{
    public function index()
    {
        $adminUser = UserAdmin::all();
        return view('admin.index', compact(['adminUser']));
    }

    public function edit($id)
    {
        $adminUser = UserAdmin::find($id);
        return view('admin.edit', compact(['adminUser']));
    }

    public function update(Request $request, $id)
    {
        $adminUser = UserAdmin::find($id);
        $adminUser->update($request->all());
        return redirect('/adminUser');
    }

    public function destroy($id)
    {
        $adminUser = UserAdmin::find($id);
        $adminUser->delete();
        return redirect('/adminUser');
    }
}
