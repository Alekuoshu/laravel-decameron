<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditHotelRequest;
use App\Http\Requests\HotelRequest;
use App\Http\Resources\HotelCollection;
use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Obtiene todos los hoteles
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new HotelCollection(Hotel::all());
    }

    /**
     * Crea un nuevo hotel y lo almacena en la base de datos.
     *
     * @param  \App\Http\Requests\HotelRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(HotelRequest $request)
    {
        $request->validated();

        $hotel = Hotel::create($request->all());
        return new HotelResource($hotel);
    }

    /**
     * Obtiene un hotel por su id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);
        if (!$hotel) {
            return response()->json(['message' => 'Hotel no encontrado'], 404);
        }
        return new HotelResource($hotel);
    }

    /**
     * Actualiza un hotel existente.
     *
     * <aside class="notice">Reglas de negocio:
     * <ul>
     *     <li>El hotel debe existir.</li>
     *     <li>El nombre del hotel debe ser único.</li>
     *     <li>El NIT debe tener un formato válido (12345678-K).</li>
     *     <li>El número de habitaciones debe ser un número entero positivo.</li>
     * </ul>
     * </aside>
     *
     * @param  \App\Http\Requests\EditHotelRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EditHotelRequest $request, $id)
    {
        // Validar la solicitud
        $request->validated();

        $hotel = Hotel::find($id);
        if (!$hotel) {
            return response()->json(['message' => 'Hotel no encontrado'], 404);
        }

        $hotel->update($request->all());
        return new HotelResource($hotel);
    }

    /**
     * Elimina un hotel por su id.
     *
     * <aside class="notice">Reglas de negocio:
     * <ul>
     *     <li>El hotel debe existir.</li>
     * </ul>
     * </aside>
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        if (!$hotel) {
            return response()->json(['message' => 'Hotel no encontrado'], 404);
        }
        $hotel->delete();
        return response()->json(['message' => 'Hotel eliminado']);
    }
}
