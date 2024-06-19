@extends('frontend.layout')

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-heading"><strong>Payment for {{ $car->name }}</strong></h2>
                <p>Total Price: Rp{{ number_format($totalPrice, 0, ',', '.') }}</p>
                <button id="pay-button" class="btn-primary">Pay Now</button>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-2_hB8rehSi1ILYzK"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
            // Create a form dynamically to submit the POST request
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("payment.success") }}';

            // Add CSRF token input
            var tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = '_token';
            tokenInput.value = '{{ csrf_token() }}';
            form.appendChild(tokenInput);

            // Add order ID input
            var orderIdInput = document.createElement('input');
            orderIdInput.type = 'hidden';
            orderIdInput.name = 'order_id';
            orderIdInput.value = result.order_id;
            form.appendChild(orderIdInput);

            document.body.appendChild(form);
            form.submit();
        },
        onPending: function(result) {
            window.location.href = '/payment-pending';
        },
        onError: function(result) {
            window.location.href = '/payment-failed';
        },
        onClose: function() {
            alert('Payment popup closed without finishing the payment');
        }
    });
};

</script>
@endsection
