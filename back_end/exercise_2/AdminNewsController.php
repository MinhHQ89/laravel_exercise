<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = \DB::table('news')->select('*');
        $news = $news->get();

        $pageName = 'Page Name - News';

        return view('admin.news', compact('news', 'pageName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->email = $request->email;
        $news->description = $request->description;
        $news->slug = \Str::slug($request->title);

        $news->save();
        return redirect()->route('admin.news.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('id', '=', $id)->select('*')->first();
        $des = html_entity_decode($news->description);
        return view('admin.news_detail', compact('news', 'des'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $pageName = 'News - Update';
        return view('admin.news_update', compact('news', 'pageName'));
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
        $request->validate([
            'title' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string|max:1000'
        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->email = $request->email;
        $news->description = $request->description;

        $news->save();
        return redirect()->route('admin.news.index')->with('status', 'News updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);

        $news->delete();
        return redirect()->route('admin.news.index')->with('status', 'Data deleted successfully.');
    }
}
