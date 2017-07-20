<?php

include 'header.php';
?>

<script type="text/javascript">
	$(document).ready(function(){
    $('form')
  .form({
    on: 'blur',
    fields: {
      empty: {
        identifier  : 'empty',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a value'
          }
        ]
      },
      dropdown: {
        identifier  : 'dropdown',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please select a dropdown value'
          }
        ]
      },
      checkbox: {
        identifier  : 'checkbox',
        rules: [
          {
            type   : 'checked',
            prompt : 'Please check the checkbox'
          }
        ]
      }
    }
  })
;
	});
</script>


<div class="ui form">
    <form class="ui form">
  <div class="field">
    <label>Empty</label>
    <input name="empty" type="text">
  </div>
  <div class="field">
    <label>Dropdown</label>
    <select class="ui dropdown" name="dropdown">
      <option value="">Select</option>
      <option value="male">Choice 1</option>
      <option value="female">Choice 2</option>
    </select>
  </div>
  <div class="inline field">
    <div class="ui checkbox">
      <input type="checkbox" name="checkbox">
      <label>Checkbox</label>
    </div>
  </div>
  <div class="ui submit button">Submit</div>
  <div class="ui error message"></div>
</form>
</div>
