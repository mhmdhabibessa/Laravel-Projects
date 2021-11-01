<script>
    window.onload = function(){
        document.forms['payment_page'].submit();
    }

    function redirectToResult(location) {
        if (location.href !== 'about:blank') {
            window.location.replace(location.href);
        }
    }
</script>
<div>
    <iframe name="payment_frame" id="payment_frame" width="100%" height="800" onLoad="redirectToResult(this.contentWindow.location);">
    </iframe>
    <form action="{{ $paymentPage['Transaction']['PaymentPortal'] }}" method="post" target="payment_frame" id="payment_page" name="payment_page">
        <input type="hidden" name="TransactionID" value="{{ $paymentPage['Transaction']['TransactionID'] }}">
        <button type="submit" class="w-full btn btn-primary hidden">
            {{ __("Pay Now") }}
        </button>
    </form>
</div>
