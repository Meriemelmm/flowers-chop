
const updateProductModal = document.getElementById('updateProductModal');
const updateProductForm = document.getElementById('updateProductForm');
const categoryslect = document.getElementById("Category");
const typeSelect = document.getElementById("Types");
const selected = document.getElementById("Category");

// Populate categories dropdown
categories.forEach(category => {
    const option = document.createElement("option");
    option.value = category.id;
    option.textContent = category.category_name;
    categoryslect.appendChild(option);
});

// Populate types dropdown
types.forEach(type => {
    const option = document.createElement("option");
    option.value = type.id;
    option.textContent = type.type_name;
    typeSelect.appendChild(option);
});

function update(button) {
    updateProductModal.style.display = "flex";

    const Produit = button.getAttribute('data-id');  
    const productName = button.getAttribute('data-name');
    const productDescription = button.getAttribute('data-description');
    const productPrix = button.getAttribute('data-prix');
    const productStock = button.getAttribute('data-stock');
    const productCategoryId = button.getAttribute('data-categoryid');

    updateProductForm['product_name'].value = productName;
    updateProductForm['product_description'].value = productDescription;
    updateProductForm['product_prix'].value = productPrix;
    updateProductForm['product_stock'].value = productStock;
    updateProductForm['product_id'].value = Produit;
    updateProductForm.action = `/Product/${Produit}`; 
    
    categoryslect.value = productCategoryId; 
    const productTypeIds = JSON.parse(button.getAttribute('data-typeids') || "[]");
    
    types.forEach(type => {
        if (productTypeIds.includes(type.id)) {
            typeSelect.value = type.id;
        }
    });
}

const addProductBtn = document.getElementById('addProductBtn');
const addProductModal = document.getElementById('addProductModal');
const closeModalBtns = document.querySelectorAll('.close-modal');

function openModal() {
    addProductModal.style.display = 'flex';
    document.body.style.overflow = 'hidden'; 
}

function closeModal() {
    addProductModal.style.display = 'none';
    updateProductModal.style.display = 'none';
    document.body.style.overflow = 'auto'; 
}

addProductBtn.addEventListener('click', openModal);

closeModalBtns.forEach(btn => {
    btn.addEventListener('click', closeModal);
});

addProductModal.addEventListener('click', (e) => {
    if (e.target === addProductModal) {
        closeModal();
    }
});
