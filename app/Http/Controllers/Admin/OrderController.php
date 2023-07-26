<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Database\Query\Builder;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $today_date = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function (Builder $query) use ($request) {
            $query->whereDate('created_at', $request->date);
        }, function ($query) use ($today_date) {
            $query->whereDate('created_at', $today_date);
        })
            ->when($request->status != null, function (Builder $query) use ($request) {
                $query->where('status_message', $request->status);
            })
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));

    }

    public function show(int $orderId)
    {

        $order = Order::where('id', $orderId)->first();

        if ($order) {
            return view('admin.orders.show', compact('order'));
        } else {
            return redirect()->back()->with('message', 'No Order found');
        }

    }

    public function updateStatus(int $orderid, Request $request)
    {
        $order = Order::where('id', $orderId)->first();

        if ($order) {
            $order->update([
                'status_message' => $request->status_message,
            ]);

            return redirect()->back()->with('message', 'Order Status Update', compact('order'));
        } else {
            return redirect()->back()->with('message', 'No Order Id found!');
        }
    }

    public function viewInvoice(int $orderId)
    {
        $order = Order::where('id', $orderId)->firstOrFail();

        return view('admin.invoice.gen-invoice', compact('order'));
    }

    public function generateInvoice(int $orderId)
    {
        $order = Order::where('id', $orderId)->firstOrFail();
        $today_date = Carbon::now()->format('d-m-y');
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.gen-invoice', $data);

        return $pdf->download('invoice-'.$orderId.'-'.$today_date.'.pdf');
    }


    public function invoiceMail(int $orderId)
    {
        try{
            $order = Order::where('id', $orderId)->firstOrFail();
            Mail::to("$order->email")->send(new InvoiceMail($order));

            return redirect('admin/orders/'.$order->id)->with('message','user email sent '.$order->email);
        }
        catch(\Exception $e){
            return redirect('admin/orders/'.$order->id)->with('message','user email not sent');
        }
    }
}
