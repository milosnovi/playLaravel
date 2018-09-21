<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductBuyRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\Product\BuyProduct;
use App\Services\Product\CreateProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @var CreateProductService
     */
    private $createProductService;

    /**
     * @var BuyProduct
     */
    private $buyProduct;

    public function __construct(CreateProductService $createProductService,
                                BuyProduct $buyProduct)
    {
        $this->createProductService = $createProductService;

        $this->buyProduct = $buyProduct;
    }

    /**
     * @SWG\Post(
     *     path="/api/product",
     *     summary="Create product",
     *     produces={"application/json"},
     *     tags={"Product"},
     *     @SWG\Parameter(
     *         name="name",
     *         in="formData",
     *         description="Product name",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         name="price",
     *         in="formData",
     *         description="Product price",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Response",
     *             @SWG\Schema(
     *              @SWG\Property(
     *                  description="Response",
     *                  type="array",
     *                  property="response",
     *                  @SWG\Items(
     *                      type="object",
     *                      @SWG\Property(property="code", type="string"),
     *                      @SWG\Property(property="message", type="string"),
     *                      @SWG\Property(property="success", type="boolean"))
     *                  ),
     *              )
     *          )
     *     )
     * )
     *
     * @param ProductCreateRequest $productCreateRequest
     * @return array
     */
    public function create(ProductCreateRequest $productCreateRequest)
    {
        $product = $this->createProductService->craeteProduct($productCreateRequest);

        return [new ProductResource($product)];
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
     *
     * @SWG\Get(
     *     path="/api/product/{id}",
     *     summary="Get product",
     *     produces={"application/json"},
     *     tags={"Product"},
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         description="Product id",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Response",
     *             @SWG\Schema(
     *              @SWG\Property(
     *                  description="Response",
     *                  type="array",
     *                  property="response",
     *                  @SWG\Items(
     *                      type="object",
     *                      @SWG\Property(property="code", type="string"),
     *                      @SWG\Property(property="message", type="string"),
     *                      @SWG\Property(property="success", type="boolean"))
     *                  ),
     *              )
     *          )
     *     )
     * )
     *
     * @param $id
     * @return ProductResource
     *
     */
    public function show($id)
    {
        return new ProductResource(Product::find($id));
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

    /**
     *
     * @SWG\Post(
     *     path="/api/product/buy",
     *     summary="Buy product",
     *     produces={"application/json"},
     *     tags={"Product"},
     *     @SWG\Parameter(
     *         name="product_id",
     *         in="formData",
     *         description="Product id",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Response",
     *             @SWG\Schema(
     *              @SWG\Property(
     *                  description="Response",
     *                  type="array",
     *                  property="response",
     *                  @SWG\Items(
     *                      type="object",
     *                      @SWG\Property(property="code", type="string"),
     *                      @SWG\Property(property="message", type="string"),
     *                      @SWG\Property(property="success", type="boolean"))
     *                  ),
     *              )
     *          )
     *     )
     * )
     *
     * @param ProductBuyRequest $productBuyRequest
     * @return void
     */
    public function buy(ProductBuyRequest $productBuyRequest)
    {
        $product = Product::find($productBuyRequest->get('product_id'));
        $product = $this->buyProduct->buy($product);

        return new ProductResource($product);

    }
}
