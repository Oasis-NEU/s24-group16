function applyWarningMsgStyle() {
    const warningStyle = document.getElementById("warningMsg").style;

    warningStyle.color = 'black';
    warningStyle.backgroundColor = 'white';
    warningStyle.width = '40vw';
    warningStyle.margin = 'auto';
    warningStyle.paddingTop = '10px';
    warningStyle.paddingBottom = '10px';
    warningStyle.marginBottom = '30px';
    warningStyle.borderRadius = '50px';
    warningStyle.marginTop = '30px';
}

/**
 * Warns the user with the appropriate warning message if the queryParam 
 * matches a key in the paramsToWarnings list
 * @param {Object} paramsToWarnings a dictionary of queryParam values to warning messages.
 */
function warn(paramsToWarnings) {
    const actual = new URLSearchParams(window.location.search).get('message');
    if (actual in paramsToWarnings) {
        applyWarningMsgStyle();
        document.getElementById("warningMsg").innerHTML = paramsToWarnings[actual];
    }
}