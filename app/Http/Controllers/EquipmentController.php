<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

/**
 * Class EquipmentController
 * @package App\Http\Controllers
 */
class EquipmentController extends Controller
{

    const ROUTE_BASE = 'equipment';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $equipments = \App\Models\Equipment::where('status', 1)
                ->orderBy('created_at', 'Desc')
                ->paginate();

            return view('equipment.index', compact('equipments'))
                ->with(['categoryEquipment:id,name'])
                ->with('i', (request()->input('page', 1) - 1) * $equipments->perPage());
        } catch (\Exception $ex) {
            $route = self::ROUTE_BASE;
            $error = $ex->getMessage();
            return view('errors.error', compact('route', 'error'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $equipment = new \App\Models\Equipment();
            $category_equipment =  \App\Models\CategoryEquipment::where('status', '=', 1)->pluck('name', 'id');

            return view('equipment.create', compact('equipment', 'category_equipment'));
        } catch (\Exception $ex) {
            $route = self::ROUTE_BASE;
            $error = $ex->getMessage();
            return view('errors.error', compact('route', 'error'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $route = self::ROUTE_BASE;
        request()->validate(\App\Models\Equipment::$rules);
        try {
            \App\Models\Equipment::create($request->all());
            return redirect()->route('equipment.index')
                ->with('success', 'Equipo creado correctamente.');
        } catch (\Exception $ex) {
            $error = $ex->getMessage();
            return view('errors.error', compact('route', 'error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string $uuid
     * @return \Illuminate\Http\Response
     */
    public function show(string $uuid)
    {
        $route = self::ROUTE_BASE;

        try {
            $equipment = \App\Models\Equipment::where('uuid', $uuid)
                ->where('status', 1)
                ->with(['categoryEquipment:id,name'])
                ->first();

            if (!empty($equipment)) {
                return view('equipment.show', compact('equipment'));
            } else {
                return view('errors.notfound', compact('route'));
            }
        } catch (\Exception $ex) {
            $error = $ex->getMessage();
            return view('errors.error', compact('route', 'error'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit(string $uuid)
    {

        $route = self::ROUTE_BASE;
        try {
            $equipment = \App\Models\Equipment::where('uuid', $uuid)
                ->where('status', 1)
                ->first();

            if (!empty($equipment)) {
                $category_equipment =  \App\Models\CategoryEquipment::where('status', '=', 1)->pluck('name', 'id');

                return view('equipment.edit', compact('equipment', 'category_equipment'));
            } else {
                return view('errors.notfound', compact('route'));
            }
        } catch (\Exception $ex) {
            $error = $ex->getMessage();
            return view('errors.error', compact('route', 'error'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Equipment $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Models\Equipment $equipment)
    {
        request()->validate(\App\Models\Equipment::$rules);

        try {
            $equipment->update($request->all());

            return redirect()->route('equipment.index')
                ->with('success', 'Equipo actualizado correctamente.');
        } catch (\Exception $ex) {
            $route = self::ROUTE_BASE;
            $error = $ex->getMessage();
            return view('errors.error', compact('route', 'error'));
        }
    }

    /**
     * @param string $uuid
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(string $uuid)
    {
        $route = self::ROUTE_BASE;

        try {
            $equipment = \App\Models\Equipment::where('uuid', $uuid)->where('status', 1)->first();

            if (!empty($equipment)) {
                $equipment->status = 0;
                $equipment->update();
                return redirect()->route('equipment.index')
                    ->with('success', 'Equipo eliminado correctamente');
            } else {
                return view('errors.notfound', compact('route'));
            }
        } catch (\Exception $ex) {
            $error = $ex->getMessage();
            return view('errors.error', compact('route', 'error'));
        }
    }
}
