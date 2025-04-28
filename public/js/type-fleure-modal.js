
function opentypeModal() {
    document.getElementById("typeModal").style.display = "flex";
}

function closetypeModal() {
    document.getElementById("typeModal").style.display = "none";
}

// update:
function opentypeUpdateModal() {
    document.getElementById("typeUpdateModal").style.display = "flex";
}

function closetypeUpdateModal() {
    document.getElementById("typeUpdateModal").style.display = "none";
}

function editTypes(TypeFleur, name) {
document.getElementById('type_id').value = TypeFleur;
document.getElementById('type_name').value = name;
form = document.getElementById('type_form');
form.action = `/TypeFleur/${TypeFleur}`; 


opentypeUpdateModal(); 
}