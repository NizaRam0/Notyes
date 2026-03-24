<x-app-layout>
    <h2 class="page-title">Create Note</h2>
    <p class="page-subtitle">Write your note below and save it.</p>

    <form action="{{ route('note.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="note">Note</label>
            <textarea class="form-control" id="note" name="note" rows="8" placeholder="Type your note..."></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Note</button>
            <a href="{{ route('note.index') }}" class="btn btn-secondary">Back to Notes</a>
        </div>
    </form>
</x-app-layout>