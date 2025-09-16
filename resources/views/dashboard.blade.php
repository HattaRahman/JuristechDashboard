<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Animations */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in {
            animation: slideIn 0.3s ease-out;
        }

        /* Card hover effects */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }

        /* Card gradients */
        .card-users {
            background: linear-gradient(135deg, #771a1aff, #d13557ff);
            color: white;
        }

        .card-sales {
            background: linear-gradient(135deg, #771a1aff, #d13557ff);
            color: white;
        }

        .card-revenue {
            background: linear-gradient(135deg, #771a1aff, #d13557ff);
            color: white;
        }

        .card-icon {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        /* Table styles */
        .table-row-hover:hover {
            background: linear-gradient(90deg, #d84040ff, transparent);
        }

        .table-header {
            background: linear-gradient(90deg, #911818ff, #911818ff);
        }

        /* Status badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .status-active {
            background: linear-gradient(135deg, #10b951ff, #38d152ff);
            color: white;
        }

        .status-inactive {
            background: #f59e0b;
            color: white;
        }

        /* Buttons */
        .btn-primary {
            background: #911818ff;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        /* Focus styles */
        .focus-ring:focus {
            outline: 3px solid #911818ff;
            outline-offset: 2px;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Page number active state */
        .page-number.active {
            background: #911818ff;
            color: white;
            border-color: #5e0f0fff;
        }
    </style>
</head>

<body class="bg-gray-200 min-h-screen">
    <!-- Header -->
<header class="fixed top-0 left-0 w-full bg-white shadow-md flex items-center justify-between px-6 py-3 z-50">
    <!-- Logo -->
    <div class="absolute left-1/2 transform -translate-x-1/2">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto">
    </div>

    <!-- Instructions Icon Button -->
    <div class="ml-auto">
        <button
            id="instructionsBtn"
            class="bg-red-800 hover:bg-red-900 text-white w-10 h-10 flex items-center justify-center rounded-full focus-ring transition-colors duration-200"
            aria-label="Open instructions modal">
            <i class="fas fa-question-circle text-lg"></i>
        </button>
    </div>
</header>



    <!-- Main Content -->
    <main class="pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Cards Section -->
            <section class="mb-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Total Users Card -->
                    <div class="card-users rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 card-hover animate-slide-in">
                        <div class="p-8">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-white/80 uppercase tracking-wide">Total Users</p>
                                    <p class="text-4xl font-bold text-white mt-2" id="total-users">1,247</p>
                                    <p class="text-sm text-white/90 mt-3 flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i>
                                        +12% from last month
                                    </p>
                                </div>
                                <div class="card-icon p-4 rounded-xl">
                                    <i class="fas fa-users text-white text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sales Card -->
                    <div class="card-sales rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 card-hover animate-slide-in" style="animation-delay: 0.1s">
                        <div class="p-8">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-white/80 uppercase tracking-wide">Total Sales</p>
                                    <p class="text-4xl font-bold text-white mt-2" id="total-sales">847</p>
                                    <p class="text-sm text-white/90 mt-3 flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i>
                                        +8% from last month
                                    </p>
                                </div>
                                <div class="card-icon p-4 rounded-xl">
                                    <i class="fas fa-shopping-cart text-white text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Card -->
                    <div class="card-revenue rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 card-hover animate-slide-in" style="animation-delay: 0.2s">
                        <div class="p-8">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-white/80 uppercase tracking-wide">Revenue</p>
                                    <p class="text-4xl font-bold text-white mt-2" id="total-revenue">RM24,587</p>
                                    <p class="text-sm text-white/90 mt-3 flex items-center">
                                        <i class="fas fa-arrow-down mr-1"></i>
                                        -3% from last month
                                    </p>
                                </div>
                                <div class="card-icon p-4 rounded-xl">
                                    <i class="fas fa-dollar-sign text-white text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Data Table Section -->
            <section class="bg-white rounded-2xl shadow-xl animate-slide-in border border-gray-100" style="animation-delay: 0.3s">
                <div class="p-8">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4 sm:mb-0">User Management</h2>

                        <!-- Filters and Actions -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-3 sm:space-y-0 sm:space-x-4">
                            <!-- Search -->
                            <div class="relative">
                                <input
                                    type="text"
                                    id="search-input"
                                    placeholder="Search users..."
                                    class="w-full sm:w-64 pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200"
                                    onkeyup="filterTable()">
                                <i class="fas fa-search absolute left-4 top-4 text-gray-400"></i>
                            </div>

                            <!-- Status Filter -->
                            <select
                                id="status-filter"
                                class="w-full sm:w-auto px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200"
                                onchange="filterTable()">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>

                            <!-- Add User Button -->
                            <button
                                onclick="openAddUser()"
                                class="btn-primary w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 text-sm font-medium rounded-xl focus-ring transition-all duration-200">
                                <i class="fas fa-plus mr-2"></i>
                                Add User
                            </button>

                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="table-header">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider cursor-pointer hover:bg-red-700 transition-colors focus-ring"
                                        onclick="sortTable('name')"
                                        tabindex="0">
                                        <div class="flex items-center space-x-2">
                                            <span>Name</span>
                                            <i class="fas fa-sort text-white" id="name-sort-icon"></i>
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="user-table-body" class="bg-white divide-y divide-gray-200">
                                <!-- Table rows populated by JavaScript -->
                            </tbody>
                        </table>

                        <!-- Empty state -->
                        <div id="empty-state" class="hidden text-center py-16">
                            <i class="fas fa-users text-gray-300 text-6xl mb-6"></i>
                            <p class="text-gray-500 text-xl mb-2">No users found</p>
                            <p class="text-gray-400">Try adjusting your search or filter criteria</p>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="flex flex-col sm:flex-row items-center justify-between mt-8 pt-6 border-t border-gray-200">
                        <div class="text-sm text-gray-700 mb-4 sm:mb-0">
                            Showing <span class="font-semibold" id="showing-from">1</span> to <span class="font-semibold" id="showing-to">10</span> of <span class="font-semibold" id="total-records">25</span> results
                        </div>

                        <div class="flex items-center space-x-2">
                            <button
                                onclick="previousPage()"
                                id="prev-btn"
                                class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50 focus-ring transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                                disabled>
                                <i class="fas fa-chevron-left mr-1"></i>
                                Previous
                            </button>

                            <div id="page-numbers" class="flex items-center space-x-1">
                                <!-- Page numbers populated by JavaScript -->
                            </div>

                            <button
                                onclick="nextPage()"
                                id="next-btn"
                                class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50 focus-ring transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                Next
                                <i class="fas fa-chevron-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50" role="dialog" aria-labelledby="lightboxTitle" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h2 id="lightboxTitle" class="text-2xl font-bold text-gray-800">Dashboard Instructions</h2>
                        <button
                            id="closeLightbox"
                            class="text-gray-400 hover:text-gray-600 focus-ring rounded p-1"
                            aria-label="Close instructions modal">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="prose max-w-none">
                        <h3 class="text-lg font-semibold mb-3">How to Use This Dashboard</h3>

                        <div class="space-y-4 text-gray-700">
                            <div>
                                <h4 class="font-medium text-gray-800">Overview Cards</h4>
                                <p>The top section displays key metrics including total users, sales, and revenue. These cards show current values and percentage changes.</p>
                            </div>

                            <div>
                                <h4 class="font-medium text-gray-800">Users Table</h4>
                                <p>The table shows user information with the following features:</p>
                                <ul class="list-disc pl-6 mt-2 space-y-1">
                                    <li>Click the "Name" column header to sort alphabetically (ascending/descending)</li>
                                    <li>Use the status filter to show only active or inactive users</li>
                                    <li>Search for specific users by name or email</li>
                                    <li>On mobile devices, scroll horizontally to see all columns</li>
                                </ul>
                            </div>

                            <div>
                                <h4 class="font-medium text-gray-800">Accessibility</h4>
                                <p>This dashboard supports keyboard navigation and screen readers:</p>
                                <ul class="list-disc pl-6 mt-2 space-y-1">
                                    <li>Use Tab to navigate between interactive elements</li>
                                    <li>Press Enter or Space to activate buttons and sorting</li>
                                    <li>Screen readers will announce table headers and sorting states</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div id="addUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50" role="dialog" aria-labelledby="addUserTitle" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg shadow-2xl max-w-lg w-full animate-slide-in">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h2 id="addUserTitle" class="text-2xl font-bold text-gray-800">Add New User</h2>
                        <button onclick="closeAddUser()" class="text-gray-400 hover:text-gray-600 focus-ring rounded p-1" aria-label="Close add user modal">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Add User Form -->
                    <form id="addUserForm" onsubmit="submitAddUser(event)" class="space-y-4">
                        <div>
                            <label for="userName" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="userName" required class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="userEmail" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="userEmail" required class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="userStatus" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="userStatus" required class="mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="flex justify-end space-x-3 mt-6">
                            <button type="button" onclick="closeAddUser()" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</button>
                            <button type="submit" class="btn-primary px-6 py-2 rounded-lg">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-5 right-5 hidden bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg z-50">
        ✅ User added successfully!
    </div>



    <script>
        // Global variables
        let usersData = [{
                id: 1, name: "Alice Johnson", email: "alice.johnson@example.com", status: "active"},
            {
                id: 2, name: "Bob Smith", email: "bob.smith@example.com", status: "inactive"},
            {
                id: 3, name: "Carol Davis", email: "carol.davis@example.com", status: "active"},
            {
                id: 4, name: "David Wilson", email: "david.wilson@example.com", status: "active"},
            {
                id: 5, name: "Eva Brown", email: "eva.brown@example.com", status: "inactive"},
            {
                id: 6, name: "Frank Miller", email: "frank.miller@example.com", status: "active"},
            {
                id: 7, name: "Grace Lee", email: "grace.lee@example.com", status: "active"},
            {
                id: 8, name: "Henry Taylor", email: "henry.taylor@example.com", status: "inactive"},
            {
                id: 9, name: "Iris Anderson", email: "iris.anderson@example.com", status: "active"},
            {
                id: 10, name: "Jack Thompson", email: "jack.thompson@example.com", status: "active"},
            {
                id: 11, name: "Karen White", email: "karen.white@example.com", status: "inactive"},
            {
                id: 12, name: "Luis Garcia", email: "luis.garcia@example.com", status: "active"},
            {
                id: 13, name: "Maria Rodriguez", email: "maria.rodriguez@example.com", status: "active"},
            {
                id: 14, name: "Nathan Clark", email: "nathan.clark@example.com", status: "inactive"},
            {
                id: 15, name: "Olivia Martinez", email: "olivia.martinez@example.com",status: "active"},
        ];

        let filteredData = [...usersData];
        let sortDirection = {
            name: 'asc'
        };
        let currentPage = 1;
        let itemsPerPage = 10;

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', function() {
            renderTable();
            updateStats();
        });

        // Table rendering
        function renderTable() {
            const tbody = document.getElementById('user-table-body');
            const emptyState = document.getElementById('empty-state');

            if (filteredData.length === 0) {
                tbody.innerHTML = '';
                emptyState.classList.remove('hidden');
                updatePagination();
                return;
            }

            emptyState.classList.add('hidden');

            // Calculate pagination
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const pageData = filteredData.slice(startIndex, endIndex);

            tbody.innerHTML = pageData.map(user => `
                <tr class="table-row-hover transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        ${user.id}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        ${user.name}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ${user.email}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge status-${user.status}">
                            <i class="fas fa-circle mr-1 text-xs"></i>
                            ${user.status.charAt(0).toUpperCase() + user.status.slice(1)}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button 
                            onclick="editUser(${user.id})" 
                            class="text-blue-600 hover:text-blue-900 mr-4 transition-colors"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <button 
                            onclick="deleteUser(${user.id})" 
                            class="text-red-600 hover:text-red-900 transition-colors"
                        >
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `).join('');

            updatePagination();
        }

        // Sorting function
        function sortTable(column) {
            const icon = document.getElementById(`${column}-sort-icon`);
            const isAscending = sortDirection[column] === 'asc';

            filteredData.sort((a, b) => {
                const aValue = a[column].toLowerCase();
                const bValue = b[column].toLowerCase();

                if (isAscending) {
                    return aValue > bValue ? 1 : -1;
                } else {
                    return aValue < bValue ? 1 : -1;
                }
            });

            // Update sort direction and icon
            sortDirection[column] = isAscending ? 'desc' : 'asc';
            icon.className = `fas fa-sort-${isAscending ? 'down' : 'up'} text-red-600`;

            // Reset to first page and render
            currentPage = 1;
            renderTable();
        }

        // Filter function
        function filterTable() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const statusFilter = document.getElementById('status-filter').value;

            filteredData = usersData.filter(user => {
                const matchesSearch = user.name.toLowerCase().includes(searchTerm) ||
                    user.email.toLowerCase().includes(searchTerm);
                const matchesStatus = !statusFilter || user.status === statusFilter;

                return matchesSearch && matchesStatus;
            });

            currentPage = 1;
            renderTable();
        }

        // Pagination functions
        function updatePagination() {
            const totalPages = Math.ceil(filteredData.length / itemsPerPage);
            const startIndex = (currentPage - 1) * itemsPerPage + 1;
            const endIndex = Math.min(currentPage * itemsPerPage, filteredData.length);

            // Update pagination info
            document.getElementById('showing-from').textContent = startIndex;
            document.getElementById('showing-to').textContent = endIndex;
            document.getElementById('total-records').textContent = filteredData.length;

            // Update navigation buttons
            document.getElementById('prev-btn').disabled = currentPage === 1;
            document.getElementById('next-btn').disabled = currentPage === totalPages || totalPages === 0;

            // Generate page numbers
            const pageNumbers = document.getElementById('page-numbers');
            pageNumbers.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                    const button = document.createElement('button');
                    button.className = `page-number px-3 py-2 text-sm border border-gray-300 rounded-lg ${i === currentPage ? 'active' : 'hover:bg-gray-50'} focus-ring transition-colors`;
                    button.textContent = i;
                    button.onclick = () => goToPage(i);
                    pageNumbers.appendChild(button);
                } else if (i === currentPage - 2 || i === currentPage + 2) {
                    const span = document.createElement('span');
                    span.textContent = '...';
                    span.className = 'px-2 py-2 text-sm text-gray-500';
                    pageNumbers.appendChild(span);
                }
            }
        }

        function previousPage() {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        }

        function nextPage() {
            const totalPages = Math.ceil(filteredData.length / itemsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                renderTable();
            }
        }

        function goToPage(page) {
            currentPage = page;
            renderTable();
        }

        // User management functions
        // Open Add User modal
        function openAddUser() {
            document.getElementById('addUserModal').classList.remove('hidden');
        }

        // Close Add User modal
        function closeAddUser() {
            document.getElementById('addUserModal').classList.add('hidden');
        }

        // Handle form submission
        function submitAddUser(event) {
            event.preventDefault();

            const name = document.getElementById('userName').value.trim();
            const email = document.getElementById('userEmail').value.trim();
            const status = document.getElementById('userStatus').value;

            if (!name || !email) return;

            // Add new user to data
            const newUser = {
                id: usersData.length + 1,
                name,
                email,
                status
            };

            usersData.push(newUser);
            filteredData = [...usersData];
            renderTable();
            updateStats();

            closeAddUser(); // Close modal
            document.getElementById('addUserForm').reset(); // Clear form

            // Show success toast
            showToast("✅ User added successfully!");
        }

        function editUser(id) {
            const user = usersData.find(u => u.id === id);
            if (user) {
                user.status = user.status === 'active' ? 'inactive' : 'active';
                filteredData = [...usersData];
                renderTable();
                updateStats();
            }
        }

        function deleteUser(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                usersData = usersData.filter(u => u.id !== id);
                filteredData = [...usersData];
                renderTable();
                updateStats();
            }
        }

        function showToast(message) {
            const toast = document.getElementById("toast");
            toast.textContent = message;
            toast.classList.remove("hidden");

            // Auto-hide after 3s
            setTimeout(() => {
                toast.classList.add("hidden");
            }, 3000);
        }


        // Update dashboard stats
        function updateStats() {
            const totalUsers = usersData.length;
            document.getElementById('total-users').textContent = totalUsers.toLocaleString();
        }

        const instructionsBtn = document.getElementById("instructionsBtn");
        const lightbox = document.getElementById("lightbox");
        const closeLightbox = document.getElementById("closeLightbox");

        // Open modal
        instructionsBtn.addEventListener("click", () => {
            lightbox.classList.remove("hidden");
        });

        // Close modal
        closeLightbox.addEventListener("click", () => {
            lightbox.classList.add("hidden");
        });

        // Close modal if clicking outside content
        lightbox.addEventListener("click", (e) => {
            if (e.target === lightbox) {
                lightbox.classList.add("hidden");
            }
        });
    </script>
</body>

</html>