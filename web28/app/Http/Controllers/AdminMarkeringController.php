<?php

namespace App\Http\Controllers;

use App\Author;
use App\markering;

use Illuminate\Http\Request;

class AdminMarkeringController extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_markering', ['authors' => $authors]);
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
                $markering = new markering();
                $markering->author_id = $request->input('author_id');
                $markering->title = $request->input('title');
                $markering->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $markering->img = 'http://blog/images/' . $imageName;
                }
                $markering->save();

                return redirect()->route('single_markering', $markering->id);


            } else {

                return redirect()->route('markering');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'DELETE') {
                $markering = markering::find($request->input('id'));
                $markering->delete();
                return back();
            } else {
                return view('admin.delete_markering', ['markering' => markering::all()]);
            }
        }
    }

    public function edit($id)
    {
        $markering = markering::where('id', '=', $id)->first();
        $authors = Author::all();
        return view('Admin.edit_markering', ['markering' => $markering, 'authors' => $authors]);
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
                $markering = markering::where('id', '=', $request->input('id'))->first();

                $markering->author_id = $request->input('author_id');
                $markering->title = $request->input('title');
                $markering->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $markering->img = 'http://blog/images/' . $imageName;
                }
                $markering->save();
            }
        }

        return redirect('/markering/'.$markering->id);
    }
}


