/*
 * AUTHOR: SHAYNA JAMIESON
 * DATE: 11/16/2019
 * FILENAME: validate.js
 * USING THIS FILE AS A VALIDATION HELPER
 */

function validate() {
    // clears all error messages first before we validate
    let errors = document.getElementsByClassName("err");
    for(let i = 0; i < errors.length; i++) {
        errors[i].style.display = "none";
    }

    // set boolean to let us return whether or not the form should be submitted
    var isValid = true;

    // validate first name -- to not be left blank
    let firstName = document.getElementById("fName").value.trim();
    if(firstName == "") {
        document.getElementById("err-fname").style.display = "block";
        isValid = false;
    }

    // validate last name -- to not be left blank
    let lastName = document.getElementById("lName").value.trim();
    if(lastName == "") {
        document.getElementById("err-lname").style.display = "block";
        isValid = false;
    }

    // validate email - if the user checks for mailing list it has to be valid
    // https://www.w3resource.com/javascript/form/email-validation.php for this assignment I used the regex
    // expression given on w3resource to return if my email was valid or not
    let mailingListChecked = document.getElementById("email-check");
    if(mailingListChecked.checked) {
        // if the mailing list area is checked then we validate on the email
        let email = document.getElementById("email").value.trim();
        if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            document.getElementById("err-email").style.display = "block";
            isValid = false;
        }
    }

    // validate linked-in -- IF the field has text inside of it
    // https://stackoverflow.com/questions/8667070/javascript-regular-expression-to-validate-url for this assignment I used the
    //regex expression given on stack overflow by Christian David to return if the LinkedIn URL was valid or not
    let linkedIn = document.getElementById("linked-in").value.trim();
    if(linkedIn != "") {
        if(!/^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:[/?#]\S*)?$/.test(linkedIn)) {
            document.getElementById("err-linkedin").style.display = "block";
            isValid = false;
        }
    }

    // validate how did we meet options -- needs to choose an option
    // let metOther = document.getElementById("specify-other");
    let howWeMet = document.getElementById("how-we-met");
    if (howWeMet.options[howWeMet.selectedIndex].value == "") {
        document.getElementById("err-how-we-met").style.display = "block";
        isValid = false;
    }

    // validate specify other area -- I felt that this needed validation as it is a required field
    if(howWeMet.options[howWeMet.selectedIndex].value == "other") {
        let specifyOther = document.getElementById("please-specify-other").value.trim();
        if(specifyOther == "") {
            document.getElementById("err-specify-other").style.display = "block";
            isValid = false;
        }
    }

    return isValid;
}

document.getElementById("guestbook-form").onsubmit = validate;