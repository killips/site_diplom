var i=1;
function AddToForm() {
  var addtoform = document.getElementById("addtoform");
  i++;
  var div = document.createElement('div');
   div.className = "form-group";
   div.id="group"+i;
   div.innerHTML = "<label class='control-label'></label><div class='input-group'><span class='input-group-addon'>"+i+")</span><input type='text' class='form-control' name='text_answer["+(i-1)+"]'><span class='input-group-addon'><input type='radio' name='trueAnswer' id='trueAnswer' value='"+i+"'></span></div>";
   addtoform.appendChild(div);
}
function DeleteToForm(){
  var addtoform = document.getElementById("group"+i);
  i--;
  //var div = document.createElement('div');
  addtoform.remove();
}
