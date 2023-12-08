<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\CheckRequest;
use App\Http\Requests\Application\UncheckRequest;
use App\Models\Application;
use App\Models\Service;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * @param CheckRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function check(CheckRequest $request)
    {
        $application = Application::create($request->validated());
        $allCompatibilities = $application->service->all_compatibilities;
        array_push($allCompatibilities, $request->service_id);

        Service::whereNotIn('id', $allCompatibilities)->update(['is_enabled' => false]);
        Service::whereIn('id', $allCompatibilities)->update(['is_enabled' => true]);

        return redirect()->route('services.index')->with('success', 'Application checked successfully');
    }

    /**
     * @param UncheckRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uncheck(UncheckRequest $request)
    {
        Application::where('service_id', $request->service_id)->delete();
        $service = Service::find($request->service_id);
//        $parentApplication =

        return redirect()->route('services.index')->with('success', 'Application unchecked successfully');
    }
}
