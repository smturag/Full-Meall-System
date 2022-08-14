function addInput() {
    var survey_options = document.getElementById('inputName');
    var newField = document.createElement('input');
    newField.setAttribute('type', 'text');
    newField.setAttribute('name', 'name[]');
    newField.setAttribute('class', 'survey_options');
    newField.setAttribute('siz', 50);
    newField.setAttribute('placeholder', 'Another Field');
    newField.required= true;
    survey_options.appendChild(newField);
    console.log(5656)
}
