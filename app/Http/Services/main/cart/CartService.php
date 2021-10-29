<?

namespace App\Http\Services\main\cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartService
{

    public function store($id)
    {

        $userId = Auth::id();
        $userCart = Cart::where("user_id", $userId)->get();
        if($userCart->IsEmpty())
        {
            $cart = Cart::create(["user_id" => $userId]);
            
            $cartId = $cart->id;
        }else{
            $cart = Cart::findOrFail($userCart->first()->id);

            $cart->touch();
        }
        if($cart->products->contains($id))
        {
            
        }else{
            $cart->products()->attach($id);
        }
    }

    public function destroy($productId)
    {
        $userId = Auth::id();

        $product = Cart::where("user_id", $userId)->first()->products()->detach($productId);
    }
}