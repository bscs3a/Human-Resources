
<div class="ml-6 flex flex-col mt-8 mr-6">
  <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-300 shadow-md sm:rounded-lg">
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Name</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Department</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Date</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            In</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Out</th>
        </tr>
      </thead>
      <?php foreach ($dailyTimeRecord as $dtr): ?>
        <tbody class="bg-white">
          <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                  <!-- THESE IS FROM EMPLOYEES TABLE -->
                  <img class="w-10 h-10 rounded-full object-cover object-center"
                    src="<?php echo $dtr['image_url']; ?>"
                    alt="">
                </div>
                <div class="ml-4">
                  <!-- THESE ARE FROM EMPLOYEES TABLE -->
                  <div class="text-sm font-medium leading-5 text-gray-900">
                    <?php 
                        echo $dtr['first_name'] . ' ';
                        if (!empty($dtr['middle_name'])) {
                            echo substr($dtr['middle_name'], 0, 1) . '. ';
                        }
                        echo $dtr['last_name']; 
                    ?>
                  </div>
                  <div class="text-sm leading-5 text-gray-500"><?php echo $dtr['email']; ?></div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <!-- THESE ARE FROM EMPLOYEES TABLE -->
              <div class="text-sm leading-5 text-gray-900"><?php echo $dtr['department']; ?></div>
              <div class="text-sm leading-5 text-gray-500"><?php echo $dtr['position']; ?></div>
            </td>
            <!-- THESE ARE FROM ATTENDANCE TABLE -->
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900"><?php echo date('F d, Y', strtotime($dtr['attendance_date'])); ?></span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900"><?php echo date('h:i a', strtotime($dtr['clock_in'])); ?></span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <span class="text-sm leading-5 text-gray-900">
                <?php 
                if (!is_null($dtr['clock_out'])) {
                    echo date('h:i a', strtotime($dtr['clock_out'])); 
                }
                ?>
            </span>
            </td>
          </tr>
          <?php endforeach; ?> 
        </tbody>
      </table>
    </div>
  </div>