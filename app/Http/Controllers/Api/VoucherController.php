<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\VoucherRequest;

use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use App\Services\Voucher\CreateVoucherService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VoucherController extends Controller
{

    /**
     * @var CreateVoucherService
     */
    private $createVoucherService;

    public function __construct(CreateVoucherService $createVoucherService)
    {
        $this->createVoucherService = $createVoucherService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * @SWG\Post(
     *     path="/api/voucher",
     *     summary="Create voucher",
     *     produces={"application/json"},
     *     tags={"Voucher"},
     *     @SWG\Parameter(
     *         name="started_date",
     *         in="formData",
     *         description="Started date",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         name="end_date",
     *         in="formData",
     *         description="End date",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *         name="discount_tier",
     *         in="formData",
     *         description="Discount tier - when given voucher will be associate with discount tier",
     *         required=false,
     *         type="integer"
     *     ),
     *     @SWG\Parameter(
     *         name="product_id",
     *         in="formData",
     *         description="Product id - when given voucher is bind to product",
     *         required=false,
     *         type="integer"
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
     * @param VoucherRequest $voucherRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(VoucherRequest $voucherRequest)
    {
        $voucher = $this->createVoucherService->createVoucher($voucherRequest);

        return [new VoucherResource($voucher)];
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
     * @SWG\Get(
     *     path="/api/voucher/{id}",
     *     summary="Get voucher",
     *     produces={"application/json"},
     *     tags={"Voucher"},
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         description="id voucher",
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
     * @return VoucherResource
     */
    public function show($id)
    {
        return new VoucherResource(Voucher::find($id));
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
     * @SWG\Delete(
     *     path="/api/voucher/{id}",
     *     summary="remove voucher",
     *     produces={"application/json"},
     *     tags={"Voucher"},
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         description="id voucher",
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
     * @param Voucher $voucher
     * @return void
     * @throws \Exception
     */
    public function destroy($id)
    {
        $voucher = Voucher::find($id);
        if(empty($voucher)) {
            throw new NotFoundHttpException('Not found Voucher');
        }
        $voucher->product()->detach();

        $voucher->delete();

        return [];
    }
}
