<?php

namespace App\Http\Controllers;

use App\Author;

use App\spomb;
use Illuminate\Http\Request;

class AdminSpombcontroller extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_spomb', ['authors' => $authors]);
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
                $spomb = new spomb();
                $spomb->author_id = $request->input('author_id');
                $spomb->title = $request->input('title');
                $spomb->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $spomb->img = 'http://blog/images/' . $imageName;
                }
                $spomb->save();

                return redirect()->route('single_spomb', $spomb->id);


            } else {

                return redirect()->route('spombing');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'DELETE') {
                $spomb = spomb::find($request->input('id'));
                $spomb->delete();
                return back();
            } else {
                return view('admin.delete_spomb', ['spombs' => spomb::all()]);
            }
        }
    }

    public function edit($id)
    {
        $spomb = spomb::where('id', '=', $id)->first();
        $authors = Author::all();
        return view('Admin.edit_spomb', ['spombs' => $spomb, 'authors' => $authors]);
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
                $spomb = spomb::where('id', '=', $request->input('id'))->first();

                $spomb->author_id = $request->input('author_id');
                $spomb->title = $request->input('title');
                $spomb->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $spomb->img = 'http://blog/images/' . $imageName;
                }
                $spomb->save();
            }
        }

        return redirect('/spombing/'.$spomb->id);
    }


}
