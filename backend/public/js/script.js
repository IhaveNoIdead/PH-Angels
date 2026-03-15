function showFlashMessage(message, type = 'success') 
{
    const path = window.location.pathname;

    if (!path.includes('/productsPage') && !path.includes('/plansPage') && !path.includes('/product/'))
    {
        return;
    } 

    const flash = document.createElement('div');

    flash.className = `fixed top-4 right-4 px-6 py-3 rounded shadow-lg z-[1000] ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
    }`;

    flash.textContent = message;
    
    document.body.appendChild(flash);

    setTimeout(() => {
        flash.remove();
    }, 1000);
}

document.addEventListener('DOMContentLoaded', function() {
    const cartForms = document.querySelectorAll('.cart-action-form');

    cartForms.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const currentForm = this;

            const formData = new FormData(form);
            const action = form.getAttribute('action');

            fetch(action, {
                method: 'POST',
                body: formData
                
            })
            .then(response => response.json())
            .then(data => {
                console.log('Form submitted successfully', data);

                if (data.success) 
                {
                    showFlashMessage(data.message || 'Product added successfully!', 'success');
                }
                else
                {
                    showFlashMessage(data.message || 'Failed to add product', 'error');
                }

                // Update cart total price
                const totalPrice = document.getElementById('cart-total');
                if (totalPrice) 
                {
                    const price = data.cartTotalPrice ?? 0;
                    totalPrice.textContent = '₱' + parseFloat(price).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }

                // Update item quantity
                const totalQuantity = document.querySelector(`.item-quantity[data-id="${data.id}"]`);
                if (totalQuantity) 
                {
                    totalQuantity.textContent = data.quantity;
                }

                // Update item subtotal price
                const subTotal = document.querySelector(`.subtotal[data-id="${data.id}"]`);
                if (subTotal) 
                {
                    const itemSubtotal = data.itemSubtotal ?? 0;
                    subTotal.textContent = '₱' + parseFloat(itemSubtotal).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }

                if (data.quantity === 0) 
                {
                    const row = currentForm.closest('tr');
                    if(row)
                    {
                        row.remove();
                    } 
                }
            })
            .catch(error => {
                console.error('Error submitting form:', error);
            });
        })
        
    })
})