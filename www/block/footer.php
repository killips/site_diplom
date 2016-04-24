<div class="footer">
  <div class="footercontent">
    <div class="copyright">
      <span>2016 СевГУ. Все права защищены.</span>
    </div>
    <div class="socialnet">
      <ul>
        <li><a href=""><i class="fa fa-vk"></a></i></li>
        <li><a href=""><i class="fa fa-instagram"></a></i></li>
        <li><a href=""><i class="fa fa-facebook"></a></i></li>
        <li><a href=""><i class="fa fa-twitter"></a></i></li>
      </ul>
    </div>
    <div class="ourcontact">
      <p>г.Севастополь,<br>
        ул. Университетская, д 30<br>
        +7 (978) 000 00 00<br>
      </p>
    </div>
  </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      //$(".mynav li a[href*='#']").parents().addClass('active');
      var loc = window.location.pathname;
      var empty_callback = function(){ return false; };
      $("#bs-example-navbar-collapse-2 ul li a").each(function(index, item){
        if (loc == $(item).attr("href")){
          $(item).click(empty_callback);
          $(item).parents().addClass("active");
        }
      });
    });
    </script>
<script>
    $(document).ready(function(){
      // вешаем на клик по элементу с id = example-1
        $("#select_but1").change(function(){
          var out = $("select#select_but1").val();
           $.post("/ajax/bd.php", { data:out }, function(result) {
            //   $("#par1").html(result);
            console.log(result);
            $("#select_chair").empty();
            result = JSON.parse(result);
            for (var i=0; i<result.length; i++) {
              console.log(result[i]);
              $("#select_chair").append("<option value='" + result[i]["id"] + "'>" + result[i]["title"] + "</option>");
            }
           });
        });

        $("#select_but1").ready(function(){
          var out = $("select#select_but1").val();
          var selected = '<?php echo $argChair["id_chair"]; ?>';
          console.log(selected);
           $.post("/ajax/bd.php", { data:out }, function(result) {
            //   $("#par1").html(result);
            console.log(result);
            $("#select_chair").empty();
            result = JSON.parse(result);
            for (var i=0; i<result.length; i++) {
              console.log(result[i]);
              if(selected!=result[i]["id"]){
                $("#select_chair").append("<option value='" + result[i]["id"] + "'>" + result[i]["title"] + "</option>");
              }else{
                $("#select_chair").append("<option value='" + result[i]["id"] + "' selected>" + result[i]["title"] + "</option>");
              }
            }
           });
        });

     });
</script>
