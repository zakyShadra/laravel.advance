<?php

namespace App\Services;

use App\Models\Activity;
use Illuminate\Validation\ValidationException;

class ActivityService
{
    public function create(array $data): Activity
    {
        $data['status'] = 'draft';

        return Activity::create($data);
    }

    public function update(Activity $activity, array $data): Activity
    {
        $activity->update($data);

        return $activity;
    }

    public function delete(Activity $activity): void
    {
        $activity->delete();
    }

    public function publish(Activity $activity): Activity
    {
        if ($activity->status !== 'draft') {
            throw ValidationException::withMessages([
                'status' => 'Hanya kegiatan draft yang dapat dipublikasikan.',
            ]);
        }

        if (! $this->isReadyToPublish($activity)) {
            throw ValidationException::withMessages([
                'status' => 'Kategori, kode, judul, lokasi, tanggal, dan kapasitas harus lengkap sebelum dipublikasikan.',
            ]);
        }

        $activity->update(['status' => 'published']);

        return $activity;
    }

    public function complete(Activity $activity): Activity
    {
        if ($activity->status !== 'published') {
            throw ValidationException::withMessages([
                'status' => 'Hanya kegiatan published yang dapat diselesaikan.',
            ]);
        }

        $activity->update(['status' => 'completed']);

        return $activity;
    }

    private function isReadyToPublish(Activity $activity): bool
    {
        return filled($activity->category_id)
            && filled($activity->code)
            && filled($activity->title)
            && filled($activity->location)
            && filled($activity->start_at)
            && filled($activity->end_at)
            && filled($activity->capacity);
    }
}
