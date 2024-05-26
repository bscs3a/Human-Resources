<ul class="ml-auto flex items-center">

<?php
    $db = Database::getInstance();
    $conn = $db->connect();

    $username = $_SESSION['user']['username'];

    // Fetch the employees_id based on the username
    $stmt = $conn->prepare("SELECT employees_id FROM account_info WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $employees_id = $user['employees_id'];

    // Use the current date for attendance_date
    date_default_timezone_set('Asia/Manila');
    $attendance_date = date('Y-m-d');

    // Check if a row exists for the current date and employees_id
    $stmt = $conn->prepare("SELECT * FROM attendance WHERE attendance_date = :attendance_date AND employees_id = :employees_id");
    $stmt->execute([
        ':attendance_date' => $attendance_date,
        ':employees_id' => $employees_id,
    ]);
    $attendance = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdo=null;
    $stmt=null;

    $stmt = $conn->prepare("SELECT * FROM attendance WHERE attendance_date = :attendance_date AND employees_id = :employees_id AND clock_out IS NULL");
    $stmt->execute([
        ':attendance_date' => $attendance_date,
        ':employees_id' => $employees_id,
    ]);
    $clockOut = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdo=null;
    $stmt=null;
    ?>

    <?php if (!$attendance): ?>
        <form method="post" action="/master/po/clock-in">
            <button id="clockInButton" type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded">Clock In</button>
        </form>
    <?php elseif ($clockOut): ?>
        <form method="post" action="/master/po/clock-out">
            <button id="clockOutButton" type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">Clock Out</button>
        </form>
    <?php elseif (!$clockOut): ?>
        <button id="workDoneButton" type="button" class="bg-gray-300 text-black px-2 py-1 rounded">See You Tomorrow!</button>
    <?php endif; ?>

        <div class="relative inline-block text-left ml-4">
                <div>
                <a class="inline-flex justify-between w-full px-4 py-2 text-sm font-medium text-black bg-white rounded-md shadow-sm border-b-2 transition-all hover:bg-gray-200 focus:outline-none hover:cursor-pointer" id="options-menu" aria-haspopup="true" aria-expanded="true">
                    <div class="text-black font-medium mr-4 ">
                    <i class="ri-user-3-fill mx-1"></i> <?= $_SESSION['user']['username']; ?>
                    </div>
                    <i class="ri-arrow-down-s-line"></i>
                </a>
            </div>

            <div class="origin-top-right absolute right-0 mt-4 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <div class="py-1" role="none">
                <form action="/master/logout" method="post">
                    <button type="submit" class="w-full block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                        <i class="ri-logout-box-line"></i>
                        Logout
                    </button>
                </form>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('options-menu').addEventListener('click', function() {
                var dropdownMenu = document.getElementById('dropdown-menu');
                if (dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.remove('hidden');
                } else {
                    dropdownMenu.classList.add('hidden');
                }
            });
        </script>
    </ul>