<x-app-layout>
    <div class="note-container">
        <a href="{{ route('note.create', ) }}" class="new-note-btn">
            New Note
        </a>

        <div class="notes">
        @foreach ( $notes as $note)
        @csrf
            <div class="note">
                <div class="note-body">
                {{ Str::words($note->note, 15) }}

                </div>

                <div class="note-buttons">
                    <a href="{{ route('note.show', $note) }}" class="note-edit-button">View</a>
                    <a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
                    <form action="{{ route('note.destroy', $note) }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this note?')" class="note-delete-button">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach

        </div>

    </div>

    {{ $notes->links() }}

</x-app-layout>
