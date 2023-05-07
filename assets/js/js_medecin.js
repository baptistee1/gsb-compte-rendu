function myFunction() {
    console.log(document.getElementById('typePra').value);
    if (document.getElementById('typePra').value == "none") {
        text1 = "Voulez vous creer un médecin sans type ?";
        if (confirm(text1) == false) {
            document.getElementById("formMedecin").action = "index.php?uc=médecins&action=formulaireMedecin";
            document.getElementById("formMedecin").submit();
        }
    }

    if (document.getElementById('spe1').value == "none" && document.getElementById('spe2').value == "none") {
        text2 = "Voulez vous creer un médecin sans spécialités ?";
        if (confirm(text2) == false) {
            document.getElementById("formMedecin").action = "index.php?uc=médecins&action=formulaireMedecin";
            document.getElementById("formMedecin").submit();
        }
    }
}