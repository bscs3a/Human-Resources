<?php 

    
    require_once 'public/finance/functions/generalFunctions.php';


    function pondoForEveryone($department){
        if (!acceptableDepartment($department)){
            throw new Exception("Department does not exist");
        }
        $year = date('Y', strtotime('first day of last month'));
        $month = date('m', strtotime('first day of last month'));

        $cashOnHand = getAccountBalanceV2('Cash on hand',true, $year, $month);
        $cashOnBank = getAccountBalanceV2('Cash on bank',true, $year, $month);

        $balance = $cashOnHand + $cashOnBank;
        $savings = [
            'total' => $balance * 0.2,
            'Cash on hand' => $cashOnHand * 0.2,
            'Cash on bank' => $cashOnBank * 0.2
        ];

        $PO = [
            'total' => $balance * 0.2,
            'Cash on hand' => $cashOnHand * 0.2,
            'Cash on bank' => $cashOnBank * 0.2
        ];
        
        $HR = [
            'total' => $balance * 0.2,
            'Cash on hand' => $cashOnHand * 0.2,
            'Cash on bank' => $cashOnBank * 0.2
        ];
        
        $Finance = [
            'total' => $balance * 0.1,
            'Cash on hand' => $cashOnHand * 0.1,
            'Cash on bank' => $cashOnBank * 0.1
        ];
        
        $Sales = [
            'total' => $balance * 0.1,
            'Cash on hand' => $cashOnHand * 0.1,
            'Cash on bank' => $cashOnBank * 0.1
        ];
        
        $Delivery = [
            'total' => $balance * 0.1,
            'Cash on hand' => $cashOnHand * 0.1,
            'Cash on bank' => $cashOnBank * 0.1
        ];
        
        $Inventory = [
            'total' => $balance * 0.1,
            'Cash on hand' => $cashOnHand * 0.1,
            'Cash on bank' => $cashOnBank * 0.1
        ];
        

        switch ($department) {
            case 'Product Order':
                return $PO;
            case 'Human Resources':
                return $HR;
            case 'Finance':
                return $Finance;
            case 'Point of Sales':
                return $Sales;
            case 'Delivery':
                return $Delivery;
            case 'Inventory':
                return $Inventory;
            case 'Savings':
                return $savings;
            default:
                throw new Exception("Department does not exist");
        }
    }


    function getExpensesPondo($department, $cashAccount){
        $total = 0;
        if (!acceptableDepartment($department)){
            throw new Exception("Department does not exist");
        }
        $year = date('Y');
        $month = date('m');

        $db = Database::getInstance();
        $conn = $db->connect();
        $cashAccount = getLedgerCode($cashAccount);
        if (!$cashAccount){
            throw new Exception("Cash account does not exist");
        }
        $sql = "SELECT 
        (SUM(
            CASE 
                WHEN lt.LedgerNo_Dr = :cashAccount THEN amount 
                ELSE 0 
            END) 
        -
        SUM(
            CASE 
                WHEN lt.LedgerNo = :cashAccount THEN amount 
                ELSE 0 
            END)) 
        as balance
        FROM funds_transaction as ft
        JOIN ledgertransaction as lt ON ft.lt_id = lt.LedgerXactID
        JOIN employees as e ON ft.employee_id = e.id
        WHERE YEAR(datetime) = :year AND MONTH(datetime) = :month AND e.department = :department";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cashAccount', $cashAccount);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':month', $month);
        $stmt->bindParam(':department', $department);
        $stmt->execute();
        $result = $stmt->fetch();
        $total = $result['balance'];

        return $total == 0 ? 0 : $total * -1;
    }

    function getRemainingPondo($department, $cashAccount){
        return pondoForEveryone($department)[$cashAccount] - getExpensesPondo($department, $cashAccount);
    }

    //available are "'Product Order','Human Resources','Point of Sales', 'Inventory','Finance','Delivery', 'Savings'"
    function acceptableDepartment($department){
        $acceptable = array('Product Order','Human Resources','Point of Sales', 'Inventory','Finance','Delivery', 'Savings');
        if (!in_array($department, $acceptable)){
            return false;
        }
        return true;
    }

    // pass savings if you want to return all departments
    function getAllTransactions($department, $page = 1, $itemsPerPage = 10, $year = null, $month = null){
        if (!acceptableDepartment($department)){
            throw new Exception("Department does not exist");
        }
    
        if(($year === null) XOR ($month === null)){
            throw new Exception("Please provide both year and month");
        }
    
        $db = Database::getInstance();
        $conn = $db->connect();
    
        // Calculate the offset
        $offset = ($page - 1) * $itemsPerPage;
    
        // Base SQL query
        $baseSql = "SELECT ft.id as id, l.name as details, lt.amount as amount, e.department as department, lt.datetime as datetime 
                    FROM funds_transaction as ft
                    JOIN ledgertransaction as lt ON ft.lt_id = lt.LedgerXactID
                    JOIN employees as e ON ft.employee_id = e.id
                    JOIN ledger as l ON lt.LedgerNo_Dr = l.LedgerNo";
    
        if ($department == 'Savings') {
            $sql = $baseSql;
            if (is_numeric($year) && is_numeric($month) && $month > 0 && $month < 13) {
                $sql .= " WHERE YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
            }
        } else {
            $sql = $baseSql . " WHERE e.department = :department";
            if (is_numeric($year) && is_numeric($month) && $month > 0 && $month < 13) {
                $sql .= " AND YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
            }
        }
    
        $sql .= " ORDER BY lt.datetime DESC LIMIT :itemsPerPage OFFSET :offset";
    
        $stmt = $conn->prepare($sql);
    
        // Bind values
        if ($department != 'Savings') {
            $stmt->bindValue(':department', $department, PDO::PARAM_STR);
        }
        if (is_numeric($year) && is_numeric($month) && $month > 0 && $month < 13) {
            $stmt->bindValue(':year', $year, PDO::PARAM_INT);
            $stmt->bindValue(':month', $month, PDO::PARAM_INT);
        }
        $stmt->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
        $stmt->execute();
    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
?>