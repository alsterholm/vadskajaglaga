<form action="add_recipe.php" method="post">
   <input type="text" id="name" name="name"><br>
   <input type="text" id="desc" name="description"><br>
   <input type="text" id="inst" name="instructions"><br>
   <input type="text" id="time" name="time"><br>
   <a href="#" id="go">Go!</a>
</form>

<?php
   include 'includes/data/js-links.php';
?>

<script type="text/javascript">
   $('#go').on('click', function() {
      var rname = $('#name').val();
      var rdesc = $('#desc').val();
      var rinst = $('#inst').val();
      var rtime = $('#time').val();
      $.post('add_recipe.php', {name: rname, description: rdesc, instructions: rinst, time: rtime})
         .done(function(data) {
            document.write(data);
         });
   });
</script>
