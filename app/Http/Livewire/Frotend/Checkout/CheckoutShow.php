<?php

namespace App\Http\Livewire\Frotend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Mail\OrderMail;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CheckoutShow extends Component
{
    public $carts;

    public $totalAmount = 0;

    public $fullname;

    public $email;

    public $phone;

    public $pincode;

    public $address;

    public $payment_mode = null;

    public $payment_id = null;

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'funda-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);

        foreach ($this->carts as $cartItem) {
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
                'product_color_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price,
            ]);
            if ($cartItem->product_color_id != null) {
                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            } else {
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }

        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();

        if ($codOrder) {
            $this->emit('cartAddedOrUpdated');
            Cart::where('user_id', auth()->user()->id)->delete();

            try{
                $order = Order::findOrfail($codOrder->id);
                Mail::to("$order->email")->send(new OrderMail($order));
            }
            catch(\Exception $e){
                //error show
            }
            session()->flash('message', 'Order Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Place Order Successfully',
                'type' => 'info',
                'status' => 200,
            ]);

            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500,
            ]);
        }
    }

    public function totalAmount()
    {
        $this->totalAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }

        return $this->totalAmount;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->totalAmount = $this->totalAmount();

        return view('livewire.frotend.checkout.checkout-show', ['totalAmount' => $this->totalAmount]);
    }
}
