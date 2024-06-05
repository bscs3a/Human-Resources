<?php require_once "public/finance/functions\generalFunctions.php"?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    import Swal from 'sweetalert2'

    const Swal = require('sweetalert2')
</script>
<script>
    function existLedgerName(value){
        let account = <?php echo json_encode(getAllLedgerAccounts())?>;
        return account.some(obj => obj.name.toLowerCase() === value.toLowerCase());
    }

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

                let currentInvestments = form.querySelector('[name="totalAllowableValue"]').value;
                var maxValue = validValue[ledgerNameValue];
                
                if (amountValue > maxValue || amountValue > currentInvestments) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Amount',
                        text: 'The amount exceeds the maximum value'
                    });
                } else {
                    if(form.checkValidity()) {
                        form.submit();
                    }
                }
            });
        });
    });

    let formAddAccount = document.querySelector('.validateName');

    formAddAccount.addEventListener('submit', function(){
        let accountName = formAddAccount.querySelector('[name="name"]').value;
        event.preventDefault();
        if(existLedgerName(accountName)){
            Swal.fire({
                icon: 'error',
                title: 'Invalid Name',
                text: 'Name is not unique'
            });
            return;
        } 
        if (formAddAccount.checkValidity()) {
            formAddAccount.submit();
        } else {
            formAddAccount.reportValidity();
        }
    });
}); 
</script>