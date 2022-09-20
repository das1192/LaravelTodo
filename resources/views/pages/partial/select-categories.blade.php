<select required class="form-control col-6" name="category_id">
    <option value="">Choose Category</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
<button type="submit" id="category-btn" class="col-3 btn my-btn plr-2 ml-15"> Add
    TODO</button>