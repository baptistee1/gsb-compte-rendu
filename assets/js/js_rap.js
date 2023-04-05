//console.log('test');

function getElem(elem){
    console.log(elem);
}

/*
let docGetElem = document.getElementById('motif1');
docGetElem.onclick = () => {

};*/

//console.log(docGetElem);

function testMotifAutre(valeur){
    if (valeur == 3){
        document.getElementById('divMotif2').hidden = false;
        document.getElementById('motif2').required = true;
    } else {
        document.getElementById('divMotif2').hidden = true;
        document.getElementById('motif2').required = false;
    }
}

function discoverEchs(nombre){
    for (let i = 1; i <= 10; i++) {
        document.getElementById('divEchs'+i).hidden = true;
    }
    for (let i = 1; i <= nombre; i++) {
        document.getElementById('divEchs'+i).hidden = false;
    }
}

/* onchange="discoverEchs(this.value)" 
function ajoutEchantillons(nombre){
    
    let echs = document.getElementById('echantillons')
    echs.append(echs.cloneNode(true));
    document.createElement("type d'element ici");
}*/