

function openCategoryModal() {
    document.getElementById("categoryModal").style.display = "flex";
}

function closeCategoryModal() {
    document.getElementById("categoryModal").style.display = "none";
}

// update:
function openCategoryUpdateModal() {
    document.getElementById("categoryUpdateModal").style.display = "flex";
}

function closeCategoryUpdateModal() {
    document.getElementById("categoryUpdateModal").style.display = "none";
}

function editCategory(id, name) {
document.getElementById('category_id').value = id;
document.getElementById('category_name').value = name;
form = document.getElementById('category_form');
form.action = `/categories/${id}`; 


openCategoryUpdateModal(); 
}