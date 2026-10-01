<div class="form-group">
    <label for="category_id">Kategori</label>
    <select name="category_id" id="category_id">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected((int) old('category_id', $activity->category_id ?? '') === $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="code">Kode Kegiatan</label>
    <input type="text" name="code" id="code" value="{{ old('code', $activity->code ?? '') }}">
</div>

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
