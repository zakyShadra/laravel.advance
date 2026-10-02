<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Activity;
use App\Services\RegistrationService;

class RegistrationController extends Controller
{
    public function __construct(protected RegistrationService $registrationService)
    {
    }

    public function store(StoreRegistrationRequest $request, Activity $activity)
    {
        $this->registrationService->register($activity, $request->validated());

        return redirect()
            ->route('activities.show', $activity)
            ->with('success', 'Pendaftaran berhasil.');
    }
}
