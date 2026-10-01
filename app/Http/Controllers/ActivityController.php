<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\Category;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct(protected ActivityService $activityService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $activities = Activity::query()
            ->with('category')
            ->search($request->query('search'))
            ->when($request->filled('category_id'), fn ($query) => $query->where('category_id', $request->query('category_id')))
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->query('status')))
            ->when(
                $request->query('sort') === 'oldest',
                fn ($query) => $query->oldest('start_at'),
                fn ($query) => $query->latest('start_at'),
            )
            ->paginate(10)
            ->withQueryString();

        $categories = Category::all();

        return view('activities.index', compact('activities', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('activities.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        $this->activityService->create($request->validated());

        return redirect()
            ->route('activities.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        $categories = Category::all();

        return view('activities.edit', compact('activity', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $this->activityService->update($activity, $request->validated());

        return redirect()
            ->route('activities.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $this->activityService->delete($activity);

        return redirect()
            ->route('activities.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }

    /**
     * Publish the specified draft activity.
     */
    public function publish(Activity $activity)
    {
        $this->activityService->publish($activity);

        return redirect()
            ->route('activities.show', $activity)
            ->with('success', 'Kegiatan berhasil dipublikasikan.');
    }

    /**
     * Mark the specified published activity as completed.
     */
    public function complete(Activity $activity)
    {
        $this->activityService->complete($activity);

        return redirect()
            ->route('activities.show', $activity)
            ->with('success', 'Kegiatan berhasil diselesaikan.');
    }
}
