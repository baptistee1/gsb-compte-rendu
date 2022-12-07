console.log('test');

function getElem(elem){
    console.log(elem);
}
let docGetElem = document.getElementById('motif1');
docGetElem.onclick = () => {

};

function testMotifAutre(valeur){
    if (valeur == 3){
        document.getElementById('motif2').disabled = false;
    }
}

console.log(docGetElem);