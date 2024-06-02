<?php require_once "public/finance/functions\generalFunctions.php"?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var divs = document.querySelectorAll('div[id*="payModal"]');

    divs.forEach(function(div) {
        var forms = div.querySelectorAll('form');
        forms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                // Your code here
                var amountInput = form.querySelector('input[name="amount"]');
                var amountValue = amountInput.value;

                var ledgerNameSelect = form.querySelector('select[name="ledgerName"]');
                var ledgerNameValue = ledgerNameSelect.value;

                let validValue = {
                    'Cash on hand': <?php echo getAccountBalanceV2('Cash on hand')?>,
                    'Cash on bank': <?php echo getAccountBalanceV2('Cash on bank')?>,
                    'Insurance' : <?php echo getAccountBalanceV2('Insurance')?>,
                    'Inventory' : <?php echo getAccountBalanceV2('Inventory')?>
                };

                var maxValue = validValue[ledgerNameValue];
                
                if (amountValue > maxValue) {
                    amountInput.setCustomValidity('The amount exceeds the maximum value');
                } else {
                    amountInput.setCustomValidity('');
                    if(form.checkValidity()) {
                        form.submit();
                    }
                }
            });
        });
    });
}); 
</script>