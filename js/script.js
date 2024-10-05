// Initialize AOS
    AOS.init();


window.onscroll = function() {
    const element = document.querySelector('.navbar');
    const scrollPosition = window.scrollY; // Get the scroll position on the Y-axis

    if (scrollPosition > 100) { // Adjust 100px to the point where you want to trigger the class
        element.classList.add('fixed-top');

    } else {
        element.classList.remove('fixed-top');
    }
};

$(document).ready(function() {
    // Initialize Select2 for the dropdown with search and autocomplete feature
    $('#destination').select2({
        placeholder: 'Select or enter a country...',
        allowClear: false
    });

    $('.destination').select2({
        placeholder: 'Select or enter a country...',
        allowClear: false
    });
    
    $('.all-airports').select2({
        placeholder: 'Select or enter an airport...',
        allowClear: false
    });

    $('.all-cities').select2({
        placeholder: 'Select or enter a city...',
        allowClear: false
    });
});



const allCountries = [
    "Afghanistan",
    "Albania",
    "Algeria",
    "Andorra",
    "Angola",
    "Antigua and Barbuda",
    "Argentina",
    "Armenia",
    "Australia",
    "Austria",
    "Azerbaijan",
    "Bahamas",
    "Bahrain",
    "Bangladesh",
    "Barbados",
    "Belarus",
    "Belgium",
    "Belize",
    "Benin",
    "Bhutan",
    "Bolivia",
    "Bosnia and Herzegovina",
    "Botswana",
    "Brazil",
    "Brunei",
    "Bulgaria",
    "Burkina Faso",
    "Burundi",
    "Cabo Verde",
    "Cambodia",
    "Cameroon",
    "Canada",
    "Central African Republic",
    "Chad",
    "Chile",
    "China",
    "Colombia",
    "Comoros",
    "Congo, Democratic Republic of the",
    "Congo, Republic of the",
    "Costa Rica",
    "Croatia",
    "Cuba",
    "Cyprus",
    "Czech Republic",
    "Denmark",
    "Djibouti",
    "Dominica",
    "Dominican Republic",
    "Ecuador",
    "Egypt",
    "El Salvador",
    "Equatorial Guinea",
    "Eritrea",
    "Estonia",
    "Eswatini",
    "Ethiopia",
    "Fiji",
    "Finland",
    "France",
    "Gabon",
    "Gambia",
    "Georgia",
    "Germany",
    "Ghana",
    "Greece",
    "Grenada",
    "Guatemala",
    "Guinea",
    "Guinea-Bissau",
    "Guyana",
    "Haiti",
    "Honduras",
    "Hungary",
    "Iceland",
    "India",
    "Indonesia",
    "Iran",
    "Iraq",
    "Ireland",
    "Israel",
    "Italy",
    "Jamaica",
    "Japan",
    "Jordan",
    "Kazakhstan",
    "Kenya",
    "Kiribati",
    "Korea, North",
    "Korea, South",
    "Kuwait",
    "Kyrgyzstan",
    "Laos",
    "Latvia",
    "Lebanon",
    "Lesotho",
    "Liberia",
    "Libya",
    "Liechtenstein",
    "Lithuania",
    "Luxembourg",
    "Madagascar",
    "Malawi",
    "Malaysia",
    "Maldives",
    "Mali",
    "Malta",
    "Marshall Islands",
    "Mauritania",
    "Mauritius",
    "Mexico",
    "Micronesia",
    "Moldova",
    "Monaco",
    "Mongolia",
    "Montenegro",
    "Morocco",
    "Mozambique",
    "Myanmar",
    "Namibia",
    "Nauru",
    "Nepal",
    "Netherlands",
    "New Zealand",
    "Nicaragua",
    "Niger",
    "Nigeria",
    "North Macedonia",
    "Norway",
    "Oman",
    "Pakistan",
    "Palau",
    "Palestine",
    "Panama",
    "Papua New Guinea",
    "Paraguay",
    "Peru",
    "Philippines",
    "Poland",
    "Portugal",
    "Qatar",
    "Romania",
    "Russia",
    "Rwanda",
    "Saint Kitts and Nevis",
    "Saint Lucia",
    "Saint Vincent and the Grenadines",
    "Samoa",
    "San Marino",
    "Sao Tome and Principe",
    "Saudi Arabia",
    "Senegal",
    "Serbia",
    "Seychelles",
    "Sierra Leone",
    "Singapore",
    "Slovakia",
    "Slovenia",
    "Solomon Islands",
    "Somalia",
    "South Africa",
    "South Sudan",
    "Spain",
    "Sri Lanka",
    "Sudan",
    "Suriname",
    "Sweden",
    "Switzerland",
    "Syria",
    "Taiwan",
    "Tajikistan",
    "Tanzania",
    "Thailand",
    "Timor-Leste",
    "Togo",
    "Tonga",
    "Trinidad and Tobago",
    "Tunisia",
    "Turkey",
    "Turkmenistan",
    "Tuvalu",
    "Uganda",
    "Ukraine",
    "United Arab Emirates",
    "United Kingdom",
    "United States",
    "Uruguay",
    "Uzbekistan",
    "Vanuatu",
    "Vatican City",
    "Venezuela",
    "Vietnam",
    "Yemen",
    "Zambia",
    "Zimbabwe"
];


// Function to populate the select options dynamically  
function populateCountries() {
    const countrySelect = $('.all-countries');
    allCountries.forEach(country => {
        const option = $('<option></option>').attr('value', country).text(country);
        countrySelect.append(option);
    });
}

// Populate countries on document ready
$(document).ready(function() {
    populateCountries();
});

const select = document.getElementById('select-destination');
const currentDate = new Date();
const currentYear = currentDate.getFullYear();
const currentMonth = currentDate.getMonth(); // 0 = January, 11 = December
const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

// Generate months from the current month to the next 5 years
for (let year = currentYear; year <= currentYear + 5; year++) {
    for (let month = 0; month < 12; month++) {
        // Skip months before the current month for the current year
        if (year === currentYear && month < currentMonth) continue;

        const option = document.createElement('option');
        option.value = `${months[month]} ${year}`;
        option.textContent = `${months[month]} ${year}`;
        select.appendChild(option);

        // Stop adding options once 5 years from the current month have been covered
        if (year === currentYear + 5 && month === currentMonth - 1) break;
    }
};

let airportData = null; // Global variable to store fetched airports
let cityData = null;    // Global variable to store fetched cities

// Function to fetch airport data and store it in memory
async function fetchAirportData() {
    try {
        const response = await fetch('https://cdn.jsdelivr.net/npm/airports-json@1.0.0/data/airports.json');
        if (!response.ok) {
            throw new Error("Error fetching airport data");
        }
        airportData = await response.json();
        console.log("Airports data fetched successfully:", airportData);
    } catch (error) {
        console.error('Error fetching airport data:', error);
    }
}

// Function to fetch city data and store it in memory
async function fetchCityData() {
    try {
        const response = await fetch('https://nemconsults.com/cities-minified.json'); // Ensure this path is correct
        if (!response.ok) {
            throw new Error("Error fetching city data");
        }
        cityData = await response.json();
        console.log("City data fetched successfully:", cityData);
    } catch (error) {
        console.error('Error fetching city data:', error);
    }
}

// Function to populate the airport select fields with stored data
function populateAirports() {
    const selectElements = document.querySelectorAll('.all-airports');
    if (!airportData) return; // If data isn't loaded yet, return early

    selectElements.forEach(selectElement => {
        selectElement.innerHTML = ''; // Clear existing options (including the loading placeholder)
        const placeholderOption = document.createElement('option');
        placeholderOption.textContent = 'Select an airport';
        placeholderOption.disabled = true;
        placeholderOption.selected = true;
        selectElement.appendChild(placeholderOption); // Add a default 'Select an airport' option

        airportData.filter(airport => airport.name).forEach(airport => {
            const option = document.createElement('option');
            option.value = airport.iata_code || airport.ident;
            option.textContent = `${airport.name} - ${airport.municipality}, ${airport.iso_country} (${airport.iata_code})`;
            selectElement.appendChild(option);
        });
    });
}

// Function to populate the city select fields with stored data
function populateCities() {
    const selectElements = document.querySelectorAll('.all-cities');
    if (!cityData) return; // If data isn't loaded yet, return early

    selectElements.forEach(selectElement => {
        selectElement.innerHTML = ''; // Clear existing options (including the loading placeholder)
        const placeholderOption = document.createElement('option');
        placeholderOption.textContent = 'Select a city/country';
        placeholderOption.disabled = true;
        placeholderOption.selected = true;
        selectElement.appendChild(placeholderOption); // Add a default 'Select a city' option

        cityData.forEach(city => {
            const option = document.createElement('option');
            option.value = city.geonameid; // Use geonameid as value or adjust to your needs
            option.textContent = `${city.name}, ${city.subcountry}, ${city.country}`;
            selectElement.appendChild(option);
        });
    });
}

// Call the function to populate the airports and cities when the page loads
document.addEventListener('DOMContentLoaded', async () => {
    // Show placeholders immediately on page load
    populatePlaceholders(); 

    // Fetch both airport and city data in parallel
    await Promise.all([fetchAirportData(), fetchCityData()]);

    // Populate dropdowns after the data is loaded
    populateAirports();
    populateCities();
});

// Function to populate placeholders while loading
function populatePlaceholders() {
    const airportSelects = document.querySelectorAll('.all-airports');
    const citySelects = document.querySelectorAll('.all-cities');
        
    // Set loading placeholders for airport select elements
    airportSelects.forEach(selectElement => {
        selectElement.innerHTML = '<option disabled selected>Please wait, loading...</option>';
    });

    // Set loading placeholders for city select elements
    citySelects.forEach(selectElement => {
        selectElement.innerHTML = '<option disabled selected>Please wait, loading...</option>';
    });
}