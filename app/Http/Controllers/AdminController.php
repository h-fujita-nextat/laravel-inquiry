<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $inquiries = Inquiry::paginate(10);

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
