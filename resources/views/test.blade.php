<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel 6 PayPal Integration Tutorial - web-tuts.com</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />

<!-- Styles -->

<style>
body {background-color:#f6f6f5;}
    </style>
</head>
<body>
    <script>
        var wpwlOptions = {
            style: "card"
        }
        </script>
        <script src="https://test.vr-pay-ecommerce.de/v1/paymentWidgets.js?checkoutId={checkoutId}"></script>
        <style>
            body { background-color:white; width:720px; margin:auto;padding:10px;font-size:14px;}
            h2 { margin-top:25px;margin-bottom:10px;padding:5px;width:100%;background-color:#eee;
            border:1px solid #ccc;border-radius:6px;font-size: 16px;font-weight:normal; }
        </style>
      </head>
      <body>
      <h2><input type="radio" checked="checked" /> Checkout with stored payment details</h2>
        <table>
            <tr><td width="100px">Visa</td><td width="200px">xxxx-xxxx-xxxx-1234</td><td width="200px">Dec / 2018</td></tr>
        </table>
        <div><button type="submit" name="pay" class="myButton">Pay now</button></div><br /><br />
      <h2><input type="radio" /> Checkout with new payment method</h2>
        <form action="http://localhost/pay.html">
          MASTER VISA AMEX CHINAUNIONPAY
        </form>
     {{-- <body>
        <!-- add frames script -->
        <script src="https://cdn.checkout.com/js/frames.js"></script>
        <form id="payment-form" method="POST" action="https://merchant.com/charge-card">
          <div class="frames-container">
            <!-- form will be added here -->
          </div>
          <!-- add submit button -->
          <button id="pay-now-button" type="submit" disabled>Pay now</button>
        </form>
      
        <script>
          var paymentForm = document.getElementById('payment-form');
          var payNowButton = document.getElementById('pay-now-button');
      
          Frames.init({
            publicKey: 'pk_test_54de7417-27a5-425a-833e-eb42dcc1c489',
            containerSelector: '.frames-container',
            cardValidationChanged: function() {
              // if all fields contain valid information, the Pay now
              // button will be enabled and the form can be submitted
              payNowButton.disabled = !Frames.isCardValid();
            },
            cardSubmitted: function() {
              payNowButton.disabled = true;
              // display loader
            },
            cardTokenised: function(event) {
              var cardToken = event.data.cardToken;
              Frames.addCardToken(paymentForm, cardToken)
              paymentForm.submit()
            },
            cardTokenisationFailed: function(event) {
              // catch the error
            }
          });
          paymentForm.addEventListener('submit', function(event) {
            event.preventDefault();
            Frames.submitCard();
          });
        </script>
      </body> --}}
     {{-- <div id="card_220921339056" class="wpwl-container wpwl-container-card">
        <form class="wpwl-form wpwl-form-card wpwl-clearfix" action="https://test.vr-pay-ecommerce.de/v1/checkouts/{checkoutId}/payment" method="POST" target="cnpIframe" lang="en">
            <div class="wpwl-group wpwl-group-brand wpwl-clearfix">
                <div class="wpwl-label wpwl-label-brand">Brand</div>
                <div class="wpwl-wrapper wpwl-wrapper-brand">
                    <select class="wpwl-control wpwl-control-brand" name="paymentBrand">
                        <option value="MASTER">Mastercard</option>
                        <option value="VISA">Visa</option>
                    </select>
                </div>
                <div class="wpwl-brand wpwl-brand-card wpwl-brand-MASTER"></div>
            </div>
            <div class="wpwl-group wpwl-group-cardNumber wpwl-clearfix">
                <div class="wpwl-label wpwl-label-cardNumber">Card Number</div>
                <div class="wpwl-wrapper wpwl-wrapper-cardNumber">
                    <input autocomplete="off" type="tel" name="card.number" class="wpwl-control wpwl-control-cardNumber" placeholder="Card Number">
                </div>a
            </div>
            <div class="wpwl-group wpwl-group-expiry wpwl-clearfix">
                <div class="wpwl-label wpwl-label-expiry">Expiry Date</div>
                <div class="wpwl-wrapper wpwl-wrapper-expiry">
                    <input autocomplete="off" type="tel" name="card.expiry" class="wpwl-control wpwl-control-expiry" placeholder="MM / YY" value="10 / 25">
                </div>
            </div>
            <div class="wpwl-group wpwl-group-cardHolder wpwl-clearfix">
                <div class="wpwl-label wpwl-label-cardHolder">Card holder</div>
                <div class="wpwl-wrapper wpwl-wrapper-cardHolder">
                    <input autocomplete="off" type="text" name="card.holder" class="wpwl-control wpwl-control-cardHolder" placeholder="Card holder">
                </div>
            </div>
            <div class="wpwl-group wpwl-group-cvv wpwl-clearfix">
                <div class="wpwl-label wpwl-label-cvv">CVV</div>
                <div class="wpwl-wrapper wpwl-wrapper-cvv">
                    <input autocomplete="off" type="tel" name="card.cvv" class="wpwl-control wpwl-control-cvv" placeholder="CVV">
                </div>
            </div>
            <div class="wpwl-group wpwl-group-submit wpwl-clearfix">
                <div class="wpwl-wrapper wpwl-wrapper-submit">
                    <button type="submit"  class="wpwl-button wpwl-button-pay">Pay now</button>
                </div>
            </div> --}}
            {{-- <input type="hidden" name="shopperResultUrl" value="https://test.vr-pay-ecommerce.de/v1/checkouts/{checkoutId}/payment">
            <input type="hidden" name="card.expiryMonth" value="02">
            <input type="hidden" name="card.expiryYear" value="2025"> --}}
        {{-- </form> --}}
    </div> 
    {{-- <form action="https://vr-pay-ecommerce.docs.oppwa.com/tutorials/integration-guide/customisation" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form> --}}
  
    {{-- <form action="https://vr-pay-ecommerce.docs.oppwa.com/tutorials/integration-guide/advanced-options" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form> --}}
  <script>
//       var wpwlOptions = {
//   maskCvv: true
// }

        var wpwlOptions = {
            iframeStyles: {
                'card-number-placeholder': {
                    'color': '#ff0000',
                    'font-size': '16px',
                    'font-family': 'monospace'
                },
                    'cvv-placeholder': {
                    'color': '#0000ff',
                        'font-size': '16px',
                        'font-family': 'Arial'
                }
            }
        }</script>
</body>
</html>