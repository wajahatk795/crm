<?php

namespace App\Http\Controllers;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index(){
        $data = Merchant::all();
        return view('admin.merchant.index', compact('data'));
    }

    public function create(){
        return view('admin.merchant.create');
    }

    public function store(Request $request){
        try {
            $request->validate([
                'name' => 'required',
                'public_key' => 'required',
                'secret_key' => 'required',
                'status' => 'required',
            ]);
            $merchant = new Merchant();
            $merchant->name = $request->name;
            $merchant->public_key = $request->public_key;
            $merchant->secret_key = $request->secret_key;
            $merchant->status = $request->status;
            $merchant->login_id = $request->login_id;
            $merchant->is_authorized = $request->is_authorized ?? '0';
            $merchant->save();
            return redirect()->route('admin.merchant.index')->with('success','Merchant created Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id){
        try {
            $data = Merchant::find($id);
            return view('admin.merchant.edit', compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, Merchant $merchant){
        try {
            $request->validate([
                'name' => 'required',
                'public_key' => 'required',
                'secret_key' => 'required',
                'status' => 'required',
            ]);
            $merchant->update($request->except('_method', '_token'));
            return redirect()->route('admin.merchant.edit', $merchant->id)->with('success','Merchant Updated Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
