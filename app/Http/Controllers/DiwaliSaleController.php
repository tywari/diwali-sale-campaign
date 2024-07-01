<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\DiwaliSaleService;
use App\Http\Requests\DiwaliSaleRequest;

class DiwaliSaleController extends Controller
{
    protected DiwaliSaleService $diwaliSaleService;

    public function __construct(DiwaliSaleService $diwaliSaleService)
    {
        $this->diwaliSaleService = $diwaliSaleService;
    }

    /**
     * @param DiwaliSaleRequest $request
     * @return JsonResponse
     */
    public function handleRequest(DiwaliSaleRequest $request): JsonResponse
    {
        $userInput = $request->validated();
        $products = $userInput['products'];
        $rule = $userInput['rule'];
        if (is_array($products) && !empty($products)) {
            $result = $this->diwaliSaleService->applyRules($products, $rule);
            return response()->json($result);
        }
        return response()->json(['error' => 'Invalid input'], 400);
    }
}