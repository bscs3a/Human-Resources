<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../src/tailwind.css" rel="stylesheet">
  <title>Dashboard</title>        
</head>
<body class="text-gray-800 font-sans">
  <!-- start: Sidebar -->
  <div class="fixed left-0 top-0 w-64 h-full bg-[#262261] p-4 z-50 sidebar-menu transition-transform">
    <a route="/" class="flex items-center pb-4 border-b border-b-white ">
      <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
      <span class="text-xl font-bold text-white ml-28">BSCS 3A</span>
  </a>  
  <!-- Dashboard -->
  <ul class="mt-4">
    <li class="mb-1 group">
      <a route="/hr/dashboard" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
        <i class="ri-dashboard-3-line mr-3 text-lg"></i>
        <span class="text-sm">Dashboard</span>
        <i class="ri-arrow-right-s-line ml-auto"></i>
      </a>
    </li>
  <!-- Calendar -->
  <li class="mb-1 group">
    <a route="/hr/schedule" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
      <i class="ri-calendar-2-line mr-3 text-lg"></i>
      <span class="text-sm">Schedule</span>
      <i class="ri-arrow-right-s-line ml-auto"></i>
    </a>
  </li>
  <!-- Applicants -->
  <li class="mb-1 group">
    <a route="/hr/applicants" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
      <i class="ri-file-user-line mr-3 text-lg"></i>
      <span class="text-sm">Applicants</span>
      <i class="ri-arrow-right-s-line ml-auto"></i>
    </a>
  </li>
  <!-- Employees -->
    <li class="mb-1 group">
      <a route="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
        <i class="ri-team-line mr-3 text-lg"></i>
        <span class="text-sm">Employees</span>
        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
      </a>
  <!-- All Employees -->
  <ul class="pl-7 mt-2 hidden group-[.selected]:block">
    <li class="mb-4">
    <a route="/hr/employees" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All Employees
          <i class="ri-arrow-right-s-line ml-auto"></i>
      </a>
    </li>
    <!-- Departments -->
    <li class="mb-4">
      <a route="/hr/employees/departments/product-order" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Departments
          <i class="ri-arrow-right-s-line ml-auto"></i>
      </a>
    </li>
  </ul>
    </li>
  <!-- Leave Requests -->
  <li class="mb-1 group">
    <a route="/hr/leave-requests" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
      <i class="ri-briefcase-line mr-3 text-lg"></i>
      <span class="text-sm">Leave Requests</span>
      <i class="ri-arrow-right-s-line ml-auto"></i>
    </a>
  </li>
  <!-- Payroll -->
  <li class="mb-1 group">
    <a route="/hr/payroll" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
      <i class="ri-line-chart-line mr-3 text-lg"></i>
      <span class="text-sm">Payroll</span>
      <i class="ri-arrow-right-s-line ml-auto"></i>
    </a>
  </li>
  <!-- Daily Time Record -->
  <li class="mb-1 group">
    <a route="/hr/dtr" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
      <i class="ri-calendar-schedule-line mr-3 text-lg"></i>
      <span class="text-sm">Daily Time Record</span>
      <i class="ri-arrow-right-s-line ml-auto"></i>   
    </a>
  </li>
  </ul>
  </div>
<!-- end: Sidebar -->
<script src="/src/Again/js/script.js"></script>

<!-- Start Main Bar -->
<main class="w-[calc(100%-256px)] ml-64 bg-gray-50 min-h-screen ">
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/10">
   <button type="button" class="text-lg text-gray-600">
  <i class="ri-menu-line"></i>
   </button>
   <ul class="flex items-center text-sm ml-4">  
  <li class="mr-2">
    <a href="#" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
  </li>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Payroll</a>
   </ul>
   <ul class="ml-auto flex items-center">
  <li class="mr-1">
    <a href="#" class="text-[#151313] hover:text-gray-600 text-sm font-medium">Sample User</a>
  </li>
  <li class="mr-1">
    <button type="button" class="w-8 h-8 rounded justify-center hover:bg-gray-300"><i class="ri-arrow-down-s-line"></i></button> 
  </li>
   </ul>
  </div>

  <!-- Payroll-->
  <div class="mt-4 ml-6 font-bold text-lg">
    <h1><i class="ri-hourglass-line"></i>Payroll List </h1>
  </div>
    <hr class="mt-4">
    <div class="mt-4 ml-6 mr-4">
        <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 mt-4 dark:focus:ring-yellow-900">Print</button> 
        <input type="search" id="search" name="search" placeholder="Search..." class="mt-[16px] mr-3 w-50 float-right px-2 py-2 border text-sm font-medium border-gray-300 rounded-md focus:outline-none focus:ring-2  focus:ring-blue-500 focus:border-transparent"> 
    </div>
  <!--Table-->
    <div class="mt-4 py-2 ml-4 mr-4">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-3">
          Employee <i class="ri-expand-up-down-fill"></i>
        </th>
        <th scope="col" class="px-6 py-3">
          <div class="flex items-center">
            Month <i class="ri-expand-up-down-fill"></i>
          </div>
        </th>
        <th scope="col" class="px-6 py-3">
          <div class="flex items-center">
            Salary <i class="ri-expand-up-down-fill"></i>
          </div>
        </th>
        <th scope="col" class="px-6 py-3">
          <div class="flex items-center">
            Deduction <i class="ri-expand-up-down-fill"></i>
          </div>
        </th>
        <th scope="col" class="px-6 py-3">
          <div class="flex items-center">
            Total Paid <i class="ri-expand-up-down-fill"></i>
          </div>
        </th>
        <th scope="col" class="px-6 py-3">
          <div class="flex items-center">
            Pay Date <i class="ri-expand-up-down-fill"></i>
          </div>
        </th>
        <th scope="col" class="px-6 py-3">
          <div class="flex items-center">
            Status <i class="ri-expand-up-down-fill"></i>
          </div>
        </th>
        <th scope="col" class="px-6 py-3">
          <span class="sr-only">Action <i class="ri-expand-up-down-fill"></i></span> 
        </th>
      </tr>
    </thead>
    <tbody>
      <!-- Employee 1-->
      <tr class="bg-white border-b">
        <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
          Ziggy C. Co
        </th>
        <td class="px-6 py-4">
          April 2024
        </td>
        <td class="px-6 py-4">
          ₱85,500
        </td>
        <td class="px-6 py-4">
          ₱0
        </td>
        <td class="px-6 py-4">
          ₱85,500
        </td>
        <td class="px-6 py-4">
          2024-04-12
        </td>
        <td class="px-6 py-4">
          Paid
        </td>
        <td class="px-6 py-4">
          <button type="button" class="text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-4 py-2"><i class="ri-bank-card-line"></i></button>
        </td>
      </tr>
      <!-- Employee 2-->
      <tr class="bg-white border-b">
        <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
          Jarelle Anne C. Pamintuan
        </th>
        <td class="px-6 py-4">
          April 2023
        </td>
        <td class="px-6 py-4">
          ₱86,550
        </td>
        <td class="px-6 py-4">
          ₱0
        </td>
        <td class="px-6 py-4">
          ₱86,550
        </td>
        <td class="px-6 py-4">
          2024-04-12
        </td>
        <td class="px-6 py-4">
          Paid
        </td>
        <td class="px-6 py-4">
          <button type="button" class="text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-4 py-2"><i class="ri-bank-card-line"></i></button>
        </td>
      </tr>
      <!-- Employee 3-->
      <tr class="bg-white">
        <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
          Emmanuel Louise L. Gonzales
        </th>
        <td class="px-6 py-4">
          April 2024
        </td>
        <td class="px-6 py-4">
          ₱86,430
        </td>
        <td class="px-6 py-4">
          ₱0
        </td>
        <td class="px-6 py-4">
          ₱86,430
        </td>
        <td class="px-6 py-4">
          2024-04-12
        </td>
        <td class="px-6 py-4">
          Paid
        </td>
        <td class="px-6 py-4">
          <button type="button" class="text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-4 py-2"><i class="ri-bank-card-line"></i></button>
        </td>
      </tr>
      <tr class="border-b"></tr> <!-- Add this line to separate employee 3 and 4 -->
      <!-- Employee 4-->
      <tr class="bg-white">
        <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
          Joshua C. Casupang
        </th>
        <td class="px-6 py-4">
          April 2023
        </td>
        <td class="px-6 py-4">
          ₱84,500
        </td>
        <td class="px-6 py-4">
          ₱0
        </td>
        <td class="px-6 py-4">
          ₱84,500
        </td>
        <td class="px-6 py-4">
          2024-04-12
        </td>
        <td class="px-6 py-4">
          Paid
        </td>
        <td class="px-6 py-4">
          <button type="button" class="text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-4 py-2"><i class="ri-bank-card-line"></i></button>
        </td>
      </tr>
      <tr class="border-b"></tr> <!-- Add this line to separate employee 4 and 5 -->
      <!-- Employee 5-->
      <tr class="bg-white border-b">
        <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
          Nathaniel Fernandez
        </th>
        <td class="px-6 py-4">
          April 2022
        </td>
        <td class="px-6 py-4">
          ₱87,500
        </td>
        <td class="px-6 py-4">
          ₱0
        </td>
        <td class="px-6 py-4">
          ₱87,500
        </td>
        <td class="px-6 py-4">
          2024-04-12
        </td>
        <td class="px-6 py-4">
          Paid
        </td>
        <td class="px-6 py-4">
          <button type="button" class="text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-4 py-2"><i class="ri-bank-card-line"></i></button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
    </div>
  </main>
  </body>
  </html>