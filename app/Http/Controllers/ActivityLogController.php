<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->with('causer')->get();
        return view('activity-log.index', compact('activities'));
    }

    public function clear(Request $request)
    {
        $request->validate([
            'days' => 'required|integer|min:1',
        ]);

        $days = $request->input('days');

        $deleted = Activity::where('created_at', '<', now()->subDays($days))->delete();

        return redirect()->route('activity-log.index')->with('success', "{$deleted} log lebih lama dari {$days} hari telah dihapus.");
    }
}
