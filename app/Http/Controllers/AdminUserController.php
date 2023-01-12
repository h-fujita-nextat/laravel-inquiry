<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\User\AdminUserStoreRequest;
use App\Http\Requests\User\IndexGet;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
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
        $users = User::query()->paginate(self::PER_PAGE, ['*'], 'page', $page);

        return view('adminUsers.index', compact('users'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view("adminUsers.create");
    }

    /**
     * @param AdminUserStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminUserStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = new User();
        $user->fill($validated);
        $user->save();

        return redirect()->route("admin.users.index")->with('flash_message', '登録が完了しました。');
    }
}
