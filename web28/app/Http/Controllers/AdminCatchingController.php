<?php

namespace App\Http\Controllers;

use App\Author;
use App\Catching;

use Illuminate\Http\Request;

class AdminCatchingController extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_catching', ['authors' => $authors]);
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
                $catching = new Catching();
                $catching->author_id = $request->input('author_id');
                $catching->title = $request->input('title');
                $catching->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $catching->img = 'http://blog/images/' . $imageName;
                }
                $catching->save();

                return redirect()->route('single_catching', $catching->id);


            } else {

                return redirect()->route('catching');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'DELETE') {
                $catching = Catching::find($request->input('id'));
                $catching->delete();
                return back();
            } else {
                return view('admin.delete_catching', ['catching' => Catching::all()]);
            }
        }
    }

    public function edit($id)
    {
        $catching = Catching::where('id', '=', $id)->first();
        $authors = Author::all();
        return view('Admin.edit_catching', ['catching' => $catching, 'authors' => $authors]);
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
                $catching = Catching::where('id', '=', $request->input('id'))->first();

                $catching->author_id = $request->input('author_id');
                $catching->title = $request->input('title');
                $catching->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $catching->img = 'http://blog/images/' . $imageName;
                }
                $catching->save();
            }
        }

        return redirect('/catching/'.$catching->id);
    }
}


