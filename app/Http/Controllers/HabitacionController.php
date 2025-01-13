<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Habitacion;
use Illuminate\Http\Request;
use App\Http\Requests\HabitacionRequest;
use App\Http\Resources\HabitacionResource;
use App\Http\Requests\EditHabitacionRequest;
use App\Http\Resources\HabitacionCollection;

class HabitacionController extends Controller
{
    /**
     * Obtiene una colección de todas las habitaciones.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $habitaciones = Habitacion::all();
        return new HabitacionCollection($habitaciones);
    }

    /**
     * Crea una nueva habitación y la asigna a un hotel.
     *
     * <aside class="notice">Reglas de negocio:
     * <ul>
     *     <li>La cantidad de habitaciones asignadas no debe superar el número máximo de habitaciones configuradas en el hotel.</li>
     *     <li>No se permite la combinación de tipo y acomodación duplicada en el mismo hotel.</li>
     * </ul>
     * </aside>
     *
     * @param  \App\Http\Requests\HabitacionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(HabitacionRequest $request)
    {
        // Validar la solicitud
        $request->validated();

        $hotel = Hotel::find($request->hotel_id);

        // Validar la cantidad de habitaciones configuradas
        $totalHabitaciones = $hotel->habitaciones->sum('cantidad') + $request->cantidad;
        if ($totalHabitaciones > $hotel->numero_hab) {
            return response()->json(['error' => 'Supera el número máximo de habitaciones'], 422);
        }

        // Validar combinación única
        if ($hotel->habitaciones->where('tipo_habitacion', $request->tipo_habitacion)->where('acomodacion', $request->acomodacion)->count()) {
            return response()->json(['error' => 'Combinación tipo/acomodación ya existe'], 422);
        }

        // Asignar habitación
        Habitacion::create($request->all());
        return response()->json(['message' => 'Habitación asignada con éxito'], 201);
    }

    /**
     * Muestra una habitación.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $habitacion = Habitacion::find($id);
        if (!$habitacion) {
            return response()->json(['message' => 'Habitación no encontrada'], 404);
        }
        return new HabitacionResource($habitacion);
    }

    /**
     * Actualiza una habitación.
     *
     * <aside class="notice">Reglas de negocio:
     * <ul>
     *     <li>La cantidad de habitaciones asignadas no debe superar el número máximo de habitaciones configuradas en el hotel.</li>
     *     <li>No se permite la combinación de tipo y acomodación duplicada en el mismo hotel.</li>
     * </ul>
     * </aside>
     *
     * @param  \App\Http\Requests\EditHabitacionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EditHabitacionRequest $request, $id)
    {
        $request->validated();

        $habitacion = Habitacion::find($id);

        if (!$habitacion) {
            return response()->json(['message' => 'Habitación no encontrada'], 404);
        }

        $hotel = Hotel::find($request->hotel_id);

        // Validar la cantidad de habitaciones configuradas
        $totalHabitaciones = ($hotel->habitaciones->sum('cantidad') - $habitacion->cantidad) + $request->cantidad;
        if ($totalHabitaciones > $hotel->numero_hab) {
            return response()->json(['error' => 'Supera el número máximo de habitaciones'], 422);
        }

        // Validar combinación única
        if ($hotel->habitaciones->where('tipo_habitacion', $request->tipo_habitacion)
            ->where('acomodacion', $request->acomodacion)
            ->where('id', '!=', $id) // agregar esta condición para excluir la habitación que se está actualizando
            ->count()
        ) {
            return response()->json(['error' => 'Combinación tipo/acomodación ya existe'], 422);
        }

        // Actualizar habitación
        $habitacion->update($request->all());
        return new HabitacionResource($habitacion);
    }

    /**
     * Elimina una habitación por su id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $habitacion = Habitacion::find($id);
        if (!$habitacion) {
            return response()->json(['message' => 'Habitación no encontrada'], 404);
        }
        $habitacion->delete();
        return response()->json(['message' => 'Habitación eliminada']);
    }
}
