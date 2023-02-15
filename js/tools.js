let i = 0;
let j = 0;
let original = document.getElementById('InputImage');
let nbImage = document.getElementById('nbImage');

function duplicate() {
    if(j < 6){
        let clone = original.cloneNode(true);
        clone.nodeName = 'addImage' + ++i;
        original.parentNode.appendChild(clone);
        j++;
        nbImage.innerHTML = j+1;
    }

    else {
        alert("Vous ne pouvez pas ajouter plus de 6 images");
    }
}