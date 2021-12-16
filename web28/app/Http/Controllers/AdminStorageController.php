<?php

namespace App\Http\Controllers;

use App\Author;

use App\Storage;
use Illuminate\Http\Request;

class AdminStorageController extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_storage', ['authors' => $authors]);
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
                $storage = new Storage();
                $storage->author_id = $request->input('author_id');
                $storage->title = $request->input('title');
                $storage->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $storage->img = 'http://blog/images/' . $imageName;
                }
                $storage->save();

                return redirect()->route('single_storage', $storage->id);


            } else {

                return redirect()->route('storage');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'DELETE') {
                $storage = Storage::find($request->input('id'));
                $storage->delete();
                return back();
            } else {
                return view('admin.delete_storage', ['storage' => Storage::all()]);
            }
        }
    }

    public function edit($id)
    {
        $storage = Storage::where('id', '=', $id)->first();
        $authors = Author::all();
        return view('Admin.edit_storage', ['storage' => $storage, 'authors' => $authors]);
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
                $storage = Storage::where('id', '=', $request->input('id'))->first();

                $storage->author_id = $request->input('author_id');
                $storage->title = $request->input('title');
                $storage->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $storage->img = 'http://blog/images/' . $imageName;
                }
                $storage->save();
            }
        }

        return redirect('/storage/'.$storage->id);
    }

}
