<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCompatibility\SyncRequest;
use App\Models\Service;
use App\Models\ServiceCompatibility;
use Illuminate\Http\Request;

class ServiceCompatibilityController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $services = Service::with('compatibilities.service', 'reverseCompatibilities.service')->get();

        return view('compatibilities.index', compact('services'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show()
    {
        $allServices = Service::all();

        return view('compatibilities.sync', compact('allServices'));
    }

    /**
     * @param SyncRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sync(SyncRequest $request)
    {
        $serviceID = $request->service_id;
        $data = [];

        foreach ($request->compatibilities as $compatibleID){
            $data[] = [
                'service_id' => $serviceID,
                'compatible_id' => $compatibleID,
            ];
        }
        ServiceCompatibility::where('service_id', $serviceID)->orWhere('compatible_id', $serviceID)->delete();
        ServiceCompatibility::insert($data);

        return redirect()->route('services.index')->with('success', 'Service compatibilities sync successfully');
    }
}
