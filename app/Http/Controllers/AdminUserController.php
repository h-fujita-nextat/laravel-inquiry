<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\IndexGet;
use App\Models\User;
use Illuminate\View\View;

class AdminUserController extends Controller
{
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
        $page = $request->validated('page') ?? self::DEFAULT_PAGE;
        $users = User::query()->orderBy('email_verified_at', 'desc')
            ->paginate(self::PER_PAGE, ['*'], 'page', $page);

        return view('adminUsers.index', compact('users'));
    }
}
