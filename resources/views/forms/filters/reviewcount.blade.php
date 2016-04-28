<div class="row">
<div class="input-field offset-s1 col s10">
    <select name="reviewcount">
      <option value="" disabled {{ ((!$oldreviewcount) ? 'selected' : '') }}>Choose Critique</option>
      <option value="desc" {{ (($oldreviewcount) == 'desc' ? 'selected' : '') }}>Most Reviewed</option>
      <option value="asc" {{ (($oldreviewcount) == 'asc' ? 'selected' : '') }}>Least Reviewed</option>
    </select>
    <label class="font__label">Filter By Review Count:</label>
  </div>
</div>