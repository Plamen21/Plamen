
var rowCounter = 1;

function addRow() {
    rowCounter++;
    var table = document.querySelector('table');
    var newRow = table.insertRow();
    newRow.id = "row" + rowCounter;
    newRow.style.border = '1px solid black';
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    cell1.innerHTML = '<input type="text" name="column1[]">';
    cell1.style.border = '1px solid black';
    cell2.innerHTML = `
        <input type="checkbox" name="status${rowCounter}[]" value="Has homework" style="display: inline-block;margin-left: 10px; ">
        <label for="disregarded" style="display: inline-block; margin-right: 30px;">Has homework</label>
        <input type="checkbox" name="status${rowCounter}[]" value="not working" style="display: inline-block; ">
        <label for="disregarded" style="display: inline-block; margin-right: 40px;">not working</label>
        <input type="checkbox" name="status${rowCounter}[]" value="on time" style="display: inline-block; ">
        <label for="disregarded" style="display: inline-block; margin-right: 10px;">on time</label>
    `;
    cell2.style.border = '1px solid black';
    cell3.innerHTML = '<input type="text" name="column3[]">';
    cell3.style.border = '1px solid black';

}

function createCheckbox(labelText, name) {
    var label = document.createElement('label');
    label.textContent = labelText;

    var checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.name = name;

    label.insertBefore(checkbox, label.firstChild);

    return label;
}
