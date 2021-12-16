<?php

namespace App\Http\Controllers;

use App\Author;
use App\logistic;
use App\News;
use Illuminate\Http\Request;

class AdminLogisticController extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_logistic', ['authors' => $authors]);
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
                $logic = new logistic();
                $logic->author_id = $request->input('author_id');
                $logic->title = $request->input('title');
                $logic->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $logic->img = 'http://blog/images/' . $imageName;
                }
                $logic->save();

                return redirect()->route('single_logistic', $logic->id);


            } else {

                return redirect()->route('logistic');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'DELETE') {
                $logic = logistic::find($request->input('id'));
                $logic->delete();
                return back();
            } else {
                return view('admin.delete_logistic', ['logistic' => logistic::all()]);
            }
        }
    }

    public function edit($id)
    {
        $logic = logistic::where('id', '=', $id)->first();
        $authors = Author::all();
        return view('Admin.edit_logistic', ['logistic' => $logic, 'authors' => $authors]);
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
                $logic = logistic::where('id', '=', $request->input('id'))->first();

                $logic->author_id = $request->input('author_id');
                $logic->title = $request->input('title');
                $logic->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $logic->img = 'http://blog/images/' . $imageName;
                }
                $logic->save();
            }
        }

        return redirect('/logistic/'.$logic->id);
    }
}
