<?php

namespace App\Rules;

use App\Models\Application;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckApplicationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $serviceID, Closure $fail): void
    {
        $applicationAlreadyExists = Application::where('service_id', $serviceID)->exists();
        if($applicationAlreadyExists){
            $fail('Incorrect service ID');
        }

        $parentApplication = Application::first();
        if($parentApplication){
            if(!in_array($serviceID, $parentApplication->service->all_compatibilities)){
                $fail('Incorrect service ID');
            }
        }
    }
}
