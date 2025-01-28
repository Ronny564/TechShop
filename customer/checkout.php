<?php
require_once "link.php";
require_once "navbar.php";
require_once "data.php";
if(!isset($_SESSION))
{
    session_start();
}
$total = 0; // Initialize total amount
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cart) {
        $total += $cart['price'] * $cart['qty']; // Calculate total
    }
}
?>
<div class="font-[sans-serif] lg:flex lg:items-center lg:justify-center lg:h-screen max-lg:py-4">
  <div class="bg-gradient-to-r from-purple-200 to-purple-500 p-8 w-full max-w-5xl max-lg:max-w-xl mx-auto rounded-lg shadow-xl">
    <h2 class="text-4xl font-extrabold text-gray-900 text-center tracking-tight mb-6">Checkout</h2>

    <div class="grid lg:grid-cols-3 gap-6 max-lg:gap-8 mt-12">
      <div class="lg:col-span-2">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Choose your payment method</h3>
        <form method="POST" action="checkoutaction.php">
        <div class="grid gap-4 sm:grid-cols-2 mt-6">
          <div class="flex items-center">
            <input type="radio" name="payment_method" value="card" class="w-6 h-6 cursor-pointer" id="card" required />
            <label for="card" class="ml-4 flex gap-2 cursor-pointer">
              <img src="https://readymadeui.com/images/visa.webp" class="w-14" alt="Visa" />
              <img src="https://readymadeui.com/images/american-express.webp" class="w-14" alt="American Express" />
              <img src="https://readymadeui.com/images/master.webp" class="w-14" alt="MasterCard" />
            </label>
          </div>

          <div class="flex items-center">
            <input type="radio" name="payment_method" value="paypal" class="w-6 h-6 cursor-pointer" id="paypal" required/>
            <label for="paypal" class="ml-4 flex gap-2 cursor-pointer">
              <img src="https://readymadeui.com/images/paypal.webp" class="w-24" alt="PayPal" />
            </label>
          </div>
        </div>

        <div class="mt-10">
          <div id="cardFields">
          <div class="grid sm:col-span-2 sm:grid-cols-2 gap-4">
              <div>
                <input type="text" placeholder="Name of card holder"
                  class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none shadow-sm hover:ring-2 hover:ring-blue-300 transition duration-200" />
              </div>
              <div>
                <input type="number" placeholder="Postal code"
                  class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none shadow-sm hover:ring-2 hover:ring-blue-300 transition duration-200" />
              </div>
              <div>
                <input type="number" placeholder="Card number"
                  class="col-span-full px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none shadow-sm hover:ring-2 hover:ring-blue-300 transition duration-200" />
              </div>
              <div>
                <input type="number" placeholder="EXP."
                  class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none shadow-sm hover:ring-2 hover:ring-blue-300 transition duration-200" />
              </div>
              <div>
                <input type="number" placeholder="CVV"
                  class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none shadow-sm hover:ring-2 hover:ring-blue-300 transition duration-200" />
              </div>
            </div>
          </div>
          

          <div id="paypalEmailField" style="display: none;">
            <input type="email" placeholder="PayPal Email"
              class="px-4 py-3.5 bg-white text-gray-800 w-full text-sm border rounded-md focus:border-[#007bff] outline-none shadow-sm hover:ring-2 hover:ring-blue-300 transition duration-200" />
          </div>

          <div class="flex flex-wrap gap-4 mt-8">
            <button type="submit"
              class="px-7 py-3.5 text-sm tracking-wide bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">Submit</button>
          </div>
          </form>
        </div>
      </div>
      <div class="bg-white p-6 rounded-md shadow-lg max-lg:-order-1">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Summary</h3>
        <ul class="text-gray-800 mt-6 space-y-4">
          <hr />
          <li class="flex justify-between text-lg font-semibold text-black">
            Total <span class="ml-auto text-xl font-bold text-blue-600">$<?=$total?></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const cardRadio = document.getElementById('card');
  const paypalRadio = document.getElementById('paypal');
  const cardFields = document.getElementById('cardFields');
  const paypalEmailField = document.getElementById('paypalEmailField');

  cardRadio.addEventListener('change', function() {
    if (cardRadio.checked) {
      cardFields.style.display = 'block';
      paypalEmailField.style.display = 'none';
    }
  });

  paypalRadio.addEventListener('change', function() {
    if (paypalRadio.checked) {
      cardFields.style.display = 'none';
      paypalEmailField.style.display = 'block';
    }
  });
});
</script>
