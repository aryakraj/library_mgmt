<!DOCTYPE html>
<html>
<body>

<h3>Upload Bill Here:</h3>
<form action="<?php echo base_url()?>main/upload">
  <label for="myfile">Select files:</label>
  <input type="file" id="file" name="pic" multiple><br><br>
  <input type="submit" name="submit">
</form>

</body>
</html>
