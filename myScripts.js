var errorMessage;

function OnLoad() {
    errorMessage = document.getElementById("errorMsg");
    errorMessage.style.color = "red";
    errorMessage.readOnly = true;
	errorMessage.value = "";
    OnBlurAll();
    document.getElementById("description").focus();
}
window.onload = OnLoad;

//Validate for Parts form
function ValidateMandatoryParts() {
    var allValueValid = true;
    var invalidId = null;
			
    if (!ValidateTextBox("description")) {
        errorMessage.value += "Please input the description!\n";
        invalidId = "description";
        allValueValid = false;
    }
	
    if (!ValidateTextBox("onHand")) {
        errorMessage.value += "Please input the onHand number!\n";
        invalidId = "onHand";
        allValueValid = false;
    }
	else if (!ValidateInteger("onHand")) {
		errorMessage.value += "onHand is not a whole number. Please input the onHand number!\n";
        invalidId = "onHand";
        allValueValid = false;
	}
	
	if (!ValidateTextBox("onOrder")) {
        errorMessage.value += "Please input the onOrder number!\n";
        invalidId = "onOrder";
        allValueValid = false;
    }
	else if (!ValidateInteger("onOrder")) {
		errorMessage.value += "OnOrder is not a whole number. Please input the onOrder number!\n";
        invalidId = "onOrder";
        allValueValid = false;
	}
	
	if (!ValidateTextBox("cost")) {
        errorMessage.value += "Please input the cost!\n";
        invalidId = "cost";
        allValueValid = false;
    }
	else if (!ValidateNumber("cost")) {
		errorMessage.value += "Cost is not a positive number. Please input the cost!\n";
        invalidId = "cost";
        allValueValid = false;
	}
	
	if (!ValidateTextBox("listPrice")) {
        errorMessage.value += "Please input the list Price!\n";
        invalidId = "listPrice";
        allValueValid = false;
    }
	else if (!ValidateNumber("listPrice")) {
		errorMessage.value += "ListPrice is not a number. Please input the list Price!\n";
        invalidId = "listPrice";
        allValueValid = false;
	}
	
    if (!allValueValid) {
        document.getElementById(invalidId).focus();
    }

    return allValueValid;
}

//Validate for Vendors form
function ValidateMandatoryVendors() {
	var allValueValid = true;
    var invalidId = null;
	
    if (!ValidateTextBox("vendorNo1")) {
        errorMessage.value += "Please input the vendorNo!\n";
        invalidId = "vendorNo1";
        allValueValid = false;
    }
	else if (!ValidateInteger("vendorNo1"))
	{
		errorMessage.value += "VendorNo is not a whole number. Please input the vendorNo!\n";
        invalidId = "vendorNo1";
        allValueValid = false;
	}
	
    if (!ValidateTextBox("vendorName")) {
        errorMessage.value += "Please input the vendorName!\n";
        invalidId = "vendorName";
        allValueValid = false;
    }
	if (!ValidateTextBox("address1")) {
        errorMessage.value += "Please input the address1!\n";
        invalidId = "address1";
        allValueValid = false;
    }
	if (!ValidateTextBox("city")) {
        errorMessage.value += "Please input the city!\n";
        invalidId = "city";
        allValueValid = false;
    }
	if (!ValidateTextBox("prov")) {
        errorMessage.value += "Please input the province!\n";
        invalidId = "prov";
        allValueValid = false;
    }
	else if (!ValidateProvCountryCode("prov")) {
		errorMessage.value += "Wrong format! Please input the prov in two letters!\n";
        invalidId = "prov";
        allValueValid = false;
	}
	
	if (!ValidateTextBox("postCode")) {
        errorMessage.value += "Please input the postal code!\n";
        invalidId = "postCode";
        allValueValid = false;
    }
	else if (!ValidatePostalCode()){
		errorMessage.value += "Postal code should have most 6 numbers or letters!\n";
		invalidId = "postCode";
		allValueValid = false;	
	}
	
	if (!ValidateTextBox("country")) {
        errorMessage.value += "Please input the country!\n";
        invalidId = "country";
        allValueValid = false;
    }
	else if (!ValidateProvCountryCode("country")) {
		errorMessage.value += "Wrong format! Please input the country in two letters!\n";
        invalidId = "country";
        allValueValid = false;
	}
	
	if (!ValidateTextBox("phone")) {
        errorMessage.value += "Please input the phone number!\n";
        invalidId = "phone";
        allValueValid = false;
    }
	else if (!ValidatePhoneFaxNumber("phone")) {
		errorMessage.value += "Wrong format! Please input the 10 digits phone number!\n";
        invalidId = "phone";
        allValueValid = false;
	}

	if (ValidateTextBox("fax") && !ValidatePhoneFaxNumber("fax")) {
		errorMessage.value += "Wrong format! Please input the 10 digits fax number!\n";
        invalidId = "fax";
        allValueValid = false;
	}
	
	if (!allValueValid) {
        document.getElementById(invalidId).focus();
    }

    return allValueValid;
}

function ValidateTextBox(textId) {
    var text = document.getElementById(textId);
    if (text.value == "") {
        return false;
    }
    else {
        return true;
    }
}

function TextToUpper(str) {
    str.value = str.value.toUpperCase();
}

function OnBlur(strId) {
    var element = document.getElementById(strId);

    element.onblur = function () {
        var errMsgBackup = errorMessage.value;
        TextTrim(element);
        switch (strId) {            
            case "description":
            case "vendorName":
            case "address1":
            case "address2":
			case "city":            
                CapitalizeFL(element);
                break;  
			case "phone":
			case "fax":
                if (ValidatePhoneFaxNumber(strId)) {
                    if (element.value.length == 10) {
                        element.value = element.value.substr(0, 3) + "-" +
                            element.value.substr(3, 3) + "-" + element.value.substr(6);
                    }
                } else {
                    errorMessage.value = errMsgBackup;
                }
                break;				
        }
    }   
}

function OnBlurAll() {
    OnBlur("description");
	OnBlur("onHand");
	OnBlur("onOrder");
	OnBlur("cost");
	OnBlur("listPrice");
	
    OnBlur("vendorName");
    OnBlur("address1");
    OnBlur("address2");
    OnBlur("city");
	OnBlur("phone");
	OnBlur("fax"); 
}

function CapitalizeFL(text) {
    text.value = text.value.toLowerCase();
    var textArray = text.value.split(" ");
    for (var i = 0; i < textArray.length; i++) {
        textArray[i] = textArray[i].replace
            (textArray[i].charAt(0), textArray[i].charAt(0).toUpperCase());
    }
    text.value = textArray.join(" ");
}

function TextTrim(text) {
    if (text.value != "") {
        text.value = text.value.trim();
    }
}

function ValidatePostalCode() {
    var text = document.getElementById("postCode");
    var pc = /^\w{3,6}$/;
    var postalCodeValid = false;

    if (text.value.length != 0) {
        if (text.value.match(pc)) {
            postalCodeValid = true;
        } 	
    }

    return postalCodeValid;
}

function ValidateInteger(textId) {
    var text = document.getElementById(textId);
	
	var numPattern = /^[0-9]+$/;
    var numberValid = false;
    if (text.value.length != 0) {
        if (text.value.match(numPattern)) {
            numberValid = true;
			text.value = Number(text.value);
        } 	
    }   
	return numberValid;
}

function ValidateNumber(textId) {
    var text = document.getElementById(textId);
	var numPattern = /^[0-9]*\.?[0-9]+$/;
    var numberValid = false;
   if (text.value.length != 0) {
        if (text.value.match(numPattern)) {
            numberValid = true;
			text.value = Number(text.value);
        } 	
    }   
	return numberValid;
}

function ValidatePhoneFaxNumber(textId) {
    var text = document.getElementById(textId);
    var phoneno = /^\(?([0-9]{3})\)?[-]?([0-9]{3})[-]?([0-9]{4})$/;
    var phoneNumberValid = false;

    if (text.value.length != 0) {
        if (text.value.match(phoneno)) {
            phoneNumberValid = true;
        }      
    }

    return phoneNumberValid;
}

function ValidateProvCountryCode(textId) {
    var text = document.getElementById(textId);
	var codePattern = /^[a-zA-z]{2}$/;
    var codeValid = false;
    if (text.value.length != 0) {
        if (text.value.match(codePattern)) {
            codeValid = true;
        } 	
    }   
	return codeValid;
}
function Clear() {
    errorMessage.value = "";
}




