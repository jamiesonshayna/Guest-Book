let howWeMet = document.getElementById("how-we-met");
howWeMet.onchange = toggleOptionsHowWeMet;

let addToMailingList = document.getElementById("email-check");
addToMailingList.onchange = toggleOptionsForMailingList;

function toggleOptionsForMailingList() {
    let emailOptions = document.getElementById("toggle-email-format");
    let emailAddressLabel = document.getElementById("email-address-label");

    if(this.checked) {
        emailOptions.style.display = "block";
        emailAddressLabel.innerHTML = "*Email Address";
    } else {
        emailOptions.style.display = "none";
        document.getElementById("err-email").style.display = "none";
        emailAddressLabel.innerHTML = "Email Address";
    }
}

function toggleOptionsHowWeMet() {
    let metOther = document.getElementById("specify-other");
    let specifyOtherLabel = document.getElementById("please-specify-label");
    if (this.options[this.selectedIndex].value === "other") {
        metOther.style.display = "block";
        specifyOtherLabel.innerHTML = "*Please specify:";
    } else {
        metOther.style.display = "none";
    }
}