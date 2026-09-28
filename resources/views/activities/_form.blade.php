<div class="form-group">
    <label for="title">Judul</label>
    <input type="text" name="title" id="title" value="{{ old('title', $activity->title ?? '') }}">
</div>

<div class="form-group">
    <label for="description">Deskripsi</label>
    <textarea name="description" id="description" rows="3">{{ old('description', $activity->description ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="location">Lokasi</label>
    <input type="text" name="location" id="location" value="{{ old('location', $activity->location ?? '') }}">
</div>

<div class="form-group">
    <label for="start_at">Mulai</label>
    <input type="datetime-local" name="start_at" id="start_at" value="{{ old('start_at', isset($activity) ? $activity->start_at->format('Y-m-d\TH:i') : '') }}">
</div>

<div class="form-group">
    <label for="end_at">Selesai</label>
    <input type="datetime-local" name="end_at" id="end_at" value="{{ old('end_at', isset($activity) ? $activity->end_at->format('Y-m-d\TH:i') : '') }}">
</div>

<div class="form-group">
    <label for="capacity">Kapasitas</label>
    <input type="number" name="capacity" id="capacity" min="1" max="500" value="{{ old('capacity', $activity->capacity ?? '') }}">
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status">
        @foreach (['draft', 'published', 'completed'] as $status)
            <option value="{{ $status }}" @selected(old('status', $activity->status ?? 'draft') === $status)>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>
