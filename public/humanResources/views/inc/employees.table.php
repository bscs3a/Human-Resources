<div class="ml-6 flex flex-col mt-2 mr-6">
  <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-300 shadow-md sm:rounded-lg">
    <table class="min-w-full">
      <!-- START HEADER -->
      <thead>
        <tr>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Name</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Department</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Action</th>
        </tr>
      </thead>
      <!-- END HEADER -->
      <?php foreach ($employees as $employee): ?>
        <tbody class="bg-white">
          <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                  <img class="w-10 h-10 rounded-full object-cover object-center"
                    src="<?php echo $employee['image_url']; ?>"
                    alt="">
                </div>
                <div class="ml-4">
                <div class="text-sm font-medium leading-5 text-gray-900">
                    <?php 
                        echo $employee['first_name'] . ' ';
                        if (!empty($employee['middle_name'])) {
                            echo substr($employee['middle_name'], 0, 1) . '. ';
                        }
                        echo $employee['last_name']; 
                    ?>
                </div>
                  <div class="text-sm leading-5 text-gray-500"><?php echo $employee['email']; ?></div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900"><?php echo $employee['position']; ?></div>
              <div class="text-sm leading-5 text-gray-500"><?php echo $employee['department']; ?></div>
            </td>
            <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
              <a route="/hr/employees/id=<?php echo htmlspecialchars($employee['id']); ?>" class="text-indigo-600 hover:text-indigo-900">View</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>