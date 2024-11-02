<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ourservice;
use Illuminate\Http\Request;
use App\Models\OurserviceItem;

class OurServicesController extends Controller
{
    public function index()
    {
        $services = Ourservice::all();
        $serviceItems = OurserviceItem::all();
        return view('admin.ourservices.index', compact('services', 'serviceItems'));
    }

    public function create()
    {
        $service = Ourservice::first();
        if ($service) {
            return redirect()->route('admin.ourservices.edit', $service->id)
                ->with('info', 'A service record already exists. You can edit it.');
        }

        return view('admin.ourservices.create');
    }

    public function store(Request $request)
    {
        $service = Ourservice::first();
        if ($service) {
            return redirect()->route('admin.ourservices.edit', $service->id)
                ->with('info', 'A service record already exists. You can edit it.');
        }

        $request->validate([
            'header' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Ourservice::create($request->only(['header', 'description']));

        return redirect()->route('admin.ourservices.index')->with('success', 'Service added successfully');
    }

    public function createItem()
    {
        return view('admin.ourservices.item.create');
    }

    public function storeItem(Request $request)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $create_time = now();

        OurserviceItem::create(array_merge(
            $request->only(['header', 'description', 'icon']),
            ['create_time' => $create_time]
        ));

        return redirect()->route('admin.ourservices.index')->with('success', 'Ourservice item added successfully');
    }

    public function editItem($id)
    {
        $serviceItem = OurserviceItem::findOrFail($id);
        return view('admin.ourservices.item.edit', compact('serviceItem'));
    }

    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $serviceItem = OurserviceItem::findOrFail($id);

        $serviceItem->update($request->only(['header', 'description', 'icon']));

        return redirect()->route('admin.ourservices.index')->with('success', 'Service item updated successfully');
    }

    public function edit($id)
    {
        $service = Ourservice::findOrFail($id);
        return view('admin.ourservices.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $service = Ourservice::findOrFail($id);
        $service->update($request->only(['header', 'description']));

        return redirect()->route('admin.ourservices.index')->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service = Ourservice::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.ourservices.index')->with('success', 'Service deleted successfully');
    }

    public function destroyItem($id)
    {
        $item = OurServiceItem::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.ourservices.index')->with('success', 'Service item deleted successfully.');
    }
}
