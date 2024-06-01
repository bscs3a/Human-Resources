<div class="mt-4 py-2 ml-4 mr-4">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
<table class="w-full text-sm text-left text-gray-500">
<thead class="text-xs text-gray-700 uppercase bg-gray-50">
  <tr>
    <th scope="col" class="px-6 py-3">
      Employee 
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Month
      </div>
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Salary
      </div>
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Deduction
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Total Paid
      </div>
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Pay Date
      </div>
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Status
      </div>
    </th>
    <th scope="col" class="px-6 py-3">
      <span class="sr-only">Action</span> 
    </th>
  </tr>
</thead>
<?php foreach ($payroll as $pay): ?>
<tbody>
  <tr class="bg-white border-b">
    <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
      <?php 
        echo $pay['first_name'] . ' ';
        if (!empty($pay['middle_name'])) {
            echo substr($pay['middle_name'], 0, 1) . '. ';
        }
        echo $pay['last_name']; 
      ?>
    </th>
    <td class="px-6 py-4">
      <?php echo $pay['month']; ?>
    </td>
    <td class="px-6 py-4">
      <?php echo $pay['monthly_salary']; ?>
    </td>
    <td class="px-6 py-4">
      <?php echo $pay['total_deductions']; ?>
    </td>
    <td class="px-6 py-4">
      <?php echo $pay['total_salary']; ?>
    </td>
    <td class="px-6 py-4">
      <?php echo $pay['pay_date']; ?>
    </td>
    <td class="px-6 py-4">
      <?php echo $pay['status']; ?>
    </td>
  </tr>
</tbody>
<?php endforeach; ?>   
</table>
</div>
</div>