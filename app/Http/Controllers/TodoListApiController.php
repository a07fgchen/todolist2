<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userId = Auth::user()->id;
        return TodoList::where('user_id', $userId)->get(['id', 'completed_at', 'content']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);
        TodoList::create([
            'user_id' => Auth::user()->id,
            'content' => $data['content'],
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        TodoList::where('id', $id)->update([
            'completed_at' => $request->input('completed_at') ? Carbon::now() : null
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateContent(Request $request, $id)
    {
        $data = $request->validate([
            'cotent' => 'required'
        ]);

        TodoList::where('id', $id)->update([
            'cotent' => $data['content']
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TodoList::destroy($id);
    }
}
