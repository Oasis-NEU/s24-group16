/**
 * Processes the search information to return no results without querying the database given information that is
 * invalid (e.g. blank, or the course number is something invalid)
 */
function preprocessSearch() {
    const name = document.getElementById('search-name').value;
    const number = document.getElementById('search-number').value;
    const code = document.getElementById('search-code').value;

    
    const searchStatus = document.getElementById('search-status');
    const noResults = document.getElementById('no-results');
    const results = document.getElementById('results');
    

    if (name === "" && number === "" && code === "") {
        searchStatus.innerText = '(Search made with blank values)';
        noResults.style.visibility = 'visible';
        results.innerHTML = '';
        return false;
    }

    if (number > 999 || number < 0) {
        noResults.style.visibility = 'visible';
        results.innerHTML = '';
        return false;
    }

    if (code.length > 10) {
        noResults.style.visibility = 'visible';
        results.innerHTML = '';
        return false;
    }

    results.style.visibility = 'hidden';
    

}