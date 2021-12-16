<?php

namespace App\Http\Controllers;

use App\Author;
use App\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_news', ['authors' => $authors]);
    }

    public function save(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'POST') {
                $this->validate($request, [
                    'author_id' => 'required|numeric',
                    'title' => 'required|max:100|min:5',
                    'body' => 'required|min:200',
                    'image' => 'image'

                ]);
                $news = new News();
                $news->author_id = $request->input('author_id');
                $news->title = $request->input('title');
                $news->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $news->img = 'http://blog/images/' . $imageName;
                }
                $news->save();

                return redirect()->route('single_news', $news->id);


            } else {

                return redirect()->route('news');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
        if ($request->method() == 'DELETE') {
            $news = News::find($request->input('id'));
            $news->delete();
            return back();
        } else {
            return view('admin.delete_news', ['news' => News::all()]);
        }
    }
}

        public function edit($id)
        {
            $news = News::where('id', '=', $id)->first();
            $authors = Author::all();
            return view('Admin.edit_news', ['news' => $news, 'authors' => $authors]);
        }

    public function edit_save(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'POST') {
                $this->validate($request, [
                    'author_id' => 'required|numeric',
                    'title' => 'required|max:100|min:5',
                    'body' => 'required|min:200',
                    'image' => 'image'

                ]);
                $news = News::where('id', '=', $request->input('id'))->first();

                $news->author_id = $request->input('author_id');
                $news->title = $request->input('title');
                $news->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $news->img = 'http://blog/images/' . $imageName;
                }
                $news->save();
            }
        }

            return redirect('/news/'.$news->id);
    }
}
