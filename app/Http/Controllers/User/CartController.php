<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OnlineCourses;
use Darryldecode\Cart\CartCondition;
use Darryldecode\Cart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function cart($id)
    {
        $product['product'] = DB::table('online_courses')->where('id', $id)->first();
        $this->add($product['product']);
        return view('user.addtocart', ['product' => $product]);
    }
    public function add($product)
    {
        $cartItem = Cart::getContent();
        $temp = 0;
        foreach ($cartItem as $item) {
            if ($item->id == $product->course_id) {
                $temp = 1;
            }
        }
        if ($temp == 0) {
            Cart::add(array(
                'id'         => $product->course_id,
                'name'       => $product->title,
                'price'      => $product->price,
                'quantity'   => 1,
                'attributes' => array(),
                'associatedModel' => $product,
            ));
            return redirect()->route('cart-index');
        } else {
            return redirect()->route('cart',['id', $product->id])->with('status', 'Khóa học đã có trong giỏ hàng!');
        }
    }
    public function index()
    {
        $cartItem = Cart::getContent();
        $coupon   = Cart::getConditions();
        return view('user.shoppingcart', ['cart' => $cartItem, 'coupon' => $coupon]);
    }
    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }
    public function coupon(Request $request)
    {
        $coupon = $request->coupon;
        if ($coupon == null) {
            return redirect()->route('cart-index')->with('no','Chưa nhập mã');
        }else{
            $km = DB::table('coupons')->where('code', $coupon)->first();
            if ($km != null) {
                $condition = new CartCondition(array(
                    'name' => $km->code,
                    'type' => 'coupon',
                    'target' => 'total',
                    'value' => '-'.$km->discount.'%',
                    )
                );
                Cart::condition($condition);
                return redirect()->route('cart-index');
            }else{
                return redirect()->route('cart-index')->with('no','Không có mã khuyến mãi này');
            }
        }

    }
    public function cpcheckout(Request $request)
    {
        $coupon = $request->coupon;
        if ($coupon == null) {
            return redirect()->route('check-out')->with('no','Chưa nhập mã');
        }else{
            $km = DB::table('coupons')->where('code', $coupon)->first();
            if ($km != null) {
                $condition = new CartCondition(array(
                    'name' => $km->code,
                    'type' => 'coupon',
                    'target' => 'total',
                    'value' => '-'.$km->discount.'%',
                    )
                );
                Cart::condition($condition);
                return redirect()->route('check-out');
            }else{
                return redirect()->route('check-out')->with('no','Không có mã khuyến mãi này');
            }
        }

    }
}
