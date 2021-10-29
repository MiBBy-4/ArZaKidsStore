<?

namespace App\Http\Services\main\order;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService
{

    public function store($data)
    {
        $userId = Auth::id();
        $userOrder = Order::where("user_id", $userId)->get();
        $products = Cart::where("user_id", $userId)->first()->products;

        if($userOrder->IsEmpty()){

            $order = Order::create(['user_id' => $userId, 
            'FIO' => $data['FIO'],
            'adress' => $data['adress'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'total_price' => Cart::where("user_id", $userId)->first()->products->sum('price'),
        ]);

        }else{

            $order = Order::findOrFail($userOrder->first()->id);

            $order->touch();
        }

        foreach($products as $product){
            if(!$order->products->contains($product->id)){
                
                $order->products()->attach($product->id);
            }
            Cart::where("user_id", $userId)->first()->products()->detach($product->id);
        }

        
    }
    
}