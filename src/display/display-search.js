/**
 * Creates HTML elements to show a single search result
 * @param {*} department_code 
 * @param {*} department_number 
 * @param {*} name 
 */
function showSingleResult(department_code, department_number, name) {
    let form = document.createElement('form');
    form.action = 'process/process-addclassbutton.php';
    form.method = 'post';
    form.style = 'margin-top: 20px';



    let input = document.createElement('input');

    input.name = 'class';
    input.value = ` ${department_code} ${department_number}`;
    input.type = 'hidden';

    let button = document.createElement('button');

    button.classList = 'btn btn-theme-orange add-class-btn';
    button.type = 'submit';
    button.innerText = 'Add';

    let label = document.createElement('label');

    label.class = 'add-class-label';
    label.innerText = `${department_code} ${department_number} | ${name}`;


    form.appendChild(input);
    form.appendChild(button);
    form.appendChild(label);

    document.getElementById('results').appendChild(form);
}

/**
 * Changes the visibility of an html element to inform the user that there were no results
 */
function displayNoResult() {
    let noResults = document.getElementById('no-results');
    noResults.style.visibility = "visible";
}

/**
 * Displays to the user the value of one search param that was entered into a search.
 * @param {} searchValue The actual value of one search param
 * @param {*} searchName The name of the search param
 */
function displayOneSearchParam(searchValue, searchName) {
    const searchStatus = document.getElementById('search-status');
    searchStatus.innerText = '(Search made with '+ searchName + ' "' + searchValue + '")'; 
}

/**
 * Displays to the user the value of two search params, specifically searchCode and searchNumber
 * @param {*} searchCode the value of the search code
 * @param {*} searchNumber the value of the search number
 */
function displayTwoSearchParams(searchCode, searchNumber) {
    const searchStatus = document.getElementById('search-status');
    searchStatus.innerText = '(Search made with search code "' + searchCode + '" and search number "' + searchNumber + '")'; 
}
