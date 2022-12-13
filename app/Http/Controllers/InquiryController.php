<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\InquiryStoreRequest;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class InquiryController
 * @package App\Http\Controllers
 * お問い合わせ用コントローラー
 */
class InquiryController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('inquiry');
    }

    /**
     * @param InquiryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(InquiryStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $inquiry = new Inquiry();
        $inquiry->fill($validated);
        $inquiry->save();

        return redirect()->route("inquiries.complete");
    }

    /**
     * @return View
     */
    public function complete(): View
    {
        return view('inquiryComplete');
    }
}
