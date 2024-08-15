function showSingleResult(department_code, department_number, name) {
    let form = document.createElement('form');
    form.action = 'process/process-addclassbutton.php';
    form.method = 'post';



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

    document.getElementById('class-buttons').appendChild(form);



}