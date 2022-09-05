$(document).ready(()=>{
    $("#boton").prop("disabled",true);
  
    $("#form").change(()=>{
        let checkboxs = document.querySelectorAll('input[type="checkbox"]');
        let checkeds = [];
        checkboxs.forEach((checkbox)=>{
            if(checkbox.checked){
                checkeds.push(checkbox);
            }

            
        })
        if(checkeds.length == 0){
            $("#boton").prop("disabled",true);
        }else{
            $("#boton").prop("disabled",false);
        }

        console.log(checkeds);
    });
// console.log("esta importado el archivo");
    
}); 