<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Contact::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $inquiry = Contact::findOrFail($id);
        $inquiry->status = $request->status;
        $inquiry->save();

        return redirect()->route('admin.inquiries.index')->with('success', 'Đã cập nhật trạng thái.');
    }

    public function destroy($id)
    {
        $inquiry = Contact::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')->with('success', 'Đã xóa yêu cầu.');
    }
}
