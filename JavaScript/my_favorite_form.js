document.addEventListener("DOMContentLoaded",function(){
const titleInput=document.getElementById("title");
const typeButtons=document.getElementsByName("type");
const titleError=document.getElementById("titleError");
const startDateInput=document.getElementById("start_date");
const startDateError=document.getElementById("startDateError");
const genreInput = document.getElementById("genre");
const genreError = document.getElementById("genreError")
const summaryInput = document.getElementById("summary")
const summaryError = document.getElementById("summaryError");
function validateTitle(){
    if(titleInput.value.trim()===""){
        titleError.textContent="title is required.";
        return false;
    } else{
        titleError.textContent="";
        return true
    }
    alert("validate title");
}
function ValidateType() {
    let checkedType = document.querySelector("oinput[name='type']:checked");
    if (checkedType === null){
        typeError.textContent="Type is required."
        return false;
    } else{
        typeError.textContent="";
        return true;
    }
}
function validateStartDate() {
    if (!startDateInput.validity.valid){
        startDateError.textContent = "invalid date.";
        return false;
    }
        startDateError.textContent = "";
    return true;
    }
    function validateGenre() {
        if (genreInput.value === "" ){
            genreError.textContent = "Genre is required.";
            return false;
        }else{
            genreError.textContent = "";
            return true;
        }
    }
    function validateSummary() {
        if(summaryInput.value.trim() ===""){
            summaryError.textContent = "Summary is required.";
            return false;
        }else {
            summaryError.textContent = "";
            return true;
        }
    }
    titleInput.addEventListener("blur",validateTitle);
const form = document.getElementById("animeform");
  form.addEventListener("submit",function (event){
    const isValid = validateTitle();
    if(!isValid){
        event.preventDefault();
    }
});
const value = titleInput.value.trim();
  if (value.length > 50){
    titleError.textContent ="No more than 50 characters allowed.";
    return false;
  }
  typeButtons.forEach(radioButton => {
    radioButton.addEventListener('blur', ValidateType);
  });
  startDateInput.addEventListener("blur", validateStartDate);
  genreInput.addEventListener("blur" , validateGenre);
  summaryInput.addEventListener("blur" , validateSummary);
});