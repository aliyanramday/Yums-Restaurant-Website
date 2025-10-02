// pop-up on checkout
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('checkoutBtn');
    if (btn) {
      btn.addEventListener('click', e => {
        e.preventDefault();
        alert("Your order has been submitted!\nThank you for ordering at Yums.");
        window.location = btn.href;
      });
    }
  });
  