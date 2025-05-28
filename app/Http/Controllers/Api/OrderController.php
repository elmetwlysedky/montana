<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\OrderRepository;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use App\Traits\JsonResponseTrait;
use App\Services\OrderService;
use App\Services\OrderCalculatorService;
use App\DTOs\OrderData;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    use JsonResponseTrait;
    protected $orderRepository;
    protected $orderService;
    protected $calculatorService;



    public function __construct(
        OrderRepository $param,
        OrderService $orderService,
        OrderCalculatorService $calculatorService)
    {
        $this->orderRepository = $param;
        $this->orderService = $orderService;
        $this->calculatorService = $calculatorService;
    }

    public function store(OrderRequest $request)
    {
        $data = $request->validated();

        // Validate stock using OrderService
        if ($error = $this->orderService->validateStock($request->items)) {
            return $this->jsonFailed($error);
        }

        // Calculate totals
        $subtotal = $this->calculatorService->calculateSubtotal($request->items);
        $subtotal = $this->calculatorService->applyDiscount($subtotal, $data['discount'] ?? 0);
        $totalPrice = $this->calculatorService->calculateTotal($subtotal, $data['delivery_price'] ?? 0);

        // Add calculated totals to data
        $data['subtotal'] = $subtotal;
        $data['total_price'] = $totalPrice;
        $data['status'] = 'prepare';
        $data['user_id'] = 1; // TODO: Get from auth

        // Convert validated data to OrderData object
        $orderData = OrderData::fromRequest($data);

        // Create order using OrderData object
        $order = $this->orderService->createOrder($orderData);

        return $this->jsonSuccess($order->load('products'));
    }


}
