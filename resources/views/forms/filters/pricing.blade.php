<div class="row">
<div class="input-field offset-s1 col s10">
    <select name="pricing">
      <option value="" disabled {{ ((!$oldpriceorder) ? 'selected' : '') }}>Choose Preferred Price</option>
      <option value="desc" {{ (($oldpriceorder) == 'desc' ? 'selected' : '') }}>Expensive First</option>
      <option value="asc" {{ (($oldpriceorder) == 'asc' ? 'selected' : '') }}>Cheapest First</option>
    </select>
    <label class="font__label">Filter By Pricing:</label>
  </div>
</div>