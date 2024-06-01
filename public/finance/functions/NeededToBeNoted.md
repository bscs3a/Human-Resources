## Prompt engineering indicating all tables
- copy paste or modify the text below to show the tables to gpt or copilot
```
I created a database for my application.
I have 6 tables:
- Group Type
- TransactionType_DE
- AccountType
- Ledger
- Ledger Transaction
- Request Expense

GroupType has:
`grouptype` varchar(2) NOT NULL, - PK
`description` varchar(255) NOT NULL,
`requiresinfo` tinyint(1) NOT NULL


TransactionType_DE has:
    `XactTypeCode` varchar(2) NOT NULL, = PK
  `name` varchar(255) NOT NULL

AccountType has:
`AccountType` int(11) NOT NULL, - PK
  `Description` varchar(255) NOT NULL,
  `grouptype` varchar(2) NOT NULL, -FK(from grouptype table)
  `XactTypeCode` varchar(2) NOT NULL -FK(from transactiontype_De)

Ledger has:
 `ledgerno` int(11) NOT NULL, - PK
  `AccountType` int(11) NOT NULL, - FK(from accounttype table)
  `name` varchar(255) NOT NULL,
  `contactIfLE` varchar(255) DEFAULT NULL,
  `contactName` varchar(255) DEFAULT NULL
  
LedgerTransaction has:
`LedgerXactID` int(11) NOT NULL, - PK
  `LedgerNo` int(11) NOT NULL, - FK(from ledger table)
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `LedgerNo_Dr` int(11) NOT NULL, - FK(From ledger table)
  `amount` double NOT NULL,
  `details` text DEFAULT NULL

Request Expense has:
`re_id` int(11) NOT NULL, - PK
  `payusing` int(11) NOT NULL, - FK(from ledger table)
  `amount` double NOT NULL,
  `payfor` int(11) NOT NULL, - FK(from ledger table)
  `proofofinvoice` text NOT NULL,
  `status` enum('pending','confirm','deny') NOT NULL,
  `details` text NOT NULL
```




### Salary

- Salaries are recorded only as salaries. Tax expenses will not be included but is somehow included
- sample:

Salary expense(debit) - 100
Cash - 80 credit
Tax payable - 20 credit


-> Tax payable will be seen in cash flow