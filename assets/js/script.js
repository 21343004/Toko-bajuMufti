<!-- JavaScript untuk Interaksi -->
<script>
document.querySelectorAll('.add-to-cart').forEach(button => {
  button.addEventListener('click', function() {
    const productId = this.dataset.id;
    fetch('add_to_cart.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({product_id: productId})
    })
    .then(response => response.json())
    .then(data => {
      if(data.success) {
        // Update cart counter
        const cartCount = document.getElementById('cart-count');
        cartCount.textContent = data.cart_count;
        
        // Show notification
        new bootstrap.Toast(document.getElementById('cart-toast')).show();
      }
    });
  });
});
</script>
