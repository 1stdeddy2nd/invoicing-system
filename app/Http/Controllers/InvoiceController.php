<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function index(): View
    {
        $invoices = Invoice::join('users', 'invoices.user_id', '=', 'users.id')
            ->join('fruits', 'invoices.fruit_id', '=', 'fruits.id')
            ->join('categories', 'fruits.category_id', '=', 'categories.id')
            ->select(
                'invoices.*',
                'categories.name as category_name',
                'users.name as user_name',
                'fruits.name as fruit_name',
                'fruits.unit as fruit_unit',
                'fruits.price as fruit_price'
            )
            ->get();
        $total = 0;
        foreach($invoices as $invoice) {
            $total += ($invoice->qty * $invoice->fruit_price);
        }
        return view('invoice.index')->with([
            'invoices' => $invoices,
            'total' => $total
        ]);
    }
    public function print(): Response
    {
        $invoices = Invoice::join('users', 'invoices.user_id', '=', 'users.id')
            ->join('fruits', 'invoices.fruit_id', '=', 'fruits.id')
            ->join('categories', 'fruits.category_id', '=', 'categories.id')
            ->select(
                'invoices.*',
                'categories.name as category_name',
                'users.name as user_name',
                'fruits.name as fruit_name',
                'fruits.unit as fruit_unit',
                'fruits.price as fruit_price'
            )
            ->get();
        $total = 0;
        foreach($invoices as $invoice) {
            $total += ($invoice->qty * $invoice->fruit_price);
        }
        $pdf = PDF::loadview('invoice.print', ['invoices' => $invoices, 'total' => $total]);
        return $pdf->download('invoices.pdf');
    }

    public function create(): View
    {
        return view('invoice.create')->with([
            'fruits' => Fruit::all(),
            'users' => User::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required',
            'fruit_id' => 'required',
            'qty' => 'required',
        ]);

        $invoice = new Invoice;
        $invoice->user_id = $request->user_id;
        $invoice->fruit_id = $request->fruit_id;
        $invoice->qty = $request->qty;
        $invoice->save();

        return Redirect::route('invoice.index')->with('success', 'Invoice created successfully!');
    }

    public function show($id): View
    {
        return view('invoice.edit')->with([
            'invoice' => Invoice::find($id),
            'fruits' => Fruit::all(),
            'users' => User::all()
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required',
            'fruit_id' => 'required',
            'qty' => 'required',
        ]);

        $invoice = Invoice::find($id);
        $invoice->user_id = $request->user_id;
        $invoice->fruit_id = $request->fruit_id;
        $invoice->qty = $request->qty;
        $invoice->save();

        return Redirect::route('invoice.index')->with('success', 'Invoice updated successfully!');
    }


    public function destroy($id): RedirectResponse
    {
        $invoice = Invoice::find($id);
        $invoice->delete();

        return Redirect::route('invoice.index')->with('success', 'Invoice deleted successfully!');
    }
}
