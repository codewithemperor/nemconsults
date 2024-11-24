function onClick(e) {
    e.preventDefault();  // Prevent the default form submission behavior
    grecaptcha.ready(function() {
      grecaptcha.execute('6LfqcGMqAAAAACm7GV-MTZDS0HtTNFHvgP-OjiwB', {action: 'submit'}).then(function(token) {
        // Attach the token to the form
        document.getElementById('recaptchaToken').value = token;

        // Submit the form
        document.getElementById("contact-form").submit();
      });
    });
}

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
// Spinner CSS - Insert this in the <style> tags of your HTML or a CSS file
const spinnerStyle = `
  .spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border-left-color: #09f;
    animation: spin 1s ease infinite;
    margin: 10px auto;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
`;

const styleSheet = document.createElement("style");
styleSheet.innerText = spinnerStyle;
document.head.appendChild(styleSheet);

// Function to populate countries using plain JavaScript
function populateCountries() {
    const countrySelects = document.querySelectorAll('.all-countries');
    countrySelects.forEach(selectElement => {
        allCountries.forEach(country => {
            const option = document.createElement('option');
            option.value = country;
            option.textContent = country;
            selectElement.appendChild(option);
        });
    });
}

// Function to generate months from the current month to the next 5 years
function populateMonths() {
    const select = document.getElementById('select-destination');
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();
    const currentMonth = currentDate.getMonth(); // 0 = January, 11 = December
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    for (let year = currentYear; year <= currentYear + 5; year++) {
        for (let month = 0; month < 12; month++) {
            if (year === currentYear && month < currentMonth) continue;

            const option = document.createElement('option');
            option.value = `${months[month]} ${year}`;
            option.textContent = `${months[month]} ${year}`;
            select.appendChild(option);

            if (year === currentYear + 5 && month === currentMonth - 1) break;
        }
    }
}

// Function to fetch airport data and store it in memory
let airportData = null;
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

// Function to populate airport select fields incrementally
function populateAirportsIncrementally() {
    const selectElements = document.querySelectorAll('.all-airports');
    if (!airportData) return;

    selectElements.forEach(selectElement => {
        selectElement.innerHTML = '';
        const placeholderOption = document.createElement('option');
        placeholderOption.textContent = 'Select an airport';
        placeholderOption.disabled = true;
        placeholderOption.selected = true;
        selectElement.appendChild(placeholderOption);
    });

    let index = 0;
    function addBatch() {
        const batchSize = 50; // Incremental loading
        const endIndex = Math.min(index + batchSize, airportData.length);

        selectElements.forEach(selectElement => {
            for (let i = index; i < endIndex; i++) {
                const airport = airportData[i];
                const option = document.createElement('option');
                option.value = airport.iata_code || airport.ident;
                option.textContent = `${airport.name} - ${airport.municipality}, ${airport.iso_country} (${airport.iata_code})`;
                selectElement.appendChild(option);
            }
        });

        index = endIndex;

        if (index < airportData.length) {
            setTimeout(addBatch, 0); // Keep UI responsive
        }
    }

    addBatch();
}

// Function to fetch city data and store it in memory
let cityData = null;
async function fetchCityData() {
    try {
        const response = await fetch('https://nemconsults.com/cities-minified.json');
        if (!response.ok) {
            throw new Error("Error fetching city data");
        }
        cityData = await response.json();
        console.log("City data fetched successfully:", cityData);
        populateCitiesIncrementally(); // Start populating cities as soon as data is available
    } catch (error) {
        console.error('Error fetching city data:', error);
    }
}

// Function to populate city select fields incrementally
function populateCitiesIncrementally() {
    const selectElements = document.querySelectorAll('.all-cities');
    if (!cityData) return;

    selectElements.forEach(selectElement => {
        selectElement.innerHTML = '';
        const placeholderOption = document.createElement('option');
        placeholderOption.textContent = 'Select a city/country';
        placeholderOption.disabled = true;
        placeholderOption.selected = true;
        selectElement.appendChild(placeholderOption);
    });

    let index = 0;
    function addBatch() {
        const batchSize = 100; // Incremental loading
        const endIndex = Math.min(index + batchSize, cityData.length);
        
        selectElements.forEach(selectElement => {
            for (let i = index; i < endIndex; i++) {
                const city = cityData[i];
                const option = document.createElement('option');
                option.value = city.geonameid;
                option.textContent = `${city.name}, ${city.subcountry}, ${city.country}`;
                selectElement.appendChild(option);
            }
        });

        index = endIndex;

        if (index < cityData.length) {
            setTimeout(addBatch, 0);
        }
    }

    addBatch();
}

// Function to populate placeholders while loading
function populatePlaceholders() {
    const airportSelects = document.querySelectorAll('.all-airports');
    const citySelects = document.querySelectorAll('.all-cities');
        
    airportSelects.forEach(selectElement => {
        selectElement.innerHTML = '<option disabled selected>Please wait, loading...</option>';
    });

    citySelects.forEach(selectElement => {
        selectElement.innerHTML = '<option disabled selected>Please wait, loading...</option>';
    });
}

// Document ready function to initialize data loading
document.addEventListener('DOMContentLoaded', async () => {
    populatePlaceholders(); // Show placeholders while loading

    // Insert loading spinner while fetching data
    const loadingSpinner = document.createElement('div');
    loadingSpinner.id = 'loading-spinner';
    loadingSpinner.classList.add('spinner');
    document.body.appendChild(loadingSpinner);

    // Fetch both airport and city data in parallel
    await Promise.all([fetchAirportData(), fetchCityData()]);

    // Populate dropdowns after the data is loaded
    populateAirportsIncrementally();
    populateCitiesIncrementally();
    populateCountries();
    populateMonths();

    // Remove the loading spinner once data is populated
    loadingSpinner.remove();
});
