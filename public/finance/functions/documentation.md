# checkout this documentation for available functions in the generalFunctions.php:

1. getAccountBalance($ledger, $considerDate = false, $year = null, $month = null)
- this function allows you to get the current value of a ledger code in the ledgertransactions
it will return positive(+) if the balance is debit, it will return negative(-) if the balance is credit.
Make sure to use the abs function if necessary

This function may also consider the month and year of the account.
$considerdate accepts a boolean value, $year accepts a number, $month accepts a number(1-12).

Sample usage: 
```
getAccountBalance("Cash on hand");
getAccountBalance(1, true, 2001, 5);
```

2. getLedgerCode($ledger)
- this function allow you to get the code of a given ledger. it can accept the ledger name and ledger code.
if the data does not exist, it will throw an error.

Sample usage:
```
getLedgerCode("Cash on Hand"); returns 1
getLedgerCode(1); returns 1
getLedgerCode("nothing"); returns error
```

3. getTotalOfGroup($groupType, $year = null, $month = null)
- it is synonymous to the function getAccountBalance.
the difference being is that this considers the grouptype of the function. instead of the ledger code

sample usage:
```
getTotalOfGroup("AA");
getTotalOfGroup("Asset", 2003, 12);
```

4. getGroupCode($groupType);
- synonymous to the getLedgerCode(), but considers the grouptype

5. getTotalOfAccountType($accountType, $year = null, $month = null) 
- synonymous to the getAccountBalance(), but this one consider the account type

6. getAccountCode($accountType)
- synonymous to the getLedgerCode(), but considers the accounttype

7. insertLedgerXact($debitLedger, $creditLedger, $amount, $details = null, $year = null, $month = null)
- this function allows you to insert a transaction in the ledger transaction table.
$debitLedger = LedgerNo_dr
$creditLedger = LedgerNo
$amount = amount
$details = details
datetime can be autofilled.

the final parameters of this function, $year and $month, are there to get the last second possible for a given month/year.
it is only used for reportGeneration advance functions right now, so thread carefully


Special Notes:
V1 - indicated by name(no name extension)
```
V1 is filtering a date
example: you can have data on december, november, october.
callFunction(november) = return all data IN NOVEMBER ONLY
```
V2 - indicated by name
```
V2 is filtering UPTO a date
example: you can have data on december, november, october.
callFunction(november) = return all data IN OCTOBER -> UNTIL NOVEMBER
```