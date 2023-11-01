<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Historial de Cambios</h5>
    </div>
    <div class="card-body" style="max-height: 800px; overflow-y: auto;">
        <div class="chat-container">
            @foreach ($history as $change)
                @if ($change->type_row == 'update')
                    <div class="chat-message d-flex mb-2">
                        <img width="50" height="50" src="{{ url('assets') }}/img/avatars/default.png"
                            alt="{{ $change->updatedByUser->name }}" class="user-avatar me-2 img-fluid">
                        <div class="message-content p-3 border rounded change-message">
                            <p class="message-time text-muted small mb-2">
                                {{ $change->created_at }}
                            </p>
                            <p class="user-name mb-1">{{ $change->updatedByUser->name }}</p>
                            <p class="message-text mb-0">modificó el campo
                                {{ $change->field_name }} de
                                <span
                                    class="text-warning">{{ $change->old_value == '' ? '""' : $change->old_value }}</span>
                                a <span
                                    class="text-success">{{ $change->new_value == '' ? '""' : $change->new_value }}</span>
                            </p>
                        </div>
                    </div>
                @elseif ($change->type_row == 'asign_role')
                    <div class="chat-message d-flex mb-2">
                        <img width="50" height="50" src="{{ url('assets') }}/img/avatars/default.png"
                            alt="{{ $change->updatedByUser->name }}" class="user-avatar me-2 img-fluid">
                        <div class="message-content p-3 border rounded change-message">
                            <p class="message-time text-muted small mb-2">
                                {{ $change->created_at }}
                            </p>
                            <p class="user-name mb-1">{{ $change->updatedByUser->name }}</p>
                            <p class="message-text mb-0">{{ $change->field_description }} el
                                {{ $change->field_name }} :
                                <span class="text-success">{{ $change->new_value }}</span>
                            </p>
                        </div>
                    </div>
                @elseif ($change->type_row == 'remove_role')
                    <div class="chat-message d-flex mb-2">
                        <img width="50" height="50" src="{{ url('assets') }}/img/avatars/default.png"
                            alt="{{ $change->updatedByUser->name }}" class="user-avatar me-2 img-fluid">
                        <div class="message-content p-3 border rounded change-message">
                            <p class "message-time text-muted small mb-2">
                                {{ $change->created_at }}
                            </p>
                            <p class="user-name mb-1">{{ $change->updatedByUser->name }}</p>
                            <p class="message-text mb-0">{{ $change->field_description }} el
                                {{ $change->field_name }} :
                                <span class="text-danger">{{ $change->old_value }}</span>
                            </p>
                        </div>
                    </div>
                @else
                    <div class="chat-message d-flex mb-2">
                        <img width="50" height="50" src="{{ url('assets') }}/img/avatars/default.png"
                            alt="{{ $change->updatedByUser->name }}" class="user-avatar me-2 img-fluid">
                        <div class="message-content p-3 border rounded change-message">
                            <p class="message-time text-muted small mb-2">
                                {{ $change->created_at }}
                            </p>
                            <p class="user-name mb-1">{{ $change->updatedByUser->name }}</p>
                            <p class="message-text mb-0">{{ $change->field_description }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
