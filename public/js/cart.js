
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser les totaux au chargement de la page
    document.querySelectorAll('.quantity-selector').forEach(selector => {
        const input = selector.querySelector('.quantity');
        const price = parseFloat(selector.closest('.cart-item').querySelector('.md\\:w-2\\/12 .text-primary').textContent.replace('€', '').trim());
        updateItemTotal(selector.closest('.cart-item'), input.value, price);
    });
    updateCartTotals();
    
    document.querySelectorAll('.quantity-selector').forEach(selector => {
        const decrement = selector.querySelector('.decrement');
        const increment = selector.querySelector('.increment');
        const input = selector.querySelector('.quantity');
        const productId = input.getAttribute('data-id');
        const price = parseFloat(selector.closest('.cart-item').querySelector('.md\\:w-2\\/12 .text-primary').textContent.replace('€', '').trim());
        
        decrement.addEventListener('click', () => {
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateQuantity(productId, input.value,'decrement');
                updateItemTotal(selector.closest('.cart-item'), input.value, price);
                updateCartTotals();
            }
        });
        
        increment.addEventListener('click', () => {
            input.value = parseInt(input.value) + 1;
            updateQuantity(productId, input.value,'increment');
            updateItemTotal(selector.closest('.cart-item'), input.value, price);
            updateCartTotals();
        });
        
        input.addEventListener('change', () => {
            if (parseInt(input.value) < 1 || isNaN(parseInt(input.value))) {
                input.value = 1;
            }
            updateQuantity(productId, input.value,);
            updateItemTotal(selector.closest('.cart-item'), input.value, price);
            updateCartTotals();
        });
        
        // Initialiser les totaux par article au chargement
        updateItemTotal(selector.closest('.cart-item'), input.value, price);
    });
    
    // Mise à jour du total d'un article
    function updateItemTotal(itemElement, quantity, price) {
        const totalElement = itemElement.querySelector('.md\\:w-2\\/12.flex.md\\:justify-end .text-primary');
        const total = (quantity * price).toFixed(2);
        totalElement.textContent = total + ' €';
        itemElement.setAttribute('data-item-total', total);
    }

    
    
    // Mise à jour des totaux du panier
    function updateCartTotals() {
        let subtotal = 0;
        
        document.querySelectorAll('.cart-item').forEach(item => {
            subtotal += parseFloat(item.getAttribute('data-item-total') || 0);
        });
        
        // Mettre à jour le sous-total
        const subtotalElement = document.querySelector('.space-y-4 .flex:nth-child(1) .font-medium');
        subtotalElement.textContent = subtotal.toFixed(2) + ' €';
        
        // Mettre à jour le total
        const totalElement = document.querySelector('.flex.justify-between.text-lg.font-semibold .text-primary');
        totalElement.textContent = subtotal.toFixed(2) + ' €';
        
        // Mettre à jour le compteur du panier dans l'en-tête
        const cartCountElement = document.querySelector('.ri-shopping-cart-2-line').nextElementSibling;
        let itemCount = 0;
        document.querySelectorAll('.cart-item').forEach(() => {
            itemCount++;
        });
        cartCountElement.textContent = itemCount;
    }
    
    // Suppression d'articles avec confirmation via le formulaire
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            // La suppression est gérée par le formulaire avec confirmation
        });
    });

   


    const checkoutButton = document.querySelector('.w-full.py-3.bg-primary.text-white.font-medium.rounded-button');
    if (checkoutButton) {
        checkoutButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Check if terms are accepted
            const termsCheckbox = document.getElementById('terms');
            if (!termsCheckbox.checked) {
                alert('Veuillez accepter les conditions générales');
                return;
            }
            
            // Get the total amount from the page
            const totalElement = document.querySelector('.item-total.text-primary');
            const total = parseFloat(totalElement.textContent.replace('€', '').trim());
            
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Show loading state
            checkoutButton.textContent = 'Traitement en cours...';
            checkoutButton.disabled = true;
            
            // Send AJAX request to initiate payment
            fetch('/payement', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ 
                    total: total,
                    note: document.querySelector('textarea').value
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirect to Stripe Checkout
                    window.location.href = data.url;
                } else {
                    throw new Error(data.message || 'Une erreur est survenue');
                }
            })
            .catch(error => {
                console.error("Erreur :", error);
                alert("Une erreur est survenue lors du traitement de votre paiement");
                checkoutButton.textContent = 'Passer la commande';
                checkoutButton.disabled = false;
            });
        });
    }
});

function updateQuantity(productId, quantity,action) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/Panier/${productId}`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ quantity: quantity, action: action })
    })
    .then(res => {
        if (!res.ok) {
            throw new Error('Problème lors de la modification de la quantité');
        }
        return res.json();
    })
    .then(data => {
        console.log("Quantité mise à jour avec succès :", data);
    })
    .catch(error => {
        console.error("Erreur :", error);
    });
}
