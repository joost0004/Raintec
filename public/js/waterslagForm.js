let fileInput = document.querySelector('#file-js-example input[type=file]');
let fieldAmount = 1
let powdercoatRadio = document.offerte.powdercoat;

fileInput.onchange = () => {
    let checkFileName = document.querySelector('#file-js-example input[type=file]').value.toLowerCase()

    if (!checkFileName.endsWith('.png') &&
        !checkFileName.endsWith('.jpg') &&
        !checkFileName.endsWith(".jpeg")) {
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

        let tempAddButton = document.getElementById("temp-add-button");
        placeBottomTable(tempAddButton);


        let bottomTable = document.getElementById("bottom-table");
        bottomTable.style.visibility = "hidden";
        bottomTable.style.display = "";
        buttonspace2.appendChild(buttonClone);
        button.parentNode.removeChild(button);
    }

    if (fieldAmount == 6) {
        // let bottomTable = document.getElementById("bottom-table");
        // bottomTable.style.visibility = "";
        // document.getElementById("temp-add-button").style.display = "none";
        // bottomTable.style.display = "";

        // bottomTable.innerHTML.replace(``, ` `);
        let tempAddButton = document.getElementById("temp-add-button");
        let bottomTable = document.getElementById("bottom-table");
        bottomTable.style.visibility = "";
        tempAddButton.style.display = "none";
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

function placeBottomTable(elementBeforeTable) {

    console.log(':(');


    let HTML =
    `
    <table class="table" id="bottom-table">
    <thead>
        <tr id="top-row">
            <th></th><th></th><th></th><th></th><th></th><th></th>
        </tr>
    </thead>
    <nav class="level">
        <div class="level-left">
            <tbody id="table-fields">
                <tr>
                    <th>Maat A:</th>
                    <td id="fieldA2">
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input is-small is-rounded
                                                            @error('A[]')

                                                            @enderror" type="number" name="A[]" id="A[]"
                                    placeholder="Maat A" value='{{ old('A[]') }}'
                                    onkeypress="return isNumberKey(this, event);" >
                            </div>
                            <div class="control">
                                <a class="button is-static is-small is-rounded">mm</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a class="button level-item" id="add-button2" onclick="addField()"
                        style="position: absolute; height: 9.5%; width:10%; margin-left: 5%;"
                        >+</a>
                    </td>
                </tr>
                <tr>
                    <th>Maat B:</th>
                    <td id="fieldB2">
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input control is-small is-rounded
                                                                @error('B[]')

                                                                @enderror" type="number" name="B[]" id="B[]"
                                    placeholder="Maat B" value='{{ old('B[]') }}'
                                    onkeypress="return isNumberKey(this, event);" >
                            </div>
                            <div class="control">
                                <a class="button is-static is-small is-rounded">mm</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Maat C:</th>
                    <td id="fieldC2">
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input control is-small is-rounded
                                                                @error('C[]')

                                                                @enderror" type="number" name="C[]" id="C[]"
                                    placeholder="Maat C" value='{{ old('C[]') }}'
                                    onkeypress="return isNumberKey(this, event);" >
                            </div>
                            <div class="control">
                                <a class="button is-static is-small is-rounded">mm</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Afschot:</th>
                    <td id="fieldAfschot2">
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input is-small is-rounded
                                                                @error('afschot[]')

                                                                @enderror" type="number" name="afschot[]"
                                    id="afschot[]" placeholder="Afschot" value='{{ old('afschot[]') }}'
                                    onkeypress="return isNumberKey(this, event);" >
                            </div>
                            <div class="control">
                                <a class="button is-static is-small is-rounded">graden</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Lengte:</th>
                    <td id="fieldLength2">
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input is-small is-rounded
                                                                @error('length[]')

                                                                @enderror" type="number" name="length[]"
                                    id="length[]" placeholder="Lengte" value='{{ old('length[]') }}'
                                    onkeypress="return isNumberKey(this, event);" >
                            </div>
                            <div class="control">
                                <a class="button is-static is-small is-rounded">mm</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Aantal</th>
                    <td id="fieldAmount2">
                        <div class="field has-addons">
                            <div class="control">
                                <input class="input is-small is-rounded
                                                                @error('amount[]')

                                                                @enderror" type="number" name="amount[]"
                                    id="amount[]" placeholder="Aantal" value='{{ old('amount[]') }}'
                                    onkeypress="return isNumberKey(this, event);" >
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </div>
    </nav>
</table>
    `;

    elementBeforeTable.insertAdjacentHTML("afterend", HTML)

}
