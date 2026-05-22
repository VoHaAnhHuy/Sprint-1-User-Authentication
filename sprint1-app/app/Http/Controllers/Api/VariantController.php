<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVariantRequest;
use App\Http\Requests\UpdateVariantRequest;
use App\Http\Resources\VariantResource;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VariantController extends Controller
{
    /**
     * Lấy danh sách variants của 1 product
     *
     * GET /api/products/{product}/variants
     *
     * @param  Product  $product
     * @return AnonymousResourceCollection
     */
    public function index(Product $product): AnonymousResourceCollection
    {
        $variants = $product->variants()->orderBy('position')->get();

        return VariantResource::collection($variants);
    }

    /**
     * Tạo variant mới cho 1 product
     *
     * POST /api/products/{product}/variants
     *
     * @param  StoreVariantRequest  $request
     * @param  Product              $product
     * @return JsonResponse
     */
    public function store(StoreVariantRequest $request, Product $product): JsonResponse
    {
        $variant = $product->variants()->create($request->validated());

        return (new VariantResource($variant))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Xem chi tiết 1 variant
     *
     * GET /api/products/{product}/variants/{variant}
     *
     * @param  Product  $product
     * @param  Variant  $variant
     * @return VariantResource
     */
    public function show(Product $product, Variant $variant): VariantResource
    {
        // Đảm bảo variant thuộc về product
        if ($variant->product_id !== $product->id) {
            abort(404);
        }

        return new VariantResource($variant);
    }

    /**
     * Cập nhật variant
     *
     * PUT/PATCH /api/products/{product}/variants/{variant}
     *
     * @param  UpdateVariantRequest  $request
     * @param  Product               $product
     * @param  Variant               $variant
     * @return VariantResource
     */
    public function update(UpdateVariantRequest $request, Product $product, Variant $variant): VariantResource
    {
        // Đảm bảo variant thuộc về product
        if ($variant->product_id !== $product->id) {
            abort(404);
        }

        $variant->update($request->validated());

        return new VariantResource($variant);
    }

    /**
     * Xóa variant (soft delete)
     *
     * DELETE /api/products/{product}/variants/{variant}
     *
     * @param  Product  $product
     * @param  Variant  $variant
     * @return JsonResponse
     */
    public function destroy(Product $product, Variant $variant): JsonResponse
    {
        // Đảm bảo variant thuộc về product
        if ($variant->product_id !== $product->id) {
            abort(404);
        }

        $variant->delete();

        return response()->json(null, 204);
    }
}
