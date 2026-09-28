<?php

namespace App\Services;

use App\Models\Activity;

class ActivityService
{
    public function create(array $data): Activity
    {
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
}
