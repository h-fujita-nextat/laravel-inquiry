<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\IndexGet;
use App\Models\Inquiry;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    private const PER_PAGE = 10;

    /**
     * @return View
     */
    public function index(IndexGet $request)
    {
        $inquiries = Inquiry::orderBy('created_at', 'desc')->paginate(self::PER_PAGE);

        return view('admin.index', compact('inquiries'));
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $inquiry = Inquiry::findOrFail($id);

        return view('admin.show', compact('inquiry'));
    }
}
