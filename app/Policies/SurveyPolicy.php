<?php

namespace App\Policies;

use App\Models\Survey;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurveyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the survey can view any models.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function access()
    {
        return Survey::count() > 0;
    }
}
