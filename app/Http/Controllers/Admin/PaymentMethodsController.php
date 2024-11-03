<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class  PaymentMethodsController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethods::all();
        return view('admin.payment_methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('admin.payment_methods.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $imgPath = $request->file('img')->store('payment_methods', 'public');
        } else {
            return back()->withErrors(['img' => 'Error']);
        }

        PaymentMethods::create([
            'img' => $imgPath,
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.payment_methods.index')->with('success', 'Payment Methods added successfully.');
    }

    public function edit($id)
    {
        $paymentMethods = PaymentMethods::findOrFail($id);
        return view('admin.payment_methods.edit', compact('paymentMethods'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
        ]);

        $paymentMethods = PaymentMethods::findOrFail($id);

        if ($request->hasFile('img')) {
            if ($paymentMethods->img) {
                Storage::disk('public')->delete($paymentMethods->img);
            }
            $imagePath = $request->file('img')->store('payment_methods', 'public');
            $paymentMethods->img = $imagePath;
        }

        $paymentMethods->name = $request->name;
        $paymentMethods->save();

        return redirect()->route('admin.payment_methods.index')->with('success', 'payment_methods updated successfully.');
    }

    public function destroy($id)
    {
        $paymentMethods = PaymentMethods::findOrFail($id);

        if ($paymentMethods->img) {
            Storage::disk('public')->delete($paymentMethods->img);
        }

        $paymentMethods->delete();
        return redirect()->route('admin.payment_methods.index')->with('success', 'payment_methods deleted successfully.');
    }

//    Public Api

    public function getPaymentMethods()
    {
        $paymentMethods = PaymentMethods::all();
        return response()->json([
            'status' => 'success',
            'data' => $paymentMethods
        ], 200);
    }
}
