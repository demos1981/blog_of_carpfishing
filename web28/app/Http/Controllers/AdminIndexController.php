<?php

namespace App\Http\Controllers;

use App\Author;
use App\Indexes;

use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_index', ['authors' => $authors]);
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
                $home = new Indexes();
                $home->author_id = $request->input('author_id');
                $home->title = $request->input('title');
                $home->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $home->img = 'http://blog/images/' . $imageName;
                }
                $home->save();

                return redirect()->route('single_index', $home->id);


            } else {

                return redirect()->route('index');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'DELETE') {
                $home = Indexes::find($request->input('id'));
                $home->delete();
                return back();
            } else {
                return view('admin.delete_index', ['index' => Indexes::all()]);
            }
        }
    }

    public function edit($id)
    {
        $home = Indexes::where('id', '=', $id)->first();
        $authors = Author::all();
        return view('Admin.edit_index', ['index' => $home, 'authors' => $authors]);
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
                $home = Indexes::where('id', '=', $request->input('id'))->first();

                $home->author_id = $request->input('author_id');
                $home->title = $request->input('title');
                $home->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $home->img = 'http://blog/images/' . $imageName;
                }
                $home->save();
            }
        }

        return redirect('/index/'.$home->id);
    }
}
