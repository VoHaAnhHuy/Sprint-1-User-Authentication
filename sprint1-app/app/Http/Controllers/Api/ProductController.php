<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    /**
     * Lấy danh sách products (có phân trang)
     *
     * GET /api/products
     * Query params: ?search=, ?status=, ?sort_by=, ?order=, ?per_page=
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Product::query();

        // Tìm kiếm theo title hoặc description
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Lọc theo status
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        // Sắp xếp
        $sortBy = $request->input('sort_by', 'created_at');
        $order  = $request->input('order', 'desc');
        $query->orderBy($sortBy, $order);

        // Phân trang
        $perPage = $request->input('per_page', 15);

        return ProductResource::collection($query->paginate($perPage));
    }

    /**
     * Tạo product mới
     *
     * POST /api/products
     *
     * @param  StoreProductRequest  $request
     * @return JsonResponse
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Xem chi tiết 1 product (kèm variants)
     *
     * GET /api/products/{product}
     *
     * @param  Product  $product
     * @return ProductResource
     */
    public function show(Product $product): ProductResource
    {
        $product->load('variants');

        return new ProductResource($product);
    }

    /**
     * Cập nhật product
     *
     * PUT/PATCH /api/products/{product}
     *
     * @param  UpdateProductRequest  $request
     * @param  Product               $product
     * @return ProductResource
     */
    public function update(UpdateProductRequest $request, Product $product): ProductResource
    {
        $product->update($request->validated());

        return new ProductResource($product);
    }

    /**
     * Xóa product (soft delete)
     *
     * DELETE /api/products/{product}
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json(null, 204);
    }
}
