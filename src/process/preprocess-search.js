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

    let url = new URL(window.location.href);
    url.searchParams.append('param', 'val');
    window.location.assign(url);
    

    if (name === "" && number === "" && code === "") {
        searchStatus.innerText = '(Search made with blank values)';
        noResults.style.visibility = 'visible';
        results.innerHTML = '';
        return false;
    }

    let searchStatusBuild = '(Search made with "';
    if (name !== "") {
        searchStatusBuild += 'name "' + name + '")';
    } else if (number !== '' && code !== ''){
        searchStatusBuild += 'course code "' + code + '" and number "' + number + '")';
    } else if (number !== '') {
        searchStatusBuild += 'course number "' + number + '")';
    } else {
        searchStatusBuild += 'course code "' + code + '")';
    }

    searchStatus.innerText = searchStatusBuild;


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