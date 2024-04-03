<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Creteria;

class CreteriaController extends Controller
{
    // admin add creteria dynamically
    public function viewPost(){
        return view('admin.createCreteria');
    }

    public function viewCreteria($id){
        $creteria = Creteria::where('id', $id)->first();

        return view('admin.viewCreteria', ['creteria' => $creteria]);
    }

    public function creteriaPost(Request $request) {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
        } else {
            $imageName = null;
        }

        $creteria = new Creteria();

        $creteria->image = $imageName;
        $creteria->title = $request->title;
        $creteria->description = $request->description;

        $creteria->save();

        return redirect()->route('creteriaLayout')->with('success', 'Criteria successfully added.');
    }

    public function deleteCreteria($id){
        $creteria = Creteria::where('id', $id)->first();

        if ($creteria) {
            $creteria->delete();
            return redirect()->back()->with('success', 'Creteria deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Creteria not found.');
        }
    }

    public function editCreteria($id){
        $creteria = Creteria::where('id', $id)->first();

        return view('admin.editCreteria', ['creteria' => $creteria]);
    }

    public function updateCreteria(Request $request, $id){
        $creteria = Creteria::find($id);

        if (!$creteria) {
            return redirect()->back()->with('error', 'Creteria not found.');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            if ($creteria->image) {
                Storage::disk('public')->delete('images/' . $creteria->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');

            $creteria->image = $imageName;
        }

        $creteria->title = $request->title;
        $creteria->description = $request->description;

        $creteria->save();

        return redirect()->back()->with('success', 'Creteria updated successfully.');
    }

}
