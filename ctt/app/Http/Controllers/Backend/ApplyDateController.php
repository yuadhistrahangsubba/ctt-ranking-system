<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplyDate;

class ApplyDateController extends Controller
{
    public function viewCreateDate()
    {
        return view('admin.createDate');
    }

    public function viewDate($id)
    {
        $apply = ApplyDate::where('id', $id)->first();

        return view('admin.viewDate', ['apply' => $apply]);
    }

    public function datePost(Request $request) {
        $apply = new ApplyDate();

        $apply->applyDate = $request->date;
        $apply->save();

        return redirect()->route('dateLayout')->with('success', 'Date successfully added.');
    }

    public function deleteDate($id)
    {
        $apply = ApplyDate::where('id', $id)->first();

        if ($apply) {
            $apply->delete();
            return redirect()->back()->with('success', 'Date deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Date not found.');
        }
    }

    public function editDate($id)
    {
        $apply = ApplyDate::where('id', $id)->first();

        return view('admin.editDate', ['apply' => $apply]);
    }

    public function updateDate(Request $request, $id)
    {
        $apply =  ApplyDate::where('id', $id)->first();

        if ($apply) {
            $apply->update($request->all());
            return redirect()->back()->with('success', 'Date updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Date not found.');
        }
    }

}
