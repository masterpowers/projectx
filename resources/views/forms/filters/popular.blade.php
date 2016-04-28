<div class="row">
<div class="input-field offset-s1 col s10">
    <select name="popular">
      <option value="" disabled {{ ((!$oldpopular) ? 'selected' : '') }}>Choose Popularity</option>
      <option value="desc" {{ (($oldpopular) == 'desc' ? 'selected' : '') }}>Most Visited</option>
      <option value="asc" {{ (($oldpopular) == 'asc' ? 'selected' : '') }}>Least Visited</option>
    </select>
    <label class="font__label">Filter By Popularity:</label>
  </div>
</div>