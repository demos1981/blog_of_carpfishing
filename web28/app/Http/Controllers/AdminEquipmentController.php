<?php

namespace App\Http\Controllers;

use App\Author;

use App\Equipment;
use Illuminate\Http\Request;

class AdminEquipmentController extends Controller
{
    public function add(Request $request)
    {
        $authors = Author::all();
        return view('Admin.add_equipment', ['authors' => $authors]);
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
                $equipment = new Equipment();
                $equipment->author_id = $request->input('author_id');
                $equipment->title = $request->input('title');
                $equipment->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $equipment->img = 'http://blog/images/' . $imageName;
                }
                $equipment->save();

                return redirect()->route('single_equipment', $equipment->id);


            } else {

                return redirect()->route('equipment');

            }
        }
    }

    public function delete(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'DELETE') {
                $equipment = Equipment::find($request->input('id'));
                $equipment->delete();
                return back();
            } else {
                return view('admin.delete_equipment', ['equipment' => Equipment::all()]);
            }
        }
    }

    public function edit($id)
    {
        $equipment = Equipment::where('id', '=', $id)->first();
        $authors = Author::all();
        return view('Admin.edit_equipment', ['equipment' => $equipment, 'authors' => $authors]);
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
                $equipment = Equipment::where('id', '=', $request->input('id'))->first();

                $equipment->author_id = $request->input('author_id');
                $equipment->title = $request->input('title');
                $equipment->body = $request->input('body');
                $image = $request->image;
                if ($image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $equipment->img = 'http://blog/images/' . $imageName;
                }
                $equipment->save();
            }
        }

        return redirect('/equipment/'.$equipment->id);
    }
}
