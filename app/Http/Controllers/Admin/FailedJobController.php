<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class FailedJobController extends Controller
{
    public function index()
    {
        $failedJobs = DB::table('failed_jobs')->orderByDesc('id')->get();

        return view('admin.failed_jobs.index', compact('failedJobs'));
    }

    public function retry($id)
    {
        Artisan::call('queue:retry', [$id]);

        return redirect()->route('failed-jobs.index')
            ->with('success', 'Job retried successfully');
    }

    public function destroy($id)
    {
        DB::table('failed_jobs')->where('id', $id)->delete();

        return redirect()->route('failed-jobs.index')
            ->with('success', 'Job deleted successfully');
    }
}
