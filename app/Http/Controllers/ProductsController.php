<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Product\BuyProduct;
use App\Services\Product\GetProductListing;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsController extends Controller
{

    /**
     * @var GetProductListing
     */
    private $getProductListing;

    /**
     * @var BuyProduct
     */
    private $buyProduct;

    public function __construct(GetProductListing $getProductListing,
                                BuyProduct $buyProduct)
    {
        $this->getProductListing = $getProductListing;

        $this->buyProduct = $buyProduct;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->getProductListing->getProductListing();

        return view('products.index', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function buy($id)
    {
        $product = Product::find($id);
        if(empty($product)) {
            throw new NotFoundHttpException('Product not found');
        }

        $this->buyProduct->buy($product);

        return redirect()->route('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
