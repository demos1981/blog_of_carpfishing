<?php

namespace App\Http\Controllers;

use App\Author;

use App\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_review', ['authors' => $authors]);
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
                $review = new Review();
                $review->author_id = $request->input('author_id');
                $review->title = $request->input('title');
                $review->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $review->img = 'http://blog/images/' . $imageName;
                }
                $review->save();

                return redirect()->route('single_review', $review->id);


            } else {

                return redirect()->route('review');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'DELETE') {
                $review = Review::find($request->input('id'));
                $review->delete();
                return back();
            } else {
                return view('admin.delete_review', ['review' => Review::all()]);
            }
        }
    }

    public function edit($id)
    {
        $review = Review::where('id', '=', $id)->first();
        $authors = Author::all();
        return view('Admin.edit_review', ['review' => $review, 'authors' => $authors]);
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
                $review = Review::where('id', '=', $request->input('id'))->first();

                $review->author_id = $request->input('author_id');
                $review->title = $request->input('title');
                $review->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $review->img = 'http://blog/images/' . $imageName;
                }
                $review->save();
            }
        }

        return redirect('/review/'.$review->id);
    }
}
