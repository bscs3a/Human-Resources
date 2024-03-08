<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="./../src/tailwind.css" rel="stylesheet" />
  </head>
  <body>
    <div class="flex h-screen bg-gray-100">
      <!-- sidebar -->
      <div class="md:flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-end h-16 bg-violet-950 p-6">
          <span onclick="location.href='/Master'" class="text-white font-bold uppercase text-4xl">BSCS 3A</span>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
          <nav class="flex-1 px-2 py-4 bg-violet-950">
            <a
              href="/Master/adm/dashboard"
              class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
              <span class="flex items-center">
                <span class="mx-4 font-normal">Dashboard</span>
              </span>

              <span>
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
              </span>
            </a>

            <a
              href="#"
              class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
              <span class="flex items-center">
                <span class="mx-4 font-normal">Invoices</span>
              </span>

              <span>
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
              </span>
            </a>

            <a
              href="#"
              class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
              <span class="flex items-center">
                <span class="mx-4 font-normal">Expense Category</span>
              </span>

              <span>
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
              </span>
            </a>

            <a
              href="#"
              class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
              <span class="flex items-center">
                <span class="mx-4 font-normal">Expense Record</span>
              </span>

              <span>
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
              </span>
            </a>

            <a
              href="/Master/adm/product"
              class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
              <span class="flex items-center">
                <span class="mx-4 font-normal">Items</span>
              </span>

              <span>
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
              </span>
            </a>

            <a
              href="#"
              class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
              <span class="flex items-center">
                <span class="mx-4 font-normal">Payments</span>
              </span>

              <span>
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
              </span>
            </a>

            <a
              href="#"
              class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
              <span class="flex items-center">
                <span class="mx-4 font-normal">Revenue Record</span>
              </span>

              <span>
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
              </span>
            </a>

            <a
              href="#"
              class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
              <span class="flex items-center">
                <span class="mx-4 font-normal">Balance Sheet</span>
              </span>

              <span>
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
              </span>
            </a>

            <a
              href="#"
              class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
              <span class="flex items-center">
                <span class="mx-4 font-normal">Database</span>
              </span>

              <span>
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
              </span>
            </a>

            <a
              href="#"
              class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
              <span class="flex items-center">
                <span class="mx-4 font-normal">Users</span>
              </span>

              <span>
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
              </span>
            </a>
          </nav>
        </div>
      </div>

      <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- Navbar -->
        <div
          class="flex items-center justify-between h-16 bg-zinc-200 border-b border-gray-200">
          <div class="flex items-center px-4">
            <button
              class="text-gray-500 focus:outline-none focus:text-gray-700">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
            <h1 class="text-2xl font-semibold px-5">Dashboard</h1>
          </div>

          <div class="flex items-center pr-4 text-xl font-semibold">
            Sample User

            <span class="p-3">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </div>
        </div>

        <!-- Main Content -->
        <div class="p-4">
          <div class="m-5 flex items-center pl-20">
            <h1 class="mr-4 text-2xl font-semibold text-gray-600">Employee</h1>
            <span>
              <svg
                class="h-4 w-4 text-gray-500"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
            <span class="ml-4 text-2xl font-semibold text-gray-800"
              >Edit Employee</span
            >
          </div>

          <form class="w-5/6 mx-auto bg-white rounded-lg shadow-md p-5">
            <div class="grid max-w-2xl mx-auto mt-4">
              <div class="flex flex-col items-center">
                <div
                  class="flex flex-row items-center space-y-5 sm:flex-row sm:space-y-0">
                  <img
                    class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500"
                    src="../img/berry.png"
                    alt="" />
                </div>

                <div class="flex justify-end gap-3 pt-6">
                  <button
                    type="submit"
                    class="text-black border border-black bg-amber-400 font-bold rounded-lg text-sm w-full sm:w-auto px-7 py-2 text-center">
                    change profile
                  </button>
                  <button
                    type="submit"
                    class="text-black border border-black bg-transparent font-bold rounded-lg text-sm w-full sm:w-auto px-7 py-2 text-center">
                    delete profile
                  </button>
                </div>
              </div>

              <div class="items-center mt-8 sm:mt-14 text-[#202142]">
                <div
                  class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                  <div class="w-full">
                    <label
                      for="first_name"
                      class="block mb-2 text-sm font-medium text-gray-800"
                      >First Name</label
                    >
                    <input
                      type="text"
                      id="first_name"
                      class="border border-gray-300 text-gray-700 text-sm rounded-lg w-full p-2.5" />
                  </div>

                  <div class="w-full">
                    <label
                      for="last_name"
                      class="block mb-2 text-sm font-medium text-gray-800"
                      >Last Name</label
                    >
                    <input
                      type="text"
                      id="last_name"
                      class="border border-gray-300 text-gray-700 text-sm rounded-lg w-full p-2.5" />
                  </div>
                </div>

                <div
                  class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                  <div class="w-full">
                    <label
                      for="id"
                      class="block mb-2 text-sm font-medium text-gray-800"
                      >ID</label
                    >
                    <input
                      type="text"
                      id="id"
                      class="border border-gray-300 text-gray-700 text-sm rounded-lg w-full p-2.5" />
                  </div>

                  <div class="w-full">
                    <label
                      for="job-position"
                      class="block mb-2 text-sm font-medium text-gray-800"
                      >Job Position</label
                    >
                    <input
                      type="text"
                      id="job-position"
                      class="border border-gray-300 text-gray-700 text-sm rounded-lg w-full p-2.5" />
                  </div>
                </div>

                <div
                  class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                  <div class="w-full">
                    <label
                      for="email"
                      class="block mb-2 text-sm font-medium text-gray-800"
                      >Email</label
                    >
                    <input
                      type="email"
                      id="email"
                      class="border border-gray-300 text-gray-700 text-sm rounded-lg w-full p-2.5" />
                  </div>

                  <div class="w-full">
                    <label
                      for="number"
                      class="block mb-2 text-sm font-medium text-gray-800"
                      >Mobile Number</label
                    >
                    <input
                      type="text"
                      id="number"
                      class="border border-gray-300 text-gray-700 text-sm rounded-lg w-full p-2.5" />
                  </div>
                </div>

                <div class="mb-2 sm:mb-6">
                  <label
                    for="password"
                    class="block mb-2 text-sm font-medium text-gray-800"
                    >Password</label
                  >
                  <input
                    type="password"
                    id="password"
                    class="border border-gray-300 text-gray-700 text-sm rounded-lg w-full p-2.5" />
                </div>

                <div class="flex justify-end gap-3">
                  <button
                    type="submit"
                    class="text-black border border-black bg-transparent font-bold rounded-lg text-sm w-full sm:w-auto px-7 py-2 text-center">
                    cancel
                  </button>
                  <button
                    type="submit"
                    class="text-black border border-black bg-amber-400 font-bold rounded-lg text-sm w-full sm:w-auto px-7 py-2 text-center">
                    Save
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
