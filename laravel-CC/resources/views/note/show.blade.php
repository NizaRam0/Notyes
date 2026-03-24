<x-app-layout>
    <h2 class="page-title">Note Details</h2>

    <div class="detail-card">
    <h1 class="detail-title" style="color: brown;">Note #{{ $note->id }} -- Created: {{ $note->created_at->format('Y-m-d H:i:s') }}</h1>
        {{ $note->note }}

    </div>

    <div class="form-actions" style="margin-top: 14px;">
        <a href="{{ route('note.edit', $note) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('note.index') }}" class="btn btn-secondary">Back to Notes</a>
    </div>
</x-app-layout>