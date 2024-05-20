# GroupType
AA for Asset
LE For Liability and Owner's Equity
IC for income
EP for Expenses

# TransactionType_DE
Dr for Debit,
Cr for Credit

# AccountType
AA:
Fixed assets(debit)
Current assets(debit)

LE:
Capital Accounts(credit)
Accounts Payable(credit)
Tax Payable(credit)
Retained(Credit)

IC:
Sales(credit)
Contra-Revenue(debit)
Purchases(debit)

EP:
Direct Expense(debit)
Indirect Expense(debit)

# Ledger

**Fixed assets**
Equipment
Land
**Current assets**
Cash on hand
Cash on bank
Insurance
Inventory

**Capital Accounts**
A account
B account
**Accounts Payable**
C account
D account
**Tax Payable**
Income Tax Payable
Withholding Tax Payable
**Retained**
retained earnings or loss

**Direct Revenue**
Sales
**Contra-Revenue**
Discount
Allowance
Returns

**Direct Expense**
Payroll
Fuel/Gas


**Indirect Expense**
Rent
Tax
Insurance Expense
Utilities
Theft Expense
Interest Expense
Other Operating Expense

**Purchases**
Cost of Goods Sold

# Ledger Transaction
Dump data 
change the date if needed
``` 
-- Set up a variable for the start date of the month
SET @start_date = '2024-01-01';

-- Set up a variable for the end date of the month
SET @end_date = '2024-01-31';

-- Delete existing data to avoid duplication (if needed)
-- DELETE FROM ledgertransaction;

-- Insert 250 random transactions excluding "Retained Earnings/Loss"
INSERT INTO ledgertransaction (LedgerXactID, LedgerNo, DateTime, LedgerNo_Dr, amount, details)
SELECT 
    NULL,
    l1.ledgerno,
    TIMESTAMPADD(DAY, FLOOR(RAND() * DATEDIFF(@end_date, @start_date)), @start_date) + INTERVAL FLOOR(RAND() * 24) HOUR + INTERVAL FLOOR(RAND() * 60) MINUTE + INTERVAL FLOOR(RAND() * 60) SECOND,
    l2.ledgerno,
    ROUND(RAND() * 10000, 2), -- Random amount between 0 and 10000
    CONCAT('Transaction for ', l1.name)
FROM 
    (SELECT * FROM ledger WHERE ledgerno <> 25 ORDER BY RAND() LIMIT 250) AS l1
JOIN
    (SELECT * FROM ledger WHERE ledgerno <> 25 ORDER BY RAND() LIMIT 250) AS l2
ON l1.ledgerno <> l2.ledgerno
ORDER BY RAND()
LIMIT 250;

```