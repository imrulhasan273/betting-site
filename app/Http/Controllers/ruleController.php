<?php

namespace App\Http\Controllers;

use App\Rule;
use Illuminate\Http\Request;

class ruleController extends Controller
{
    public function index()
    {
        $rules = Rule::limit(1)->orderBy('id', 'desc')->get();
        return view('dashboard.rules.rule', compact('rules'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'rule_description' => 'required',

        ],
            [
                'rule_description.required' => 'Blank field is not allowed',

            ]);

        $rule = new Rule();
        $rule->rule_description = $request->rule_description;
        $rule->save();
        return back()->with('message', 'Rules Added !!');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'rule_description' => 'required',

        ],
            [
                'rule_description.required' => 'Blank field is not allowed',

            ]);

        $rule = Rule::find($id);
        $rule->rule_description = $request->rule_description;
        $rule->save();
        return back()->with('message', 'Rules Updated !!');

    }
}
