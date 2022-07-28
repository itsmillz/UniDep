var textArea = document.querySelector('textarea');
var texto = document.getElementById("h2");
texto.innerText="Carácteres especiales: ";

textArea.addEventListener('input', function(){
    let caracterMax = textArea.maxLength;
    let digitando = textArea.value.length;
    let h3 = document.querySelector('h3').innerText = (caracterMax - digitando);
    if(h3 <= 200){
        document.querySelector('h3').style.color = 'green';
    if(h3 <= 100){
        document.querySelector('h3').style.color = 'orange';
        }
    if(h3 <= 50){
        document.querySelector('h3').style.color = 'red';
        }
    }
    else{
        document.querySelector('h3').style.color = 'black';
    }
})