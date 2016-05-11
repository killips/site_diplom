<div class="form-group">
     <div class="col-lg-10">
       <?php
          for($j=0;$j<count($argAnswer); $j++){
            echo "<div class='radio'>
              <label>
                <input type='radio' name='optionsRadios[".($i+1)."]' id='optionsRadios".($i+1)."' value='".($j+1)."' checked=''> ".$argAnswer[$j]["text_answer"]." </label>
            </div>";
          }
       ?>
     </div>
   </div>
