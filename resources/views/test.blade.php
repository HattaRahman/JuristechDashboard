<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom styles for enhanced accessibility and animations */
    .card-hover:hover {
      transform: translateY(-2px);
      transition: transform 0.2s ease-in-out;
    }
    
    .sort-indicator {
      transition: transform 0.2s ease-in-out;
    }
    
    .sort-asc {
      transform: rotate(0deg);
    }
    
    .sort-desc {
      transform: rotate(180deg);
    }
    
    /* Lightbox styles */
    .lightbox {
      backdrop-filter: blur(4px);
      animation: fadeIn 0.3s ease-out;
    }
    
    .lightbox-content {
      animation: slideIn 0.3s ease-out;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    @keyframes slideIn {
      from { transform: translateY(-50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    
    /* Focus styles for accessibility */
    .focus-ring:focus {
      outline: 2px solid #3b82f6;
      outline-offset: 2px;
    }
    
    /* Mobile table scroll indicator */
    .table-container {
      position: relative;
    }
    
    .table-container::after {
      content: '';
      position: absolute;
      right: 0;
      top: 0;
      bottom: 0;
      width: 20px;
      background: linear-gradient(to left, rgba(0,0,0,0.1), transparent);
      pointer-events: none;
      opacity: 0;
      transition: opacity 0.3s;
    }
    
    .table-container.scrollable::after {
      opacity: 1;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen">
  <!-- Header -->
  <header class="fixed top-0 left-0 w-full bg-white shadow-lg z-50" role="banner">
    <div class="flex items-center justify-between px-4 md:px-6 py-3">
      <!-- Logo -->
      <div class="flex items-center">
        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
          <span class="text-white font-bold text-xl">A</span>
        </div>
        <h1 class="ml-3 text-xl font-semibold text-gray-800 hidden sm:block">Admin Dashboard</h1>
      </div>
      
      <!-- Instructions Button -->
      <button 
        id="instructionsBtn"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg focus-ring transition-colors duration-200"
        aria-label="Open instructions modal"
      >
        <span class="hidden sm:inline">Instructions</span>
        <span class="sm:hidden">Info</span>
      </button>
    </div>
  </header>

  <!-- Main Content -->
  <main class="pt-20 px-4 md:px-6 pb-8" role="main">
    <!-- Stats Cards Section -->
    <section aria-label="Summary Statistics">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Overview</h2>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-8">
        <!-- Total Users Card -->
        <div class="bg-white rounded-lg shadow-md p-6 card-hover focus-ring" tabindex="0" role="region" aria-label="Total Users Statistics">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-600">Total Users</p>
              <p class="text-3xl font-bold text-gray-900" id="totalUsers">1,248</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
              <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
              </svg>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-green-500 text-sm font-medium">↗ 12% increase</span>
          </div>
        </div>

        <!-- Sales Card -->
        <div class="bg-white rounded-lg shadow-md p-6 card-hover focus-ring" tabindex="0" role="region" aria-label="Sales Statistics">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-600">Sales</p>
              <p class="text-3xl font-bold text-gray-900" id="totalSales">3,456</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
              <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
              </svg>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-green-500 text-sm font-medium">↗ 8% increase</span>
          </div>
        </div>

        <!-- Revenue Card -->
        <div class="bg-white rounded-lg shadow-md p-6 card-hover focus-ring sm:col-span-2 lg:col-span-1" tabindex="0" role="region" aria-label="Revenue Statistics">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-600">Revenue</p>
              <p class="text-3xl font-bold text-gray-900" id="totalRevenue">$89,432</p>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
              <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.51-1.31c-.562-.649-1.413-1.076-2.353-1.253V5z" clip-rule="evenodd"/>
              </svg>
            </div>
          </div>
          <div class="mt-4">
            <span class="text-red-500 text-sm font-medium">↘ 3% decrease</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Data Table Section -->
    <section aria-label="Users Data Table">
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
            <h3 class="text-lg font-semibold text-gray-800">Users</h3>
            
            <!-- Filter Controls -->
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
              <div class="relative">
                <label for="statusFilter" class="sr-only">Filter by status</label>
                <select 
                  id="statusFilter" 
                  class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus-ring"
                  aria-label="Filter users by status"
                >
                  <option value="all">All Status</option>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                </select>
              </div>
              
              <div class="relative">
                <label for="searchInput" class="sr-only">Search users</label>
                <input 
                  type="text" 
                  id="searchInput" 
                  placeholder="Search users..." 
                  class="border border-gray-300 rounded-lg px-4 py-2 focus-ring w-full sm:w-auto"
                  aria-label="Search users by name or email"
                >
              </div>
            </div>
          </div>
        </div>

        <!-- Table -->
        <div class="table-container overflow-x-auto" id="tableContainer">
          <table class="min-w-full divide-y divide-gray-200" role="table" aria-label="Users data table">
            <thead class="bg-gray-50">
              <tr role="row">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" role="columnheader">
                  ID
                </th>
                <th 
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 focus-ring"
                  role="columnheader"
                  tabindex="0"
                  id="nameHeader"
                  aria-sort="none"
                  aria-label="Name - Click to sort"
                >
                  <div class="flex items-center space-x-1">
                    <span>Name</span>
                    <svg class="w-4 h-4 sort-indicator" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                  </div>
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" role="columnheader">
                  Email
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" role="columnheader">
                  Status
                </th>
              </tr>
            </thead>
            <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
              <!-- Table rows will be populated by JavaScript -->
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>

  <!-- Lightbox Modal -->
  <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-50 lightbox hidden z-50" role="dialog" aria-labelledby="lightboxTitle" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen p-4">
      <div class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto lightbox-content">
        <div class="p-6">
          <div class="flex justify-between items-start mb-4">
            <h2 id="lightboxTitle" class="text-2xl font-bold text-gray-800">Dashboard Instructions</h2>
            <button 
              id="closeLightbox"
              class="text-gray-400 hover:text-gray-600 focus-ring rounded p-1"
              aria-label="Close instructions modal"
            >
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
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

  <script>
    // Sample user data
    const userData = [
      { id: 1, name: "Alice Johnson", email: "alice.johnson@email.com", status: "active" },
      { id: 2, name: "Bob Smith", email: "bob.smith@email.com", status: "inactive" },
      { id: 3, name: "Carol Wilson", email: "carol.wilson@email.com", status: "active" },
      { id: 4, name: "David Brown", email: "david.brown@email.com", status: "active" },
      { id: 5, name: "Eva Davis", email: "eva.davis@email.com", status: "inactive" },
      { id: 6, name: "Frank Miller", email: "frank.miller@email.com", status: "active" },
      { id: 7, name: "Grace Lee", email: "grace.lee@email.com", status: "active" },
      { id: 8, name: "Henry Taylor", email: "henry.taylor@email.com", status: "inactive" },
      { id: 9, name: "Ivy Chen", email: "ivy.chen@email.com", status: "active" },
      { id: 10, name: "Jack Wilson", email: "jack.wilson@email.com", status: "active" }
    ];

    // State management
    let currentSort = { field: null, direction: 'asc' };
    let filteredData = [...userData];

    // DOM elements
    const tableBody = document.getElementById('tableBody');
    const nameHeader = document.getElementById('nameHeader');
    const statusFilter = document.getElementById('statusFilter');
    const searchInput = document.getElementById('searchInput');
    const lightbox = document.getElementById('lightbox');
    const instructionsBtn = document.getElementById('instructionsBtn');
    const closeLightbox = document.getElementById('closeLightbox');
    const tableContainer = document.getElementById('tableContainer');

    /**
     * Renders the user table with current filtered and sorted data
     */
    function renderTable() {
      tableBody.innerHTML = '';
      
      if (filteredData.length === 0) {
        // Show empty state
        const emptyRow = document.createElement('tr');
        emptyRow.innerHTML = `
          <td colspan="4" class="px-6 py-8 text-center text-gray-500">
            <div class="flex flex-col items-center space-y-2">
              <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-5v10"/>
              </svg>
              <p class="text-lg font-medium">No users found</p>
              <p class="text-sm">Try adjusting your search or filter criteria</p>
            </div>
          </td>
        `;
        tableBody.appendChild(emptyRow);
        return;
      }

      // Render data rows
      filteredData.forEach((user, index) => {
        const row = document.createElement('tr');
        row.className = index % 2 === 0 ? 'bg-white' : 'bg-gray-50';
        row.setAttribute('role', 'row');
        
        const statusClass = user.status === 'active' 
          ? 'bg-green-100 text-green-800' 
          : 'bg-red-100 text-red-800';
        
        row.innerHTML = `
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" role="gridcell">${user.id}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" role="gridcell">${user.name}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" role="gridcell">${user.email}</td>
          <td class="px-6 py-4 whitespace-nowrap" role="gridcell">
            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full ${statusClass}">
              ${user.status}
            </span>
          </td>
        `;
        
        tableBody.appendChild(row);
      });

      // Update scroll indicator
      updateScrollIndicator();
    }

    /**
     * Sorts the data by the specified field
     */
    function sortData(field) {
      if (currentSort.field === field) {
        // Toggle direction if same field
        currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
      } else {
        // New field, default to ascending
        currentSort.field = field;
        currentSort.direction = 'asc';
      }

      filteredData.sort((a, b) => {
        let valueA = a[field];
        let valueB = b[field];
        
        // Handle string comparison
        if (typeof valueA === 'string') {
          valueA = valueA.toLowerCase();
          valueB = valueB.toLowerCase();
        }

        if (currentSort.direction === 'asc') {
          return valueA < valueB ? -1 : valueA > valueB ? 1 : 0;
        } else {
          return valueA > valueB ? -1 : valueA < valueB ? 1 : 0;
        }
      });

      updateSortIndicator();
      renderTable();
    }

    /**
     * Updates the visual sorting indicator
     */
    function updateSortIndicator() {
      const sortIcon = nameHeader.querySelector('.sort-indicator');
      
      if (currentSort.field === 'name') {
        nameHeader.setAttribute('aria-sort', currentSort.direction === 'asc' ? 'ascending' : 'descending');
        sortIcon.className = `w-4 h-4 sort-indicator ${currentSort.direction === 'asc' ? 'sort-asc' : 'sort-desc'}`;
      } else {
        nameHeader.setAttribute('aria-sort', 'none');
        sortIcon.className = 'w-4 h-4 sort-indicator';
      }
    }

    /**
     * Filters data based on search and status filter
     */
    function filterData() {
      const searchTerm = searchInput.value.toLowerCase().trim();
      const statusValue = statusFilter.value;

      filteredData = userData.filter(user => {
        const matchesSearch = searchTerm === '' || 
          user.name.toLowerCase().includes(searchTerm) || 
          user.email.toLowerCase().includes(searchTerm);
        
        const matchesStatus = statusValue === 'all' || user.status === statusValue;

        return matchesSearch && matchesStatus;
      });

      // Re-sort if there's an active sort
      if (currentSort.field) {
        sortData(currentSort.field);
      } else {
        renderTable();
      }
    }

    /**
     * Updates scroll indicator for mobile table
     */
    function updateScrollIndicator() {
      const container = tableContainer;
      const isScrollable = container.scrollWidth > container.clientWidth;
      
      if (isScrollable) {
        container.classList.add('scrollable');
      } else {
        container.classList.remove('scrollable');
      }
    }

    /**
     * Opens the lightbox modal
     */
    function openLightbox() {
      lightbox.classList.remove('hidden');
      lightbox.setAttribute('aria-hidden', 'false');
      
      // Focus management
      const closeButton = document.getElementById('closeLightbox');
      closeButton.focus();
      
      // Trap focus in modal
      trapFocus(lightbox);
    }

    /**
     * Closes the lightbox modal
     */
    function closeLightboxModal() {
      lightbox.classList.add('hidden');
      lightbox.setAttribute('aria-hidden', 'true');
      
      // Return focus to trigger button
      instructionsBtn.focus();
    }

    /**
     * Traps focus within the specified element
     */
    function trapFocus(element) {
      const focusableElements = element.querySelectorAll(
        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
      );
      
      const firstElement = focusableElements[0];
      const lastElement = focusableElements[focusableElements.length - 1];

      element.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
          if (e.shiftKey) {
            if (document.activeElement === firstElement) {
              lastElement.focus();
              e.preventDefault();
            }
          } else {
            if (document.activeElement === lastElement) {
              firstElement.focus();
              e.preventDefault();
            }
          }
        }
        
        // Close modal on Escape
        if (e.key === 'Escape') {
          closeLightboxModal();
        }
      });
    }

    // Event Listeners
    nameHeader.addEventListener('click', () => sortData('name'));
    nameHeader.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        sortData('name');
      }
    });

    statusFilter.addEventListener('change', filterData);
    searchInput.addEventListener('input', filterData);

    instructionsBtn.addEventListener('click', openLightbox);
    closeLightbox.addEventListener('click', closeLightboxModal);

    // Close lightbox when clicking outside
    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) {
        closeLightboxModal();
      }
    });

    // Handle window resize for scroll indicator
    window.addEventListener('resize', updateScrollIndicator);

    // Keyboard navigation for lightbox
    document.addEventListener('keydown', (e) => {
      if (!lightbox.classList.contains('hidden') && e.key === 'Escape') {
        closeLightboxModal();
      }
    });

    // Initialize the dashboard
    function init() {
      renderTable();
      updateScrollIndicator();
      
      // Set initial ARIA attributes
      lightbox.setAttribute('aria-hidden', 'true');
      nameHeader.setAttribute('aria-sort', 'none');
      
      // Announce page load to screen readers
      const announcement = document.createElement('div');
      announcement.setAttribute('aria-live', 'polite');
      announcement.setAttribute('aria-atomic', 'true');
      announcement.className = 'sr-only';
      announcement.textContent = 'Admin dashboard loaded successfully';
      document.body.appendChild(announcement);
      
      setTimeout(() => {
        document.body.removeChild(announcement);
      }, 1000);
    }

    // Start the application
    init();
  </script>
</body>
</html>