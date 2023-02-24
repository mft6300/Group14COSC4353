let today = new Date();
let today2 = "2023-02-09";
let todayDay = today.getDate();
let todayMonth = today.getMonth() + 1;
let todayYear = today.getFullYear();

if(todayMonth < 10) {
    todayMonth = "0" + todayMonth.toString();
}
if(todayDay < 10) {
    todayDay = "0" + todayDay.toString();
}

let string = todayYear.toString() + "-" + todayMonth.toString() + "-" + todayDay.toString();
document.getElementById("deliveryDate").setAttribute("min", string);

let myForm = document.querySelector("#fuelForm");

myForm.addEventListener("submit", validateForm);
document.getElementById("deliveryDate").addEventListener("change", dateChecker);
document.getElementById("Gallons").addEventListener("change", gallonChecker);


function validateForm(event) {
    
    if(!gallonChecker()) {
        event.preventDefault();
    }
    if(!dateChecker()) {
        event.preventDefault();
    }
    
}


function priceChanger() {
    let price = document.getElementById("suggestPrice").value;
    let gallons = document.getElementById("Gallons").value;
    var test = price * gallons;
    document.getElementById("totalAmount").value = test;
}

function gallonChecker() {
    var gallons = document.getElementById("Gallons").value;

    if(parseInt(gallons) < 0) {
        document.getElementById("Gallons").style.backgroundColor = "Orange";
        document.getElementById("numError").classList.remove("hidden");
        return false;
    }
    else {
        document.getElementById("Gallons").style.backgroundColor = "Lightgreen";
        document.getElementById("numError").classList.add("hidden");
        return true;
    }
}

function dateChecker() {
    var date = document.getElementById("deliveryDate").value; 
    let valid = 1;
    let flag = 0;

    let curDate = new Date();
    let curDay = curDate.getDate();
    let curMonth = curDate.getMonth() + 1;
    let curYear = curDate.getFullYear();

    s = date.split("-");
    
    let year = parseInt(s[0]);
    let month = parseInt(s[1]);
    let day = parseInt(s[2]);

    if(year <= curYear) {
        valid = 0;
        if(year === curYear) {
            flag = 1;
            valid = 1;
        }
    }
    if(flag === 1 && month <= curMonth) {
        valid = 0;
        if(curMonth === month) {
            flag = 2;
            valid = 1;
        }
    }
    if(flag === 2 && day < curDay) {
        valid = 0;
    }

    if(valid === 1) {
        document.getElementById("deliveryDate").style.backgroundColor = "Lightgreen";
        document.getElementById("dateError").classList.add("hidden");
        return true;
    }
    else {
        document.getElementById("deliveryDate").style.backgroundColor = "Orange";
        document.getElementById("dateError").classList.remove("hidden");
        return false;
    }
    
}

