let fileInput = document.querySelector('#file-js-example input[type=file]');
let fieldAmount = 1
let powdercoatRadio = document.offerte.powdercoat;

fileInput.onchange = () => {
    let checkFileName = document.querySelector('#file-js-example input[type=file]').value.toLowerCase()

    if (!checkFileName.endsWith('.png')
        && !checkFileName.endsWith('.jpg')
        && !checkFileName.endsWith(".jpeg")) {
        alert('Please use only one of the following image types: PNG, JPG, JPEG');
        fileInput.reset();
    }

    if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#file-js-example .file-name');
        fileName.textContent = fileInput.files[0].name;
    }
}

document.body.addEventListener('change', function () {
    // if (powdercoatRadio.value == "true") {
    //     console.log("test");
    // }
    showPowdercoat(powdercoatRadio.value);
});






function isNumberKey(txt, evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode == 46) {
        //Check if the text already contains the . character
        if (txt.value.indexOf('.') === -1) {
            return true;
        } else {
            return false;
        }
    } else {
        if (charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;
    }
    return true;
}

function addField() {

    fieldAmount++
    console.log(fieldAmount);
    let fields = [
        'fieldA',
        'fieldB',
        'fieldC',
        'fieldAfschot',
        'fieldLength',
        'fieldAmount'
    ]

    if (fieldAmount < 6) {
        fields.forEach(function (item) {
            let field = document.getElementById(item);
            let fieldClone = field.cloneNode(true);
            document.getElementById(item).after(fieldClone);
        })
    }

    if (fieldAmount == 5) {
        let button = document.getElementById("add-button");
        let buttonClone = button.cloneNode(true);
        let buttonspace2 = document.getElementById("temp-add-button");
        let bottomTable = document.getElementById("bottom-table");
        bottomTable.style.visibility = "hidden";
        bottomTable.style.display = "";
        buttonspace2.appendChild(buttonClone);
        button.parentNode.removeChild(button);
    }

    if (fieldAmount == 6) {
        let bottomTable = document.getElementById("bottom-table");
        bottomTable.style.visibility = "";
        document.getElementById("temp-add-button").style.display = "none";
        bottomTable.style.display = "";

        bottomTable.innerHTML.replace(`disabled="disabled"`, ` `);
    }

    if (fieldAmount > 6) {
        fields.forEach(function (item) {
            let fieldName = item += "2";
            let field = document.getElementById(fieldName);
            let fieldClone = field.cloneNode(true);
            document.getElementById(fieldName).after(fieldClone);
        })
    }

    if (fieldAmount == 10) {
        let button = document.getElementById("add-button2");
        button.parentNode.removeChild(button)
    }
}

function showPowdercoat(value) {
    let extra1 = document.getElementById('powdercoat-extra1');
    let extra2 = document.getElementById('powdercoat-extra2');

    switch (value) {
        case "true":
            extra1.style.visibility = "";
            extra2.style.visibility = "";
            break;

        case "false":
            extra1.style.visibility = "hidden";
            extra2.style.visibility = "hidden";
        default:
            break;
    }

}

