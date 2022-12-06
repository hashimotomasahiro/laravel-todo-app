<?php

namespace App\Http\Controllers;

use App\Models\Calender2;
use Illuminate\Http\Request;
// Authファサード追加でクラスのインスタンス化をしないで済む
use Illuminate\Support\Facades\Auth;

class Calender2controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Auth::user()->todos;

        return view('goals.index', compact('todos'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
            'content' => 'required|max:32',
        ]);

        // 登録処理
        $calender2 = new Calender();
        // 日付に変換。JavaScriptのタイムスタンプはミリ秒なので秒に変換
        $calender2->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $calender2->end_date = date('Y-m-d', $request->input('end_date') / 1000);
        $calender2->content = $request->input('content');
        $calender2->save();

        return redirect()->route('goals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calender2  $calender2
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Calender2 $calender2)
    {
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
            'content' => 'required|max:32',
        ]);

        $calender2->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $calender2->end_date = date('Y-m-d', $request->input('end_date') / 1000);
        $calender2->content = $request->input('content');
        $calender2->save();

        return redirect()->route('goals.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calender2  $calender2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calender2 $calender2)
    {
        $calender2->delete();

        return redirect()->route('goals.index'); 
    }
}
