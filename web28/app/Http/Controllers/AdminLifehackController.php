<?php

namespace App\Http\Controllers;

use App\Author;

use App\Lifehack;
use Illuminate\Http\Request;

class AdminLifehackController extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_lifehack', ['authors' => $authors]);
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
                $lifehack = new Lifehack();
                $lifehack->author_id = $request->input('author_id');
                $lifehack->title = $request->input('title');
                $lifehack->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $lifehack->img = 'http://blog/images/' . $imageName;
                }
                $lifehack->save();

                return redirect()->route('single_lifehack', $lifehack->id);


            } else {

                return redirect()->route('lifehack');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'DELETE') {
                $lifehack = Lifehack::find($request->input('id'));
                $lifehack->delete();
                return back();
            } else {
                return view('admin.delete_lifehack', ['lifehack' => Lifehack::all()]);
            }
        }
    }

    public function edit($id)
    {
        $lifehack = Lifehack::where('id', '=', $id)->first();
        $authors = Author::all();
        return view('Admin.edit_lifehack', ['lifehack' => $lifehack, 'authors' => $authors]);
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
                $lifehack = Lifehack::where('id', '=', $request->input('id'))->first();

                $lifehack->author_id = $request->input('author_id');
                $lifehack->title = $request->input('title');
                $lifehack->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $lifehack->img = 'http://blog/images/' . $imageName;
                }
                $lifehack->save();
            }
        }

        return redirect('/lifehack/'.$lifehack->id);
    }
}
