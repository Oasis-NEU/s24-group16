/**
 * Creates html elements with the department code and number for a 
 * class button (button that displays department_code and department_number)
 * @param {*} department_code the class' department_code to display
 * @param {*} department_number the class' department_number to display
 */
function echoClassButton(department_code, department_number) {
    let form = document.createElement('form');

    form.method = 'post';

    let button = document.createElement('button');
    button.type = 'submit';
    button.classList = 'mt-4 btn py-3';
    button.style = 'background-color: white; border-radius: 25px; width: 10vw;';
    button.innerText = department_code + " " + department_number;

    let codeInput = document.createElement('input');
    codeInput.name = 'department_code';
    codeInput.value = department_code;
    codeInput.type = 'hidden';

    let numInput = document.createElement('input');
    numInput.name = 'department_number';
    numInput.value = department_number;
    numInput.type = 'hidden';

    form.appendChild(button);
    form.appendChild(codeInput);
    form.appendChild(numInput);

    document.getElementById('class-buttons').appendChild(form);

}