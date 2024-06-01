<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal</title>
    <link href="../../../../src/tailwind.css" rel="stylesheet">
</head>
<body>
    <form action="/reportGeneration" method="post" class = "font-sans p-10 border-2 border-black rounded-md">
        <h2 class ="font-semibold text-lg m-1">
            Generate Report
        </h2>
        <p class ="italic opacity-50 m-1">
            To generate your report, please choose the type of financial report and specify the date
        </p>

        <label for="report" class = "font-medium m-1">
            Type of Report
        </label>
        <select name="file" id="report" class="m-1 bg-gray-50 border-2 border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            <option selected>Choose a report</option>
            <option value="Income">Income Report</option>
            <option value="OwnerEquity">Owners' Equity</option>
            <option value="TrialBalance">Trial Balance</option>
            <option value="CashFlow">Cash Flow</option>
        </select>
        <label for="monthYear" class = "font-medium m-1">
            Date
        </label>
        <input type="month" id="monthYear" name="monthYear" class="m-1 border-2 bg-gray-50 border-black rounded-lg p-2.5 w-full" required>

        <br>
        <div class = "m-1 gap-3 flex justify-end">
            <button class = "border-2 rounded-md border-black font-bold py-2.5 px-4 drop-shadow-md" type="button">
                Cancel
            </button>
            <button class = "border-2 rounded-md border-black bg-[#F8B721] font-bold py-2.5 px-4 drop-shadow-md" type="submit">
                Generate
            </button>
        </div>
    </form>
    <!-- remove this when making this a modal -->
    <script  src="./../../../../src/route.js"></script>
    <script  src="./../../../../src/form.js"></script>
</body>
</html>