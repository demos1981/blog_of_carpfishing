<?php

namespace App\Http\Controllers;

use App\Author;
use App\Ivent;
use App\Review;
use Illuminate\Http\Request;

class AdminIventController extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_ivent', ['authors' => $authors]);
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
                $ivent = new Ivent();
                $ivent->author_id = $request->input('author_id');
                $ivent->title = $request->input('title');
                $ivent->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $ivent->img = 'http://blog/images/' . $imageName;
                }
                $ivent->save();

                return redirect()->route('single_ivent', $ivent->id);


            } else {

                return redirect()->route('ivent');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'DELETE') {
                $ivent = Ivent::find($request->input('id'));
                $ivent->delete();
                return back();
            } else {
                return view('admin.delete_ivent', ['ivent' => Ivent::all()]);
            }
        }
    }

    public function edit($id)
    {
        $ivent = Ivent::where('id', '=', $id)->first();
        $authors = Author::all();
        return view('Admin.edit_ivent', ['ivent' => $ivent, 'authors' => $authors]);
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
                $ivent = Ivent::where('id', '=', $request->input('id'))->first();

                $ivent->author_id = $request->input('author_id');
                $ivent->title = $request->input('title');
                $ivent->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $ivent->img = 'http://blog/images/' . $imageName;
                }
                $ivent->save();
            }
        }

        return redirect('/ivent/'.$ivent->id);
    }
}
