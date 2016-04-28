<div class="row">
<div class="input-field offset-s1 col s10">
    <select name="starrating">
      <option value="" disabled {{ ((!$oldstarrating) ? 'selected' : '') }}>Choose Rating</option>
      <option value="5" {{ (($oldstarrating) == '5' ? 'selected' : '') }}>5 Stars</option>
      <option value="4" {{ (($oldstarrating) == '4' ? 'selected' : '') }}>4 Stars</option>
      <option value="3" {{ (($oldstarrating) == '3' ? 'selected' : '') }}>3 Stars</option>
      <option value="2" {{ (($oldstarrating) == '2' ? 'selected' : '') }}>2 Stars</option>
      <option value="1" {{ (($oldstarrating) == '1' ? 'selected' : '') }}>1 Star</option>
      <option value="0" {{ (($oldstarrating) == '0' ? 'selected' : '') }}>0 Star</option>
    </select>
    <label class="font__label">Filter By Star Rating:</label>
  </div>
</div>