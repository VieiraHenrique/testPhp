const search = document.getElementById("city");
const display = document.getElementById("display");
const form = document.getElementById("form");

cities = cities.map((elem) => {
    return elem.toLowerCase();
});

search.addEventListener("keyup", searchCity);

function searchCity() {
    display.innerHTML = "";
    search.value = search.value.toLowerCase();
    if (search.value.length > 1) {
        cities.forEach((city) => {
            if (city.indexOf(search.value) === 0) {
                displayCity(city);
            }
        });
    }
}

function displayCity(city) {
    let newItem = document.createElement("option");
    newItem.innerHTML = city;
    newItem.setAttribute("name", "city");
    newItem.setAttribute("value", city);
    display.appendChild(newItem);
}

form.addEventListener("submit", (e) => {
    e.preventDefault();
    console.log(display);
});
