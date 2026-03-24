<x-app-layout>
    <h2 class="page-title">Update Note</h2>
    <p class="page-subtitle">Edit your note below and save it.</p>

    <form action="
    {{route('note.update', $note)}}" method="post">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label class="form-label" for="note">Note</label>
            <textarea class="form-control" id="note" name="note" rows="8" placeholder="Type your note...">{{ $note->note }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Note</button>
            <a href="{{ route('note.index') }}" class="btn btn-secondary">Back to Notes</a>
             <form action="{{ route('note.destroy', $note) }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this note?')" class="note-delete-button">Delete</button>
                    </form>
        </div>
    </form>
</x-app-layout>