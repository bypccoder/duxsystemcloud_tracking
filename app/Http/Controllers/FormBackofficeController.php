<?php

namespace App\Http\Controllers;

use App\Models\ManagementTypes;
use App\Models\PostSale;
use App\Models\TimeRange;
use Illuminate\Http\Request;

class FormBackofficeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Admin|Backoffice', 'permission:admin.form_backoffice.index|admin.form_backoffice.create|admin.form_backoffice.edit|admin.form_backoffice.destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.form_backoffice.index');
    }

    public function getFormsBackofficeData(Request $request)
    {

        $query = PostSale::select('post_sale.*', 'management_types.management', 'time_ranges.description')
            ->leftJoin('management_types', 'post_sale.management_type_id', '=', 'management_types.id')
            ->leftJoin('time_ranges', 'post_sale.time_ranges_id', '=', 'time_ranges.id')
            ->where('post_sale.status_id', 1);

        // Realiza búsquedas o filtros si es necesario
        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];
            $query->where(function ($subquery) use ($searchValue) {
                $subquery->where('id', 'like', '%' . $searchValue . '%')
                    ->orWhere('document', 'like', '%' . $searchValue . '%')
                    ->orWhere('business_name', 'like', '%' . $searchValue . '%');
            });
        }

        $totalRecords = $query->count(); // Obtén el número total de registros antes de la paginación

        // Realiza la paginación
        $form_postsales = $query->offset($request->input('start'))
            ->limit($request->input('length'))
            ->get();

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords, // Total de registros sin filtrar
            'recordsFiltered' => $totalRecords, // Total de registros después del filtro (en este ejemplo, no hay filtro)
            'data' => $form_postsales,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $form_postsale = PostSale::find($id);
        if (!$form_postsale) {
            return abort(404); // Manejo de usuario no encontrado
        }

        $management_types = ManagementTypes::all();
        $time_ranges = TimeRange::all();

        $form_postsale->load('history');

        // Modifica la colección de historiales para agregar las descripciones antiguas y nuevas
        $form_postsale->history->transform(function ($change) {

            $field = $change->field_name;
            $oldValue = $change->old_value;
            $newValue = $change->new_value;

            if ($field === 'rango horario') {
                $oldTimeRange = TimeRange::find($oldValue);
                $newTimeRange = TimeRange::find($newValue);

                if ($oldTimeRange) {
                    $change->old_value = $oldTimeRange->description;
                }

                if ($newTimeRange) {
                    $change->new_value = $newTimeRange->description;
                }
            } else if ($field === 'tipo gestión') {
                $oldManagementTypes = ManagementTypes::find($oldValue);
                $newManagementTypes = ManagementTypes::find($newValue);

                if ($oldManagementTypes) {
                    $change->old_value = $oldManagementTypes->management;
                }

                if ($newManagementTypes) {
                    $change->new_value = $newManagementTypes->management;
                }
            }

            return $change;
        });

        return view('admin.form_backoffice.edit', compact('form_postsale', 'management_types', 'time_ranges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
