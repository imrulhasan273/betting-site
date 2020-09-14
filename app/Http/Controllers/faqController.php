<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function index()
    {
        $faqs = Faq::limit(1)->orderBy('id', 'desc')->get();
        return view('dashboard.faqs.faq', compact('faqs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'faq_description' => 'required',

        ],
            [
                'faq_description.required' => 'Blank field is not allowed',

            ]);

        $faq = new Faq();
        $faq->faq_description = $request->faq_description;
        $faq->save();
        return back()->with('message', 'FAQ Added !!');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'faq_description' => 'required',

        ],
            [
                'faq_description.required' => 'Blank field is not allowed',

            ]);

        $faq = Faq::find($id);
        $faq->faq_description = $request->faq_description;
        $faq->save();
        return back()->with('message', 'FAQ Updated !!');

    }
}
