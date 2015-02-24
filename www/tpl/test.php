<script>
$.ajax({
  type: "POST",
  url: "app/test.php",
  data: "one=0&two=20",
  async: false,
  success: function(msg){
    alert( "Прибыли данные: " + msg );
  }
});
</script>
