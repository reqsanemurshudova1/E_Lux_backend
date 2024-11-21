<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BasketProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class BasketController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            // bu web üçwn bir validasyad;r ama bizə api lazımdır
            // yəni kiii
            return response()->json(['error' => 'Please log in.'], 401);
            //return redirect()->route('login')->with('error', 'Lütfen giriş yapın.');
        }

        if (!$user->basket) {
            $user->basket()->create();
        }

        $basketId = $user->basket->id;

        $basketItems = BasketProduct::where('basket_id', $basketId)->with('product')->get();

        $totalPrice = $basketItems->sum(function ($item) {
            // bura məncə doğru məntiqdə deyil stoka yox quantityə vurlmalıdı
            return $item->product->product_price * $item->stock_count;
        });

        return response()->json([
            'basketItems' => $basketItems,
            'totalPrice' => $totalPrice,
        ]);
        //bu apidir view nədir? skdjhksf
        // return view('admin.cart.index', compact('basketItems', 'totalPrice'));
    }


    public function store(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        if (!$user) {
            return response()->json(['error' => 'Please log in.'], 401);
            // return redirect()->route('login')->with('error', 'Lütfen giriş yapın.');
        }

        if (!$user->basket) {
            $user->basket()->create();
        }

        $basketId = $user->basket->id;
        $product = Product::find($request->product_id);

        if ($product) {
            if ($product->in_stock) {
                $basket = BasketProduct::where('basket_id', $basketId)
                    ->where('product_id', $product->id)->first();

                if ($basket == null) {
                    $basketItem = new BasketProduct();
                    $basketItem->basket_id = $basketId;
                    $basketItem->product_id = $product->id;
                    $basketItem->stock_count = 1;
                    $basketItem->save();
                } else {
                    if ($basket->stock_count + 1 > $product->stock_count) {
                        return response()->json(['error' => 'Product is out of stock'], 401);
                    }

                    $basket->stock_count += 1;
                    $basket->save();
                }

                return response()->json(['message' => 'Product added to cart']);
            } else {
                return response()->json(['error' => 'Product is out of stock'], 401);
            }
        } else {
            return response()->json(['error' => 'Product not found'], 401);
        }
    }

    public function remove(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        if (!$user) {
            return response()->json(['error' => 'Please log in.'], 401);
        }

        if (!$user->basket) {
            return response()->json(['error' => 'Please log in.'], 401);
        }

        $basketId = $user->basket->id;
        $product = Product::find($request->product_id);

        if ($product) {
            $basket = BasketProduct::where('basket_id', $basketId)
                ->where('product_id', $product->id)->first();

            if ($basket) {
                if ($basket->stock_count > 1) {
                    $basket->stock_count -= 1;
                    $basket->save();
                } else {
                    $basket->delete();
                }
                return response()->json(['message' => 'Product removed from cart']);
            } else {
                return response()->json(['error' => 'Product not found in cart'], 401);
            }
        } else {
            return response()->json(['error' => 'Product not found'], 401);
        }
    }

}


// bütün apilar mükəmməl işləyir, bunları düzgün şəkildə inteqrasiya etməyiniz qalır 
// yenə xatırladıram auth:sanctum middleware olan yerlərə token göndərməsəz error alacaqsızzz
//const response = await fetch("http://localhost:8000/api/cart", {
// headers: {
//     Authorization: `Bearer ${localStorage.getItem("authToken")}`,
//   },
// })

//həmin fetchlərin hamısında bu formada bearer token əlavə etməlisiz 
//yAXSİ bir sualda verim mende carta elave etmek ucun product detailse girib ordan add to cart edirik  product details yazilib ama sehane ele integrasiya etmeyib onnsuzda men davam ede bilerem?yeni carta elave etmek mentiqini deyirem 
// olar niye de olmasın) biraz beynim yanir bir dq gosterim gosterdiyim yerde hele melumatlar yoxdur ona gore qarisir beynim
// indi o hissələrə producları datadan çəlkəcəksiz və add to card dedikdə /cart/store routuna istək atacasız bodyde de həmin məhsulun idsini bu qədər//bir dene orada baxa bilerik integrasiya edende problem yaranirdi sehane ede bilmedi mende cox baxa bilmedim
//  nəyə baxım anlamadı?product details melumatlari integrasiya etmek hissesine datadan cekende sorun yaranir
// ne sorun? 
// postman ile yoxlayanda nə gəlir?
// api düz işləyir inteqrasyada da geri qalan problemləri həll etmək laızmdır 
//orda çəətin birşey yoxdur sadəcə fetch atıb daha sonra map edıcəksiz bu qədər 
//yaxsi baaxaram men cox baxa bilmedim tam sorun neydi deye cox sagolun digerlerini hell edim hele) tamamdır uğurlar)tesekkurler vaxt ayirdiginiz ucun buyurun