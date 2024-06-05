
function isDebit(value){
    let debit = <?php echo json_encode(getTransactionTypes('dr'))?>;
    console.log(debit);
    return debit.some(obj => obj.ledgerno === value || obj.name === value);
}
function getValue(account){
    let url = "http://localhost/master/fin/getBalanceAccount";
    let data = { account: account };

    return fetch(url, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        return data; // return the data from the fetch operation
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    let form =document.querySelector('#ledger-insert-form')

    form.addEventListener('submit', function(event){
        event.preventDefault()
        let debitSelectAccount = document.querySelector('#debit').value
        let creditSelectAccount = document.querySelector('#credit').value
        let amount = document.querySelector('#amount').value
        getValue(debitSelectAccount)
            .then(drVal => {
                // console.log(drVal); // log the data from the fetch operation


                if (!isDebit(debitSelectAccount)) {
                    drVal = drVal * -1;
                }
                
                
                if(!isDebit(debitSelectAccount)){
                    drVal = drVal - amount;
                    if (drVal < 0){
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Amount',
                            text: 'Selected Debit account will become negative'
                        });
                        return;
                    }
                }

                getValue(creditSelectAccount)
                    .then(crVal => {
                        if (!isDebit(creditSelectAccount)) {
                            crVal = crVal * -1;
                        }
                        if(isDebit(creditSelectAccount) ){
                            crVal = crVal - amount;
                            if (crVal < 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Invalid Amount',
                                    text: 'Selected Credit account will become negative'
                                });
                                return;
                            }
                        }
                        console.log(crVal);
                        if (crVal < 0){
                            Swal.fire({
                                icon: 'error',
                                title: 'Invalid Amount',
                                text: 'Credit account will become negative'
                            });
                            return;
                        }

                    //    If validation passes, check HTML5 validation and submit the form
                        if (form.checkValidity()) {
                            form.submit();
                        } else {
                            form.reportValidity();
                        }
                    })
            });
    })
})