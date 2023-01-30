<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\InquiryStoreRequest;
use App\Http\Requests\User\IndexGet;
use App\Models\Inquiry;
use App\Models\User;
use App\Services\InquiryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class InquiryController
 * @package App\Http\Controllers
 * お問い合わせ用コントローラー
 */
class InquiryController extends Controller
{
    /**
     * @var InquiryService
     */
    private InquiryService $inquiryService;

    /**
     * @param InquiryService $inquiryService
     */
    public function __construct(
        InquiryService $inquiryService
    ) {
        $this->inquiryService = $inquiryService;
    }

    /**
     * 1ページあたりの表示件数
     */
    private const PER_PAGE = 10;

    /**
     * 初期ページ
     */
    private const DEFAULT_PAGE = 1;

    /**
     * @param IndexGet $request
     * @return View
     */
    public function index(IndexGet $request): View
    {
        $keyword = $request->input('keyword');
        $query = Inquiry::query();

        if (!empty($keyword)) {
            $query->where('content', 'like', '%' . $keyword . '%');
        }

        $page = $request->validated('page') ?? self::DEFAULT_PAGE;
        $contents = $query->paginate(self::PER_PAGE, ['*'], 'page', $page);


        return view('inquiry', compact('contents'))->with('keyword', $keyword);
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

        $users = User::all();
        $users->each(
            function (User $user) use ($inquiry) {
                $this->inquiryService->send($user, $inquiry);
            }
        );

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
