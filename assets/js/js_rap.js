/*console.log('test');

function getElem(elem){
    console.log(elem);
}
let docGetElem = document.getElementById('motif1');
docGetElem.onclick = () => {

};*/

//console.log(docGetElem);

function testMotifAutre(valeur){
    if (valeur == 3){
        document.getElementById('motif2').disabled = false;
    } else {
        document.getElementById('motif2').disabled = true;
    }
}

function ajoutEchantillons(nombre){
    
    let echs = document.getElementById('echantillons')
    echs.append(echs.cloneNode(true));
    document.createElement("type d'element ici");

}