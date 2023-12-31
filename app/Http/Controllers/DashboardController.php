<?php

namespace App\Http\Controllers;

use App\Models\PostSale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Admin|Backoffice', 'permission:admin.dashboard.index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function getFormsDashboardData(Request $request)
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
