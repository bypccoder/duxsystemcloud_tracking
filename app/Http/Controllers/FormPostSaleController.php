<?php

namespace App\Http\Controllers;

use App\Models\ManagementTypes;
use App\Models\PostSale;
use App\Models\PostSaleHistory;
use App\Models\TimeRange;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormPostSaleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Admin|Post-Venta', 'permission:admin.form_postsale.index|admin.form_postsale.create|admin.form_postsale.edit|admin.form_postsale.destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.form_postsale.index');
    }

    public function getFormsPostSaleData(Request $request)
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
        $management_types = ManagementTypes::all();
        $time_ranges = TimeRange::all();

        return view('admin.form_postsale.create', compact('management_types', 'time_ranges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'management_types' => 'required',
            'document' => 'required|numeric|min:8',
            'business_name' => 'required',
            'receiving_person' => 'required|regex:/^[A-Za-z]+(\s[A-Za-z]+)*$/',
            'email_customer' => 'required|email',
            'titular_cellphone' => 'required|numeric|min:7',
            'address' => 'required',
            'reference' => 'required',
        ];

        if ($request->input('management_types') == "1") {
            $rules['sale_date'] = 'required|date';
            $rules['new_serial'] = 'required';
            $rules['model_text'] = 'required';
        }

        if ($request->input('management_types') == "2") {
            $rules['change_date'] = 'required|date';
            $rules['old_serial'] = 'required';
            $rules['model_text'] = 'required';
        }

        if ($request->input('management_types') == "3") {
            $rules['pickup_date'] = 'required|date';
            $rules['old_serial'] = 'required';
            $rules['model_text'] = 'required';
        }

        if ($request->input('management_types') == "4") {
            $rules['support_date'] = 'required|date';
            $rules['old_serial'] = 'required';
            $rules['model_text'] = 'required';
        }

        if ($request->input('management_types') == "5") {
            $rules['survey_date'] = 'required|date';
            $rules['survey_text'] = 'required';
        }


        $this->validate($request, $rules, [
            'management_types.required' => 'El campo de tipo de gestión es obligatorio.',
            'document.required' => 'El campo de documento es obligatorio.',
            'document.numeric' => 'El campo de documento debe ser un valor numérico.',
            'document.min' => 'El documento debe tener al menos :min caracteres.',
            'business_name.required' => 'El campo de razón social es obligatorio.',
            'receiving_person.required' => 'El campo de contacto que recepciona es obligatorio.',
            'receiving_person.regex' => 'El campo de contacto que recepciona solo debe contener letras.',
            'email_customer.required' => 'El campo de email es obligatorio.',
            'email_customer.email' => 'El campo de email debe ser una dirección de correo válida.',
            'titular_cellphone.required' => 'El campo de celular del titular es obligatorio.',
            'titular_cellphone.numeric' => 'El campo de celular del titular debe ser un valor numérico.',
            'titular_cellphone.min' => 'El celular del titular debe tener al menos :min caracteres.',
            'address.required' => 'El campo de dirección es obligatorio.',
            'reference.required' => 'El campo de referencia es obligatorio.',
            'sale_date.required' => 'El campo de fecha de venta es obligatorio.',
            'change_date.required' => 'El campo de fecha de cambio es obligatorio.',
            'old_serial.required' => 'El campo de serie antiguo es obligatorio.',
            'pickup_date.required' => 'El campo de fecha de recojo es obligatorio.',
            'new_serial.required' => 'El campo de serie nuevo es obligatorio.',
            'model_text.required' => 'El campo de modelo es obligatorio.',
            'support_date.required' => 'El campo de fecha de soporte es obligatorio.',
            'survey_date.required' => 'El campo de fecha de encuesta es obligatorio.',
            'survey_text.required' => 'El campo de encuesta es obligatorio.',
        ]);



        $form_postsale = new PostSale;
        $form_postsale->management_type_id = $request->input('management_types');
        $form_postsale->document = $request->input('document');
        $form_postsale->business_name = $request->input('business_name');
        $form_postsale->receiving_person = $request->input('receiving_person');
        $form_postsale->email_customer = $request->input('email_customer');
        $form_postsale->titular_cellphone = $request->input('titular_cellphone');
        $form_postsale->address = $request->input('address');
        $form_postsale->reference = $request->input('reference');
        $form_postsale->sale_date = $request->input('sale_date');
        $form_postsale->new_serial = $request->input('new_serial');
        $form_postsale->model_text = $request->input('model_text');
        $form_postsale->change_date = $request->input('change_date');
        $form_postsale->old_serial = $request->input('old_serial');
        $form_postsale->pickup_date = $request->input('pickup_date');
        $form_postsale->support_date = $request->input('support_date');
        $form_postsale->survey_date = $request->input('survey_date');
        $form_postsale->survey_text = $request->input('survey_text');
        $form_postsale->time_ranges_id = $request->input('time_ranges');
        $form_postsale->observation = $request->input('observation');

        $form_postsale->created_by = Auth::id();
        $form_postsale->updated_by = Auth::id();

        $form_postsale->record_type = 'formulario';

        $form_postsale->save();

        PostSaleHistory::create([
            'post_sale_id' => $form_postsale->id,
            'type_row' => 'create',
            'field_description' => 'Ha creado el formulario post-venta.',
            'field_name' => '',
            'old_value' => '',
            'new_value' => '',
            'created_by' => Auth::id(),
        ]);


        $response = [
            'redirect' => route('admin.form_postsale.edit', $form_postsale->id),
            'title' => 'Éxito',
            'message' => 'El formulario post-venta se ha registrado con éxito.',
            'type' => 'bg-success'
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $form_postsale = PostSale::find($id);

        $form_postsale = PostSale::select('post_sale.*', 'management_types.management', 'time_ranges.description')
            ->leftJoin('management_types', 'post_sale.management_type_id', '=', 'management_types.id')
            ->leftJoin('time_ranges', 'post_sale.time_ranges_id', '=', 'time_ranges.id')
            ->where('post_sale.status_id', 1)
            ->find($id);

        if (!$form_postsale) {
            return abort(404); // Manejo de usuario no encontrado
        }

        $management_types = ManagementTypes::all();
        $time_ranges = TimeRange::all();

        return view('admin.form_postsale.show', compact('form_postsale', 'management_types', 'time_ranges'));
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

        return view('admin.form_postsale.edit', compact('form_postsale', 'management_types', 'time_ranges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $form_postsale = PostSale::find($id);
        if (!$form_postsale) {
            return abort(404);
        }

        $rules = [
            'management_types' => 'required',
            'document' => 'required|numeric|min:8',
            'business_name' => 'required',
            'receiving_person' => 'required|regex:/^[A-Za-z]+(\s[A-Za-z]+)*$/',
            'email_customer' => 'required|email',
            'titular_cellphone' => 'required|numeric|min:7',
            'address' => 'required',
            'reference' => 'required',
        ];

        if ($request->input('management_types') == "1") {
            $rules['sale_date'] = 'required|date';
            $rules['new_serial'] = 'required';
            $rules['model_text'] = 'required';
        }

        if ($request->input('management_types') == "2") {
            $rules['change_date'] = 'required|date';
            $rules['old_serial'] = 'required';
            $rules['model_text'] = 'required';
        }

        if ($request->input('management_types') == "3") {
            $rules['pickup_date'] = 'required|date';
            $rules['old_serial'] = 'required';
            $rules['model_text'] = 'required';
        }

        if ($request->input('management_types') == "4") {
            $rules['support_date'] = 'required|date';
            $rules['old_serial'] = 'required';
            $rules['model_text'] = 'required';
        }

        if ($request->input('management_types') == "5") {
            $rules['survey_date'] = 'required|date';
            $rules['survey_text'] = 'required';
        }


        $this->validate($request, $rules, [
            'management_types.required' => 'El campo de tipo de gestión es obligatorio.',
            'document.required' => 'El campo de documento es obligatorio.',
            'document.numeric' => 'El campo de documento debe ser un valor numérico.',
            'document.min' => 'El documento debe tener al menos :min caracteres.',
            'business_name.required' => 'El campo de razón social es obligatorio.',
            'receiving_person.required' => 'El campo de contacto que recepciona es obligatorio.',
            'receiving_person.regex' => 'El campo de contacto que recepciona solo debe contener letras.',
            'email_customer.required' => 'El campo de email es obligatorio.',
            'email_customer.email' => 'El campo de email debe ser una dirección de correo válida.',
            'titular_cellphone.required' => 'El campo de celular del titular es obligatorio.',
            'titular_cellphone.numeric' => 'El campo de celular del titular debe ser un valor numérico.',
            'titular_cellphone.min' => 'El celular del titular debe tener al menos :min caracteres.',
            'address.required' => 'El campo de dirección es obligatorio.',
            'reference.required' => 'El campo de referencia es obligatorio.',
            'sale_date.required' => 'El campo de fecha de venta es obligatorio.',
            'change_date.required' => 'El campo de fecha de cambio es obligatorio.',
            'old_serial.required' => 'El campo de serie antiguo es obligatorio.',
            'pickup_date.required' => 'El campo de fecha de recojo es obligatorio.',
            'new_serial.required' => 'El campo de serie nuevo es obligatorio.',
            'model_text.required' => 'El campo de modelo es obligatorio.',
            'support_date.required' => 'El campo de fecha de soporte es obligatorio.',
            'survey_date.required' => 'El campo de fecha de encuesta es obligatorio.',
            'survey_text.required' => 'El campo de encuesta es obligatorio.',
        ]);

        $oldManagementTypeId = $form_postsale->management_type_id;
        $oldDocument = $form_postsale->document;
        $oldBusinessName = $form_postsale->business_name;
        $oldReceivingPerson = $form_postsale->receiving_person;
        $oldEmailCustomer = $form_postsale->email_customer;
        $oldTitularCellphone = $form_postsale->titular_cellphone;
        $oldAddress = $form_postsale->address;
        $oldReference = $form_postsale->reference;
        $oldSaleDate = $form_postsale->sale_date;
        $oldNewSerial = $form_postsale->new_serial;
        $oldModelText = $form_postsale->model_text;
        $oldChangeDate = $form_postsale->change_date;
        $oldOldSerial = $form_postsale->old_serial;
        $oldPickupDate = $form_postsale->pickup_date;
        $oldSupportDate = $form_postsale->support_date;
        $oldSurveyDate = $form_postsale->survey_date;
        $oldSurveyText = $form_postsale->survey_text;
        $oldTimeRanges = $form_postsale->time_ranges_id;
        $oldObservation = $form_postsale->observation;

        $form_postsale->management_type_id = $request->input('management_types');
        $form_postsale->document = $request->input('document');
        $form_postsale->business_name = $request->input('business_name');
        $form_postsale->receiving_person = $request->input('receiving_person');
        $form_postsale->email_customer = $request->input('email_customer');
        $form_postsale->titular_cellphone = $request->input('titular_cellphone');
        $form_postsale->address = $request->input('address');
        $form_postsale->reference = $request->input('reference');
        $form_postsale->sale_date = $request->input('sale_date');
        $form_postsale->new_serial = $request->input('new_serial');
        $form_postsale->model_text = $request->input('model_text');
        $form_postsale->change_date = $request->input('change_date');
        $form_postsale->old_serial = $request->input('old_serial');
        $form_postsale->pickup_date = $request->input('pickup_date');
        $form_postsale->support_date = $request->input('support_date');
        $form_postsale->survey_date = $request->input('survey_date');
        $form_postsale->survey_text = $request->input('survey_text');
        $form_postsale->time_ranges_id = $request->input('time_ranges');
        $form_postsale->observation = $request->input('observation');

        $form_postsale->save();


        $changes = [];

        if ($oldManagementTypeId !== intval($request->input('management_types'))) {
            $changes[] = [
                'field_name' => 'tipo gestión',
                'field_description' => 'Registro editado',
                'old_value' => $oldManagementTypeId,
                'new_value' => $request->input('management_types')
            ];
        }

        if ($oldDocument !== $request->input('document')) {
            $changes[] = [
                'field_name' => 'documento',
                'field_description' => 'Registro editado',
                'old_value' => $oldDocument,
                'new_value' => $request->input('document')
            ];
        }

        if ($oldBusinessName !== $request->input('business_name')) {
            $changes[] = [
                'field_name' => 'razón social',
                'field_description' => 'Registro editado',
                'old_value' => $oldBusinessName,
                'new_value' => $request->input('business_name')
            ];
        }

        if ($oldReceivingPerson !== $request->input('receiving_person')) {
            $changes[] = [
                'field_name' => 'contacto que recepciona',
                'field_description' => 'Registro editado',
                'old_value' => $oldReceivingPerson,
                'new_value' => $request->input('receiving_person')
            ];
        }

        if ($oldEmailCustomer !== $request->input('email_customer')) {
            $changes[] = [
                'field_name' => 'email',
                'field_description' => 'Registro editado',
                'old_value' => $oldEmailCustomer,
                'new_value' => $request->input('email_customer')
            ];
        }

        if ($oldTitularCellphone !== $request->input('titular_cellphone')) {
            $changes[] = [
                'field_name' => 'celular titular',
                'field_description' => 'Registro editado',
                'old_value' => $oldTitularCellphone,
                'new_value' => $request->input('titular_cellphone')
            ];
        }

        if ($oldAddress !== $request->input('address')) {
            $changes[] = [
                'field_name' => 'dirección',
                'field_description' => 'Registro editado',
                'old_value' => $oldAddress,
                'new_value' => $request->input('address')
            ];
        }

        if ($oldReference !== $request->input('reference')) {
            $changes[] = [
                'field_name' => 'referencia',
                'field_description' => 'Registro editado',
                'old_value' => $oldReference,
                'new_value' => $request->input('reference')
            ];
        }

        if ($oldSaleDate !== $request->input('sale_date')) {
            $changes[] = [
                'field_name' => 'fecha de venta',
                'field_description' => 'Registro editado',
                'old_value' => $oldSaleDate,
                'new_value' => $request->input('sale_date')
            ];
        }

        if ($oldNewSerial !== $request->input('new_serial')) {
            $changes[] = [
                'field_name' => 'serie nuevo',
                'field_description' => 'Registro editado',
                'old_value' => $oldNewSerial,
                'new_value' => $request->input('new_serial')
            ];
        }

        if ($oldModelText !== $request->input('model_text')) {
            $changes[] = [
                'field_name' => 'modelo',
                'field_description' => 'Registro editado',
                'old_value' => $oldModelText,
                'new_value' => $request->input('model_text')
            ];
        }

        if ($oldChangeDate !== $request->input('change_date')) {
            $changes[] = [
                'field_name' => 'fecha de cambio',
                'field_description' => 'Registro editado',
                'old_value' => $oldChangeDate,
                'new_value' => $request->input('change_date')
            ];
        }

        if ($oldOldSerial !== $request->input('old_serial')) {
            $changes[] = [
                'field_name' => 'serie antiguo',
                'field_description' => 'Registro editado',
                'old_value' => $oldOldSerial,
                'new_value' => $request->input('old_serial')
            ];
        }

        if ($oldPickupDate !== $request->input('pickup_date')) {
            $changes[] = [
                'field_name' => 'fecha de recojo',
                'field_description' => 'Registro editado',
                'old_value' => $oldPickupDate,
                'new_value' => $request->input('pickup_date')
            ];
        }

        if ($oldSupportDate !== $request->input('support_date')) {
            $changes[] = [
                'field_name' => 'fecha de soporte',
                'field_description' => 'Registro editado',
                'old_value' => $oldSupportDate,
                'new_value' => $request->input('support_date')
            ];
        }

        if ($oldSurveyDate !== $request->input('survey_date')) {
            $changes[] = [
                'field_name' => 'fecha de encuesta',
                'field_description' => 'Registro editado',
                'old_value' => $oldSurveyDate,
                'new_value' => $request->input('survey_date')
            ];
        }

        if ($oldSurveyText !== $request->input('survey_text')) {
            $changes[] = [
                'field_name' => 'encuesta',
                'field_description' => 'Registro editado',
                'old_value' => $oldSurveyText,
                'new_value' => $request->input('survey_text')
            ];
        }

        if ($oldTimeRanges !== intval($request->input('time_ranges'))) {
            $changes[] = [
                'field_name' => 'rango horario',
                'field_description' => 'Registro editado',
                'old_value' => $oldTimeRanges,
                'new_value' => $request->input('time_ranges')
            ];
        }

        if ($oldObservation !== $request->input('observation')) {
            $changes[] = [
                'field_name' => 'observación',
                'field_description' => 'Registro editado',
                'old_value' => $oldObservation,
                'new_value' => $request->input('observation')
            ];
        }

        if (empty($changes)) {
            $response = [
                'redirect' => route('admin.form_postsale.edit', $form_postsale->id),
                'title' => 'Sin cambios',
                'message' => 'El registro no tiene ningún cambio actual.',
                'type' => 'bg-info'
            ];
            return response()->json($response);
        }

        // Guarda el historial de cambios
        foreach ($changes as $change) {
            PostSaleHistory::create([
                'post_sale_id' => $form_postsale->id,
                'type_row' => 'update',
                'field_description' => $change['field_description'],
                'field_name' => $change['field_name'],
                'old_value' => $change['old_value'],
                'new_value' => $change['new_value'],
                'created_by' => Auth::id(),
            ]);
        }

        $response = [
            'redirect' => route('admin.form_postsale.edit', $form_postsale->id),
            'title' => 'Éxito',
            'message' => 'El formulario post-venta se ha editado con éxito.',
            'type' => 'bg-success'
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
